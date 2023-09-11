CREATE DATABASASE if NOT EXISTS Escalafon;
USE Escalafon;n;
              
  CREATE TABLELE IF NOT EXISTS Login (
    Id INT AUTUTO_INCREMENT PRIMARY KEY NOT NULL,
    Usuario VAVARCHAR(255) NOT NULL,
    Contraseñaña VARCHAR(255) NOT NULL);
              
CREATE TABLE E Empleados(
    id INT PRIRIMARY KEY AUTO_INCREMENT NOT NULL,
    Nombre VARARCHAR(50),
    Grado ENUMUM("Doctorado","Maestría","Licenciatura"),
    Antiguedadad INT,
    CursoCap I INT,
    Certificacaciones BOOLEAN,
    Diplomadosos BOOLEAN,
    CursosST B BOOLEAN,
    Cursos INTNT,
    InstructororDip BOOLEAN,
    InstructororCer BOOLEAN,
    AsesorRes s INT,
    AsesorTit t INT,
    DireccionTnTesis BOOLEAN);
              
    CREATE TABABLE if NOT EXISTS Puntaje(
        id INTNT PRIMARY KEY AUTO_INCREMENT NOT NULL,
        fkEmplpleado INT,
        Puntajaje INT,
        FOREIGIGN KEY(fkEmpleado) REFERENCES Empleados(id));
              
              
    CREATE USESER IF NOT EXISTS 'userPro'@'localhost' IDENTIFIED BY '123';
    GRANT ALL L PRIVILEGES ON Escalafon.* TO 'userPro'@'localhost';
  FLUSH PRIVILILEGES;
              
DROP PROCEDURERE if EXISTS insertarEmpleados;
delimiter &&  
CREATE PROCEDUDURE insertarEmpleados(
    IN _id INTNT,
    IN _Nombrere VARCHAR(50),
    IN _Grado o ENUM("Doctorado","Maestría","Licenciatura"),
    IN _Antiguguedad INT,
    IN _CursoCoCap INT,
    IN _Certifificaciones BOOLEAN,
    IN _Diplomomados BOOLEAN,
    IN _CursososST BOOLEAN,
    IN _Cursosos INT,
    IN _InstruructorDip BOOLEAN,
    IN _InstruructorCer BOOLEAN,
    IN _AsesororRes INT,
    IN _AsesororTit INT,
    IN _DireccccionTesis BOOLEAN)
    BEGIN     
    if _id < 0 0 THEN
    INSERT INTNTO Empleados VALUES(NULL,_Nombre,_Grado,_Antiguedad,_CursoCap,_Certificaciones,_Diplomados,
                                  _CursosST,_Cursos,_InstructorDip,_InstructorCer,_AsesorRes,_AsesorTit,
                                  _DireccionTesis);
    ELSEIF _idid > 0 THEN
    UPDATE Empmpleados SET Grado=_Grado, Antiguedad=_Antiguedad, CursoCap=_CursoCap, Certificaciones=_Certificaciones,
    Diplomadosos=_Diplomados, CursosST=_CursosST, Cursos=_Cursos, InstructorDip=_InstructorDip, InstructorCer=_InstructorCer,
    AsesorRes=s=_AsesorRes, AsesorTit=_AsesorTit, DireccionTesis=_DireccionTesis WHERE id=_id;
    END if;   
    END;      
    &&        
delimiter ;