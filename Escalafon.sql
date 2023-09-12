DROP DATABASE if EXISTS Escalafon;
CREATE DATABASE Escalafon;
USE Escalafon;

DROP TABLE if EXISTS Login;
CREATE TABLE Login (
   Id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
   Usuario VARCHAR(255) NOT NULL,
   Contrasena VARCHAR(255) NOT NULL
);  
    
INSERT INTO Login VALUES (NULL, 'Alfre', '123');
SELECT * FROM login;

SELECT * FROM Login WHERE Usuario = 'Alfre' AND Contrasena = '123';

DROP TABLE if EXISTS Empleados;
CREATE TABLE Empleados(
   id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
   Nombre VARCHAR(50),
   Grado ENUM("Doctorado","Maestría","Licenciatura"),
   Antiguedad INT,
   CursoCap INT,
   Certificaciones BOOLEAN,
   Diplomados BOOLEAN,
   CursosST BOOLEAN,
   Cursos INT,
   InstructorDip BOOLEAN,
   InstructorCer BOOLEAN,
   AsesorRes INT,
   AsesorTit INT,
   DireccionTesis BOOLEAN
);
INSERT INTO Empleados (Nombre, Grado, Antiguedad, CursoCap, Certificaciones, Diplomados, CursosST, Cursos, InstructorDip, InstructorCer, AsesorRes, AsesorTit, DireccionTesis)
VALUES
('Juan Pérez', 'Maestría', 5, 3, true, false, true, 2, true, false, 1, 0, true),
('María López', 'Licenciatura', 2, 4, false, true, false, 0, false, true, 0, 2, FALSE);

SELECT * FROM empleados;
    
DROP TABLE if EXISTS Puntaje;
CREATE TABLE Puntaje(
   id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
   fkEmpleado INT,
   Puntaje INT,
   FOREIGN KEY(fkEmpleado) REFERENCES Empleados(id)
); 
INSERT INTO puntaje VALUES(NULL, 1, 100);  
SELECT * FROM puntaje; 

CREATE VIEW VistaPuntajes AS
SELECT E.Nombre AS NombreEmpleado, P.Puntaje
FROM Puntaje P
INNER JOIN Empleados E ON P.fkEmpleado = E.id;

SELECT * FROM VistaPuntajes;
    
CREATE USER IF NOT EXISTS 'userPro'@'localhost' IDENTIFIED BY '123';
GRANT ALL PRIVILEGES ON Escalafon.* TO 'userPro'@'localhost';
FLUSH PRIVILEGES;    
    
DROP PROCEDURE if EXISTS insertarEmpleados;
delimiter &&
CREATE PROCEDURE insertarEmpleados(
   IN _id INT,
   IN _Nombre VARCHAR(50),
   IN _Grado ENUM("Doctorado","Maestría","Licenciatura"),
   IN _Antiguedad INT,
   IN _CursoCap INT,
   IN _Certificaciones BOOLEAN,
   IN _Diplomados BOOLEAN,
   IN _CursosST BOOLEAN,
   IN _Cursos INT,
   IN _InstructorDip BOOLEAN,
   IN _InstructorCer BOOLEAN,
   IN _AsesorRes INT,
   IN _AsesorTit INT,
   IN _DireccionTesis BOOLEAN)
   BEGIN
   if _id < 0 THEN
   INSERT INTO Empleados VALUES(NULL,_Nombre,_Grado,_Antiguedad,_CursoCap,_Certificaciones,_Diplomados,
                               _CursosST,_Cursos,_InstructorDip,_InstructorCer,_AsesorRes,_AsesorTit,
                               _DireccionTesis);
   ELSEIF _id > 0 THEN
   UPDATE Empleados SET Grado=_Grado, Antiguedad=_Antiguedad, CursoCap=_CursoCap, Certificaciones=_Certificaciones,
   Diplomados=_Diplomados, CursosST=_CursosST, Cursos=_Cursos, InstructorDip=_InstructorDip, InstructorCer=_InstructorCer,
   AsesorRes=_AsesorRes, AsesorTit=_AsesorTit, DireccionTesis=_DireccionTesis WHERE id=_id;
   END if;
   END;
   &&
