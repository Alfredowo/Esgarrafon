DROP DATABASE if EXISTS Escalafon;
CREATE DATABASE Escalafon;
USE Escalafon;
DROP TABLE if EXISTS Login;
CREATE TABLE Login (
   Id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
   Usuario VARCHAR(255) NOT NULL,
   Contrasena VARCHAR(255) NOT NULL,
   Permisos enum('admin','empleado')
);  


INSERT INTO Login VALUES (NULL, 'Alfre', '123',1);
INSERT INTO Login VALUES (NULL, 'Nya', '123',1);
INSERT INTO Login VALUES (NULL, 'Leo', '123',1);
insert into Login values (null,'usuario','123',2);

SELECT * FROM Login WHERE Usuario = 'Alfre' AND Contrasena = '123';
DROP TABLE if EXISTS Empleados;
CREATE TABLE Empleados(
   id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
   Nombre VARCHAR(50),
   Grado ENUM("Doctorado","Maestría","Licenciatura"),
   rutaGrado varchar(100),
   Antiguedad INT,
   rutaAntiguedad varchar(100),
   CursoCap INT,
   rutaCursoCap varchar(100),
   --Certificaciones BOOLEAN,
   rutaCertificaciones varchar(100),
   --Diplomados BOOLEAN,
   rutaDiplomados varchar(100),
   --CursosST BOOLEAN,
   rutaCursosST varchar(100),
   Cursos INT,
   rutaCursos varchar(100),
   --InstructorDip BOOLEAN,
   rutaInstructorDip varchar(100),
   --InstructorCer BOOLEAN,
   rutaInstructorCer varchar(100),
   AsesorRes INT,
   rutaAsesorRes varchar(100),
   AsesorTit INT,
   rutaAsesorTit varchar(100),
   --DireccionTesis BOOLEAN,
   rutaDireccionTesis varchar(100)
);

/*INSERT INTO Empleados (Nombre, Grado, Antiguedad, CursoCap, Certificaciones, Diplomados, CursosST, Cursos, InstructorDip, InstructorCer, AsesorRes, AsesorTit, DireccionTesis)
VALUES
('Juan Pérez', 'Maestría', 5, 3, true, false, true, 2, true, false, 1, 0, true),
('María López', 'Licenciatura', 2, 4, false, true, false, 0, false, true, 0, 2, false);
('María López', 'Licenciatura', 2, 4, false, true, false, 0, false, true, 0, 2, FALSE);*/
    
DROP table if exists observaciones;
create table observaciones(
   id int PRIMARY KEY AUTO_INCREMENT,
   fkEmpleado int,
   OvGrado varchar(200),
   OvAntiguedad varchar(200),
   OvCursoCap varchar(200),
   OvCertificaciones varchar(200),
   OvDiplomados varchar(200),
   OvCursosST varchar(200),
   OvCursos varchar(200),
   OvInstructorDip varchar(200),
   OvInstructorCer varchar(200),
   OvAsesorRes varchar(200),
   OvAsesorTit varchar(200),
   OvDireccionTesis varchar(200),
   FOREIGN key(fkEmpleado) REFERENCES Empleados(id));

DROP TABLE if EXISTS Puntaje;
CREATE TABLE Puntaje(
   id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
   fkEmpleado INT,
   Puntaje INT,
   FOREIGN KEY(fkEmpleado) REFERENCES Empleados(id)
); 

/*INSERT INTO puntaje VALUES(NULL, 1, 100);  
INSERT INTO puntaje VALUES(NULL, 2, 50);  
SELECT * FROM puntaje; */

CREATE VIEW VistaPuntajes AS
SELECT E.Nombre AS NombreEmpleado, P.Puntaje
FROM Puntaje P
INNER JOIN Empleados E ON P.fkEmpleado = E.id;
SELECT * FROM VistaPuntajes;
    
CREATE USER IF NOT EXISTS 'userPro'@'localhost' IDENTIFIED BY '123';
GRANT ALL PRIVILEGES ON Escalafon.* TO 'userPro'@'localhost';
FLUSH PRIVILEGES;    
    
DROP PROCEDURE IF EXISTS insertarEmpleados;
DELIMITER &&

CREATE PROCEDURE insertarEmpleados(
   IN _id INT,
   IN _Nombre VARCHAR(50),
   IN _Grado ENUM("Doctorado","Maestría","Licenciatura"),
   IN _rutaGrado VARCHAR(100),
   IN _Antiguedad INT,
   IN _rutaAntiguedad varchar(100),
   IN _CursoCap INT,
   IN _rutaCursoCap VARCHAR(100),
   --IN _Certificaciones BOOLEAN,
   IN _rutaCertificaciones VARCHAR(100),
   --IN _Diplomados BOOLEAN,
   IN _rutaDiplomados VARCHAR(100),
   --IN _CursosST BOOLEAN,
   IN _rutaCursosST VARCHAR(100),
   IN _Cursos INT,
   IN _rutaCursos VARCHAR(100),
   --IN _InstructorDip BOOLEAN,
   IN _rutaInstructorDip VARCHAR(100),
   --IN _InstructorCer BOOLEAN,
   IN _rutaInstructorCer VARCHAR(100),
   IN _AsesorRes INT,
   IN _rutaAsesorRes VARCHAR(100),
   IN _AsesorTit INT,
   IN _rutaAsesorTit VARCHAR(100),
   --IN _DireccionTesis BOOLEAN,
   IN _rutaDireccionTesis VARCHAR(100))
