FROM mcr.microsoft.com/dotnet/sdk:8.0 AS build
WORKDIR /src
COPY GpsClinic.Web/GpsClinic.Web.csproj GpsClinic.Web/
RUN dotnet restore GpsClinic.Web/GpsClinic.Web.csproj
COPY GpsClinic.Web/ GpsClinic.Web/
RUN dotnet publish GpsClinic.Web/GpsClinic.Web.csproj -c Release -o /app/publish

FROM mcr.microsoft.com/dotnet/aspnet:8.0 AS runtime
WORKDIR /app
RUN mkdir -p /app/data
COPY --from=build /app/publish .

ENV ASPNETCORE_URLS=http://+:8080
ENV ASPNETCORE_ENVIRONMENT=Production
EXPOSE 8080

ENTRYPOINT ["dotnet", "GpsClinic.Web.dll"]