delimiter ;


-- TRIGGERS ----------------------------------------------------------------------------------------------------------------------

DROP TRIGGER if EXISTS actualizar_puntaje_update;
DELIMITER //
CREATE TRIGGER actualizar_puntaje_update AFTER UPDATE ON empleados
FOR EACH ROW
BEGIN
   DECLARE puntaje INT;
    
   -- Calcular el puntaje total
   SET puntaje = 0;

   IF NEW.Grado = 'Doctorado' THEN
      SET puntaje = puntaje + 30;
   ELSEIF NEW.Grado = 'Maestría' THEN
      SET puntaje = puntaje + 20;
   ELSEIF NEW.Grado = 'Licenciatura' THEN
      SET puntaje = puntaje + 10;
   END IF;

   SET puntaje = puntaje + NEW.Antiguedad * 10;

   IF NEW.CursoCap > 29 THEN
      SET puntaje = puntaje + 2;
   ELSE 
   	SET puntaje = puntaje + 1;
   END IF;

   IF NEW.Certificaciones = TRUE THEN
      SET puntaje = puntaje + 20;
   END IF;

   IF NEW.Diplomados = TRUE THEN
      SET puntaje = puntaje + 10;
   END IF;

   IF NEW.CursosST = TRUE THEN
      SET puntaje = puntaje + 20;
   END IF;
    
   SET puntaje = puntaje + NEW.Cursos * 10;

   IF NEW.InstructorDip = TRUE THEN
      SET puntaje = puntaje + 15;
   END IF;
   
   IF NEW.InstructorCer = TRUE THEN
      SET puntaje = puntaje + 20;
   END IF;

   SET puntaje = puntaje + NEW.AsesorRes * 5;

   SET puntaje = puntaje + NEW.AsesorTit * 5;
    
   IF NEW.DireccionTesis = TRUE THEN
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

DROP TRIGGER if EXISTS actualizar_puntaje_insert;
DELIMITER //
CREATE TRIGGER actualizar_puntaje_insert AFTER INSERT ON empleados
FOR EACH ROW
BEGIN
   DECLARE puntaje INT;
    
   -- Calcular el puntaje total
   SET puntaje = 0;

   IF NEW.Grado = 'Doctorado' THEN
      SET puntaje = puntaje + 30;
   ELSEIF NEW.Grado = 'Maestría' THEN
      SET puntaje = puntaje + 20;
   ELSEIF NEW.Grado = 'Licenciatura' THEN
      SET puntaje = puntaje + 10;
   END IF;

   SET puntaje = puntaje + NEW.Antiguedad * 10;

   IF NEW.CursoCap > 29 THEN
      SET puntaje = puntaje + 2;
   ELSE 
   	SET puntaje = puntaje + 1;
   END IF;

   IF NEW.Certificaciones = TRUE THEN
      SET puntaje = puntaje + 20;
   END IF;

   IF NEW.Diplomados = TRUE THEN
      SET puntaje = puntaje + 10;
   END IF;

   IF NEW.CursosST = TRUE THEN
      SET puntaje = puntaje + 20;
   END IF;
    
   SET puntaje = puntaje + NEW.Cursos * 10;

   IF NEW.InstructorDip = TRUE THEN
      SET puntaje = puntaje + 15;
   END IF;
   
   IF NEW.InstructorCer = TRUE THEN
      SET puntaje = puntaje + 20;
   END IF;

   SET puntaje = puntaje + NEW.AsesorRes * 5;

   SET puntaje = puntaje + NEW.AsesorTit * 5;
    
   IF NEW.DireccionTesis = TRUE THEN
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

-- ------------------------------------------------------------------------------------------------------------------------

SELECT * FROM empleados;
SELECT * FROM VistaPuntajes;
DESCRIBE empleados;

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