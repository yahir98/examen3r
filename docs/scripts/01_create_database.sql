CREATE SCHEMA `examen3r` ;
Alter USER 'examen3r'@'127.0.0.1' IDENTIFIED  WITH mysql_native_password BY 'examen';
GRANT ALL ON examen3r.* TO 'examen3r'@'127.0.0.1';
