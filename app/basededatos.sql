CREATE TABLE USUARIOS(
    CODUSUARIO INT NOT NULL AUTO_INCREMENT,
    NOMBRES CHAR(50) NOT NULL,
    APEPATERNO CHAR(50) NOT NULL,
    APEMATERNO CHAR(50) NOT NULL,
    CELULAR VARCHAR(15) NOT NULL,
    CORREO CHAR(100) NOT NULL, 
    USUARIO VARCHAR(50) NOT NULL,
    CONTRASENA CHAR(50) NOT NULL,
    ESTADO CHAR(1) NOT NULL,
    PRIMARY KEY(CODUSUARIO),
);

INSERT INTO 'USUARIOS'('CODUSUARIO','NOMBRES','APEPATERNO','APEMATERNO','CELULAR','CORREO','USUARIO','CONTRASENA','ESTADO') VALUES
                      ('1','Brayan Jhoel ','Espinoza','Sánchez','921071231','brayan.espinoza.sanchez.18@gmail.com','Jhoel26','Barcelona052022','1'),
                      ('2', 'Nielhs Amedt','Davalos','Herrera','949973144','nielhsdavalos04@gmail.com','AmedtDh','2228DN','1'),
                      ('3','Rubek Jeampier','Quispe','Velasquez','917390964','rubeks29@gmail.com','RubeksQuispe','2R6Q30', '1'),
                      ('4','Jose Eduardo','Sanchez','Navarro','989041249','joseeduardo.28.02.03@gmail.com','EduardoSnv','SN56','1'),