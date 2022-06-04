/*Creando la BD con la codificación correcta*/
CREATE DATABASE aula_cw CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
/*Ideas: 
cambiar los tipos de ID de INT a SMALLINT 
aplicar la restricción default*/

/*Creando la tabla ESTADO*/ 
/*Esta ya está lista*/
CREATE TABLE ESTADO(
    ID_ESTADO INT PRIMARY KEY AUTO_INCREMENT,
    estado VARCHAR(25)    
);

/*Esta es la tabla GRADO*/
-- Le añadí un AUTO_INCREMENT 
CREATE TABLE GRADO(
    ID_GRADO TINYINT PRIMARY KEY AUTO_INCREMENT,
    grado VARCHAR(6) UNIQUE
);

/*Esta es la tabla CICLOS*/
/*En duda*/
CREATE TABLE CICLOS(
    ID_CICLOS SMALLINT PRIMARY KEY AUTO_INCREMENT,
    ciclos CHAR(20) 
);

/*Esta es la tabla PRIVACIDAD*/
-- Le añadí un AUTO_INCREMENT
CREATE TABLE PRIVACIDAD(
    ID_PRIV TINYINT PRIMARY KEY AUTO_INCREMENT, 
    privacidad CHAR(25)
); 

/*Esta es la tabla MATERIAS*/
CREATE TABLE MATERIAS(
    ID_MATERIAS TINYINT PRIMARY KEY, 
    materias CHAR(50)
); 

/*Esta es la tabla ROL_USER*/
-- Le añadí un AUTO_INCREMENT
CREATE TABLE ROL_USER(
    ID_ROL TINYINT PRIMARY KEY AUTO_INCREMENT,
    rol CHAR(50) 
);

/*Esta es la tabla GRUPO*/
CREATE TABLE GRUPO(
    ID_GRUPO SMALLINT PRIMARY KEY, 
    grupo SMALLINT UNIQUE
);

/*Esta es la tabla TIPO_ASIGN*/
-- Le añadí un AUTO_INCREMENT
CREATE TABLE TIPO_ASIGN(
    ID_TIPO_ASIGN TINYINT PRIMARY KEY AUTO_INCREMENT, 
    tipo_asign CHAR(25)
);

/*Esta es la tabla ESTADO_ENTREGA*/
CREATE TABLE ESTADO_ENTREGA(
    ID_ESTADO_ENTREGA TINYINT PRIMARY KEY AUTO_INCREMENT, 
    estado CHAR(50) 
);

/*Esta es la tabla TIPO_USER*/
CREATE TABLE TIPO_USER(
    ID_TIPO_USER INT PRIMARY KEY, 
    estado VARCHAR(25)
);


/*Esta es la tabla TIPO_AULA*/
/*Esta tiene una FK*/
CREATE TABLE TIPO_AULA(
    ID_TIPO_AULA TINYINT PRIMARY KEY, 
    ID_PRIV TINYINT,
    FOREIGN KEY(ID_PRIV) REFERENCES PRIVACIDAD(ID_PRIV),
    tipo CHAR(15)
);

/*Esta es la tabla AULA*/
/*Tiene FKs */
CREATE TABLE AULA(
    ID_AULA CHAR(50), /*El ID será una cadena aleatoria*/
    ID_MATERIAS TINYINT,
    FOREIGN KEY(ID_MATERIAS) REFERENCES MATERIAS(ID_MATERIAS),
    ID_GRUPO SMALLINT,
    FOREIGN KEY(ID_GRUPO) REFERENCES GRUPO(ID_GRUPO),
    ID_CICLOS SMALLINT /*AUTO_INCREMENT*/, 
    FOREIGN KEY(ID_CICLOS) REFERENCES CICLOS(ID_CICLOS),
    ID_GRADO TINYINT, 
    FOREIGN KEY(ID_GRADO) REFERENCES GRADO(ID_GRADO), 
    ID_TIPO_AULA TINYINT,
    FOREIGN KEY(ID_TIPO_AULA) REFERENCES TIPO_AULA(ID_TIPO_AULA)
    nombre CHAR(50),
    reuniones_id CHAR(250),
    descripcion CHAR(250), 
    ruta foto CHAR(50),
    seccion VARCHAR(1)   
);

/*Esta es la tabla USUARIO*/
/*Tiene FKs*/
CREATE TABLE USUARIO(
    ID_USUARIO INT PRIMARY KEY, 
    ID_ESTADO INT /*Auto increment*/,
    FOREIGN KEY(ID_ESTADO) REFERENCES ESTADO(ID_ESTADO),
    ID_TIPO_USER INT, 
    FOREIGN KEY(ID_TIPO_USER) REFERENCES TIPO_USER(ID_TIPO_USER),
    ID_GRADO TINYINT, 
    FOREIGN KEY(ID_GRADO) REFERENCES GRADO(ID_GRADO),
    nombre CHAR(50),
    apodo CHAR(50) UNIQUE, 
    apellido_paterno CHAR(50),
    apellido_materno CHAR(50), 
    num_identificador INT UNIQUE, 
    correo CHAR(80) UNIQUE, 
    ruta_foto CHAR(50), 
    estado_unico CHAR(50),
    teléfono INT
);

