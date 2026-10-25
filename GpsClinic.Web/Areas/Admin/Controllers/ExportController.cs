using System.Text.Json;
using GpsClinic.Web.Data;
using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;

namespace GpsClinic.Web.Areas.Admin.Controllers;

/// <summary>
/// Temporary full-database export used to back up the Render Postgres instance to a local
/// file before it expires. Reads at the raw SQL level (information_schema + SELECT *) so it
/// captures every table generically, including ASP.NET Identity tables, without depending on
/// the EF model staying in sync. Remove this controller once the backup has been taken.
/// </summary>
public class ExportController : AdminControllerBase
{
    private readonly ApplicationDbContext _db;
    public ExportController(ApplicationDbContext db) => _db = db;

    [HttpGet("full")]
    public async Task<IActionResult> Full()
    {
        var conn = _db.Database.GetDbConnection();
        await conn.OpenAsync();

        var schema = new List<Dictionary<string, object?>>();
        await using (var cmd = conn.CreateCommand())
        {
            cmd.CommandText = @"SELECT table_name, column_name, ordinal_position, data_type,
                                        is_nullable, character_maximum_length, column_default
                                 FROM information_schema.columns
                                 WHERE table_schema='public'
                                 ORDER BY table_name, ordinal_position";
            await using var reader = await cmd.ExecuteReaderAsync();
            while (await reader.ReadAsync())
            {
                schema.Add(new Dictionary<string, object?>
                {
                    ["table"] = reader.GetString(0),
                    ["column"] = reader.GetString(1),
                    ["position"] = reader.GetInt32(2),
                    ["type"] = reader.GetString(3),
                    ["nullable"] = reader.GetString(4),
                    ["maxLength"] = reader.IsDBNull(5) ? null : reader.GetInt32(5),
                    ["default"] = reader.IsDBNull(6) ? null : reader.GetValue(6).ToString(),
                });
            }
        }

        var tableNames = new List<string>();
        await using (var cmd = conn.CreateCommand())
        {
            cmd.CommandText = @"SELECT table_name FROM information_schema.tables
                                 WHERE table_schema='public' AND table_type='BASE TABLE'
                                 ORDER BY table_name";
            await using var reader = await cmd.ExecuteReaderAsync();
            while (await reader.ReadAsync()) tableNames.Add(reader.GetString(0));
        }

        var tables = new Dictionary<string, List<Dictionary<string, object?>>>();
        foreach (var table in tableNames)
        {
            var rows = new List<Dictionary<string, object?>>();
            await using var cmd = conn.CreateCommand();
            cmd.CommandText = $"SELECT * FROM \"{table}\"";
            await using var reader = await cmd.ExecuteReaderAsync();
            while (await reader.ReadAsync())
            {
                var row = new Dictionary<string, object?>();
                for (int i = 0; i < reader.FieldCount; i++)
                {
                    var name = reader.GetName(i);
                    if (reader.IsDBNull(i)) { row[name] = null; continue; }
                    var val = reader.GetValue(i);
                    row[name] = val switch
                    {
                        byte[] bytes => Convert.ToBase64String(bytes),
                        DateTime dt => dt.ToString("o"),
                        DateTimeOffset dto => dto.ToString("o"),
                        _ => val,
                    };
                }
                rows.Add(row);
            }
            tables[table] = rows;
        }

        var payload = new { exportedAt = DateTime.UtcNow, schema, tables };
        var json = JsonSerializer.Serialize(payload, new JsonSerializerOptions { WriteIndented = false });
        return Content(json, "application/json");
    }
}