BEGIN
   IF _id < 0 THEN
      INSERT INTO Empleados (
         Nombre, Grado, rutaGrado, Antiguedad,rutaAntiguedad, CursoCap, rutaCursoCap, /*Certificaciones,*/
         rutaCertificaciones, /*Diplomados,*/ rutaDiplomados, /*CursosST,*/ rutaCursosST,
         Cursos, rutaCursos, /*InstructorDip,*/ rutaInstructorDip, /*InstructorCer,*/
         rutaInstructorCer, AsesorRes, rutaAsesorRes, AsesorTit, rutaAsesorTit,
         /*DireccionTesis,*/ rutaDireccionTesis
      ) VALUES (
         _Nombre, _Grado, _rutaGrado, _Antiguedad,_rutaAntiguedad, _CursoCap, _rutaCursoCap, /*_Certificaciones,*/
         _rutaCertificaciones, /*_Diplomados,*/ _rutaDiplomados, /*_CursosST,*/ _rutaCursosST,
         _Cursos, _rutaCursos, /*_InstructorDip,*/ _rutaInstructorDip, /*_InstructorCer,*/
         _rutaInstructorCer, _AsesorRes, _rutaAsesorRes, _AsesorTit, _rutaAsesorTit,
         /*_DireccionTesis,*/ _rutaDireccionTesis
      );
   ELSEIF _id > 0 THEN
      UPDATE Empleados SET
         Nombre = _Nombre,
         Grado = _Grado,
         Antiguedad = _Antiguedad,
         rutaAntiguedad = _rutaAntiguedad,
         CursoCap = _CursoCap,
         Certificaciones = _Certificaciones,
         Diplomados = _Diplomados,
         CursosST = _CursosST,
         Cursos = _Cursos,
         InstructorDip = _InstructorDip,
         InstructorCer = _InstructorCer,
         AsesorRes = _AsesorRes,
         rutaAsesorRes = _rutaAsesorRes,
         AsesorTit = _AsesorTit,
         DireccionTesis = _DireccionTesis
      WHERE id = _id;
   END IF;
END;
&&

DELIMITER ;

-- TRIGGERS ----------------------------------------------------------------------------------------------------------------------

DROP TRIGGER IF EXISTS actualizar_puntaje_update;
DELIMITER //
CREATE TRIGGER actualizar_puntaje_update AFTER UPDATE ON Empleados
FOR EACH ROW
BEGIN
   DECLARE puntaje INT;

   -- Calcular el puntaje total y verificar documentos
   SET puntaje = 0;

   IF NEW.Grado = 'Doctorado' AND NEW.rutaGrado = 'Aprobado owo' THEN
      SET puntaje = puntaje + 30;
   ELSEIF NEW.Grado = 'Maestría' AND NEW.rutaGrado = 'Aprobado owo' THEN
      SET puntaje = puntaje + 20;
   ELSEIF NEW.Grado = 'Licenciatura' AND NEW.rutaGrado = 'Aprobado owo' THEN
      SET puntaje = puntaje + 10;
   END IF;

   IF NEW.RutaAntiguedad = 'Aprobado owo' THEN
      SET puntaje = puntaje + NEW.Antiguedad * 10;
   END IF;

   IF NEW.CursoCap > 29 AND NEW.rutaCursoCap = 'Aprobado owo' THEN
      SET puntaje = puntaje + 2;
   ELSEIF NEW.CursoCap < 30 AND NEW.rutaCursoCap = 'Aprobado owo' THEN
      SET puntaje = puntaje + 1;
   END IF;

   IF NEW.rutaCertificaciones = 'Aprobado owo' THEN
      SET puntaje = puntaje + 20;
   END IF;

   IF NEW.rutaDiplomados = 'Aprobado owo' THEN
      SET puntaje = puntaje + 10;
   END IF;

   IF NEW.rutaCursosST = 'Aprobado owo' THEN
      SET puntaje = puntaje + 20;
   END IF;

   IF NEW.rutaCursos = 'Aprobado owo' AND NEW.Cursos > 29 THEN
      SET puntaje = puntaje + 15;
   ELSEIF NEW.rutaCursos = 'Aprobado owo' AND NEW.Cursos < 30 THEN
      SET puntaje = puntaje + 7;
   END IF;

   IF NEW.rutaInstructorDip = 'Aprobado owo' THEN
      SET puntaje = puntaje + 15;
   END IF;

   IF NEW.rutaInstructorCer = 'Aprobado owo' THEN
      SET puntaje = puntaje + 20;
   END IF;

   IF NEW.rutaAsesorRes = 'Aprobado owo' THEN
      SET puntaje = puntaje + NEW.AsesorRes;
   END IF;

   IF NEW.rutaAsesorTit = 'Aprobado owo' THEN
      SET puntaje = puntaje + NEW.AsesorTit;
   END IF;

   IF NEW.RutaDireccionTesis = 'Aprobado owo' THEN
      SET puntaje = puntaje + 10;
   END IF;

   -- Actualizar o insertar en la tabla Puntaje
   IF EXISTS (SELECT 1 FROM Puntaje WHERE fkEmpleado = NEW.id) THEN
      -- Actualizar el registro existente
      UPDATE Puntaje SET Puntaje = puntaje WHERE fkEmpleado = NEW.id;
   ELSE
      -- Insertar un nuevo registro
      INSERT INTO Puntaje (fkEmpleado, Puntaje) VALUES (NEW.id, puntaje);
   END IF;
