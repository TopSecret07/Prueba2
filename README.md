# Cepeige_QR
escaner qr  para la empresa cepeige

  # creado la relacion
   CREATE TABLE registro (
   enlace_qr VARCHAR(250) PRIMARY KEY,
   nombre VARCHAR(30),
   apellido VARCHAR(30),
   cedula VARCHAR(15),
   correo_electronico VARCHAR(250),
   celular INT(15),
   taller_1 VARCHAR(250),
   taller_2 VARCHAR(250),
   ponencia VARCHAR(250),
   docente VARCHAR(10)
);

   CREATE TABLE asistentes (
   enlace_qr VARCHAR(250) PRIMARY KEY,
   nombre VARCHAR(30),
   apellido VARCHAR(30),
   cedula VARCHAR(15),
   correo_electronico VARCHAR(250),
   celular INT(15),
   taller_1 VARCHAR(250),
   taller_2 VARCHAR(250),
   ponencia VARCHAR(250),
   docente VARCHAR(15)
);

CREATE TABLE taller (
   enlace_qr VARCHAR(250),
   taller_1 VARCHAR(250),
   taller_2 VARCHAR(250),
   FOREIGN KEY (enlace_qr) REFERENCES asistentes(enlace_qr)
);

CREATE TABLE comidas (
   enlace_qr VARCHAR(250),
   coffe_1 TINYINT,
   hora_coffe_1 TINYINT,
   coffe_2 TINYINT,
   hora_coffe_2 TINYINT,
   almuerzo TINYINT,
   hora_almuerzo_1 TINYINT, 
   FOREIGN KEY (enlace_qr) REFERENCES asistentes(enlace_qr)
);