/*Esta es la tabla Aula has Usuario*/
/*Tiene FKs */
CREATE TABLE AULAHASUSUARIO(
    ID_AHU INT PRIMARY KEY AUTO_INCREMENT,
    ID_USUARIO INT, 
    FOREIGN KEY(ID_USUARIO) REFERENCES USUARIO(ID_USUARIO),
    ID_AULA CHAR(50),
    FOREIGN KEY(ID_AULA) REFERENCES AULA(ID_AULA),
    ID_ROL TINYINT, 
    FOREIGN KEY(ID_ROL) REFERENCES ROL_USER(ID_ROL)
    
);

/*Esta es la tabla Usuario has Intereses*/
/*Tiene FKs*/
CREATE TABLE USUARIOHASINTERESES(
    ID_UHI INT PRIMARY KEY AUTO_INCREMENT, 
    ID_MATERIAS TINYINT, 
    FOREIGN KEY(ID_MATERIAS) REFERENCES MATERIAS(ID_MATERIAS), 
    ID_USUARIO INT, 
    FOREIGN KEY(ID_USUARIO) REFERENCES USUARIO(ID_USUARIO) 
);

/*Esta es la tabla Usuario has Insignias*/
/*Tiene FKs*/
CREATE TABLE USUARIOHASINSIGNIAS(
    ID_USUARIO_HAS_INSIGNIAS INT PRIMARY KEY AUTO_INCREMENT, 
    ID_MATERIAS TINYINT, 
    FOREIGN KEY(ID_MATERIAS) REFERENCES MATERIAS(ID_MATERIAS), 
    ID_USUARIO INT, 
    FOREIGN KEY(ID_USUARIO) REFERENCES USUARIO(ID_USUARIO), 
    ID_AULA CHAR(50), 
    FOREIGN KEY(ID_AULA) REFERENCES AULA(ID_AULA), 
    nombre_insignia CHAR(50) 
);





-- Estas son las tablas que debes añadir al archivo de draw.io
CREATE TABLE BLOQUE(
    ID_BLOQUE TINYINT PRIMARY KEY, 
    ruta_foto CHAR(100), 
    titulo CHAR(60) UNIQUE NOT NULL,
    descripcion CHAR(200) UNIQUE NULL,  
    ID_AULA CHAR(50),
    FOREIGN KEY(ID_AULA) REFERENCES AULA(ID_AULA),
);


CREATE TABLE TEMA(
    ID_TEMA TINYINT PRIMARY KEY AUTO_INCREMENT, 
    titulo CHAR(60) UNIQUE, 
    descripcion CHAR(200), 
    ID_BLOQUE TINYINT, 
    FOREIGN KEY(ID_BLOQUE) REFERENCES BLOQUE(ID_BLOQUE) 
);


CREATE TABLE ASIGNACION(
    ID_ASIGN INT PRIMARY KEY AUTO_INCREMENT, 
    titulo CHAR(60), 
    indicaciones CHAR(200),
    ID_USUARIO INT, 
    FOREIGN KEY(ID_USUARIO) REFERENCES USUARIO(ID_USUARIO),
    puntos INT, 
    fecha_asignacion DATETIME NOT NULL, 
    fecha_limite DATETIME NOT NULL, 
    ID_BLOQUE TINYINT, 
    FOREIGN KEY(ID_BLOQUE) REFERENCES BLOQUE(ID_BLOQUE), 
    ID_TEMA TINYINT, 
    FOREIGN KEY(ID_TEMA) REFERENCES TEMA(ID_TEMA), 
    -- rubrica
    ID_AULA CHAR(50),
    FOREIGN KEY(ID_AULA) REFERENCES AULA(ID_AULA),
    ID_TIPO_ASIGN TINYINT, 
    FOREIGN KEY(ID_TIPO_ASIGN) REFERENCES TIPO_ASIGN(ID_TIPO_ASIGN), 
);

CREATE TABLE USERHASASIGNACION(
    ID_UHA INT PRIMARY KEY AUTO_INCREMENT, 
    ID_USUARIO INT, 
    FOREIGN KEY(ID_USUARIO) REFERENCES USUARIO(ID_USUARIO), 
    ID_ASIGN INT, 
    FOREIGN KEY(ID_ASIGN) REFERENCES ASIGNACION(ID_ASIGN), 
    ID_ESTADO_ENTREGA TINYINT, 
    FOREIGN KEY(ID_ESTADO_ENTREGA) REFERENCES ESTADO_ENTREGA(ID_ESTADO_ENTREGA)
    fecha_entrega DATETIME NOT NULL, 
    calificacion TINYINT, 
    texto_tarea CHAR(200)
);

CREATE TABLE ARCH_ENTREGA(
    ID_ARCH_ENTREGA PRIMARY KEY AUTO_INCREMENT, 
    nombre CHAR(50), 
    ruta_archivo CHAR(100), 
    tipo_extension CHAR(100), 
    ID_UHA INT, 
    FOREIGN KEY(ID_UHA) REFERENCES USERHASASIGNACION(ID_UHA)
);

CREATE TABLE LINKS_ASIGNACION(
    ID_LINKASIGN INT PRIMARY KEY AUTO_INCREMENT, 
    link CHAR(100), 
    ID_AULA CHAR(50), 
    FOREIGN KEY(ID_AULA) REFERENCES AULA(ID_AULA)
);

/* -------------------------------------------------------------------------------------------------*/