END;
//
DELIMITER ;

/*DROP TRIGGER IF EXISTS actualizar_puntaje_insert;
DELIMITER //
CREATE TRIGGER actualizar_puntaje_insert AFTER INSERT ON Empleados
FOR EACH ROW
BEGIN
   DECLARE puntaje INT;

   -- Calcular el puntaje total y verificar documentos
   SET puntaje = 0;

   IF NEW.Grado = 'Doctorado' AND NEW.rutaGrado = 'Aprobado owo' THEN
      SET puntaje = puntaje + 30;
   ELSEIF NEW.Grado = 'Maestría' AND NEW.rutaGrado = 'Aprobado owo' THEN
      SET puntaje = puntaje + 20;
   ELSEIF NEW.Grado = 'Licenciatura' AND NEW.rutaGrado = 'Aprobado owo' THEN
      SET puntaje = puntaje + 10;
   END IF;

   IF NEW.RutaAntiguedad = 'Aprobado owo' THEN
      SET puntaje = puntaje + NEW.Antiguedad * 10;
   END IF;

   IF NEW.CursoCap > 29 AND NEW.rutaCursoCap = 'Aprobado owo' THEN
      SET puntaje = puntaje + 2;
   ELSEIF NEW.CursoCap < 30 AND NEW.rutaCursoCap = 'Aprobado owo' THEN
      SET puntaje = puntaje + 1;
   END IF;

   IF NEW.rutaCertificaciones = 'Aprobado owo' THEN
      SET puntaje = puntaje + 20;
   END IF;

   IF NEW.rutaDiplomados = 'Aprobado owo' THEN
      SET puntaje = puntaje + 10;
   END IF;

   IF NEW.rutaCursosST = 'Aprobado owo' THEN
      SET puntaje = puntaje + 20;
   END IF;

   IF NEW.rutaCursos = 'Aprobado owo' AND NEW.Cursos > 29 THEN
      SET puntaje = puntaje + 15;
   ELSEIF NEW.rutaCursos = 'Aprobado owo' AND NEW.Cursos < 30 THEN
      SET puntaje = puntaje + 7;
   END IF;

   IF NEW.rutaInstructorDip = 'Aprobado owo' THEN
      SET puntaje = puntaje + 15;
   END IF;

   IF NEW.rutaInstructorCer = 'Aprobado owo' THEN
      SET puntaje = puntaje + 20;
   END IF;

   IF NEW.rutaAsesorRes = 'Aprobado owo' THEN
      SET puntaje = puntaje + NEW.AsesorRes;
   END IF;

   IF NEW.rutaAsesorTit = 'Aprobado owo' THEN
      SET puntaje = puntaje + NEW.AsesorTit;
   END IF;

   IF NEW.RutaDireccionTesis = 'Aprobado owo' THEN
      SET puntaje = puntaje + 10;
   END IF;

   -- Actualizar o insertar en la tabla Puntaje
   IF EXISTS (SELECT 1 FROM Puntaje WHERE fkEmpleado = NEW.id) THEN
      -- Actualizar el registro existente
      UPDATE Puntaje SET Puntaje = puntaje WHERE fkEmpleado = NEW.id;
   ELSE
      -- Insertar un nuevo registro
      INSERT INTO Puntaje (fkEmpleado, Puntaje) VALUES (NEW.id, puntaje);
   END IF;
END;
//
DELIMITER ;*/

delimiter //
drop TRIGGER if not exists after_insertar_usuario;
create trigger after_insertar_usuario AFTER insert on Empleados
for each ROW
BEGIN
call insertarEmpleados(-1,new.Usuario,null,'',null,'',null'',,null,'',null,'',
null,'',null,'',null,'',null,'',null,'',null,'',null,'');



-- ------------------------------------------------------------------------------------------------------------------------

UPDATE Empleados
SET
   Grado = 'Doctorado', 
   Antiguedad = 10,      
   CursoCap = 3,        
   Certificaciones = 1, 
   Diplomados = 1,      
   CursosST = 1,        
   Cursos = 10,         
   InstructorDip = 1,   
   InstructorCer = 0,   
   AsesorRes = 2,       
   AsesorTit = 1,      
   DireccionTesis = 1   
WHERE id = 2; 

SELECT * FROM VistaPuntajes;