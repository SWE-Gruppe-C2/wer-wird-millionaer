# Installation
## Windows
### PHP 8.1.7
1. [Download](https://windows.php.net/downloads/releases/php-8.1.12-Win32-vs16-x64.zip)
2. Unter `C:\php` extrahieren
3. Unter "Systemumgebungsvariablen" bei `PATH` den Pfad `C:\php` angeben.
4. `C:\php\php.ini~development` zu `php.ini` umbenennen und in der Datei den folgenden Block ersetzen:
```
extension=bz2
extension=curl
extension=ffi
extension=ftp
extension=fileinfo
extension=gd
extension=gettext
extension=gmp
extension=intl
extension=imap
extension=ldap
extension=mbstring
extension=exif       ; Must be after mbstring as it depends on it
extension=mysqli
;extension=oci8_12c  ; Use with Oracle Database 12c Instant Client
;extension=oci8_19   ; Use with Oracle Database 19 Instant Client
extension=odbc
extension=openssl
;extension=pdo_firebird
extension=pdo_mysql
;extension=pdo_oci
extension=pdo_odbc
extension=pdo_pgsql
extension=pdo_sqlite
extension=pgsql
extension=shmop

; The MIBS data available in the PHP distribution must be installed.
; See https://www.php.net/manual/en/snmp.installation.php
;extension=snmp

extension=soap
extension=sockets
extension=sodium
extension=sqlite3
extension=tidy
extension=xsl
```

### Node.js 1.16.18
1. [Download](https://nodejs.org/download/release/v16.18.0/node-v16.18.0-x64.msi)
2. Dem Installer folgen und installieren

### PHPStorm
1. Über Jetbrains Toolbox installieren
2. Unter `Settings > PHP` den oben installierten PHP Interpreter auswählen
3. Unter `Settings > Languages & Frameworks > Node.js` den oben installierten Node.js interpreter auswählen

# Projekt aufsetzen
1. Die `.env.example`-Datei kopieren und in .env umbenennen
2. `install dependencies` oben rechts in PHPStorm auswählen und laufen lassen, um alle abhängigkeiten zu installieren
3. `serve` oben rechts in PHPStorm auswählen und laufen lassen, um den Vite & PHP Server zu starten
4. [localhost](http://127.0.0.1:8000) besuchen, auf `GENERATE APP KEY` drücken und refreshen
