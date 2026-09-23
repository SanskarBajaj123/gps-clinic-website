FROM php:8.3-apache

# SQLite + PDO extensions
RUN apt-get update \
    && apt-get install -y libsqlite3-dev \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install pdo pdo_sqlite

# Enable mod_rewrite for WordPress pretty permalinks
RUN a2enmod rewrite

# Copy all WordPress files
COPY . /var/www/html/

# Allow .htaccess overrides
RUN echo '<Directory /var/www/html>\n    AllowOverride All\n    Require all granted\n</Directory>' \
    >> /etc/apache2/apache2.conf

# Fix permissions for wp-content
RUN chown -R www-data:www-data /var/www/html/wp-content/ \
    && find /var/www/html/wp-content/ -type d -exec chmod 755 {} \; \
    && find /var/www/html/wp-content/ -type f -exec chmod 644 {} \;

EXPOSE 80
