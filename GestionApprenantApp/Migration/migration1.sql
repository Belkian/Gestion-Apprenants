#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: CLASSE
#------------------------------------------------------------

CREATE TABLE GestionApp_CLASSE(
        ID_CLASS         Int  Auto_increment  NOT NULL ,
        NOM              Varchar (255) NOT NULL ,
        NOMBRE_APPRENANT Int NOT NULL
	,CONSTRAINT GestionApp_CLASSE_PK PRIMARY KEY (ID_CLASS)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: COURS
#------------------------------------------------------------

CREATE TABLE GestionApp_COURS(
        ID_COURS       Int  Auto_increment  NOT NULL ,
        DATETIME_DEBUT Datetime NOT NULL ,
        DATETIME_FIN   Datetime NOT NULL ,
        CODE           Int NOT NULL ,
        ID_CLASS       Int NOT NULL
	,CONSTRAINT GestionApp_COURS_PK PRIMARY KEY (ID_COURS)

	,CONSTRAINT GestionApp_COURS_CLASSE_FK FOREIGN KEY (ID_CLASS) REFERENCES GestionApp_CLASSE(ID_CLASS)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ROLE
#------------------------------------------------------------

CREATE TABLE GestionApp_ROLE(
        ID_ROLE Int  Auto_increment  NOT NULL ,
        NAME    Varchar (255) NOT NULL
	,CONSTRAINT GestionApp_ROLE_PK PRIMARY KEY (ID_ROLE)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: USER
#------------------------------------------------------------

CREATE TABLE GestionApp_USER(
        ID_USER  Int  Auto_increment  NOT NULL ,
        NOM      Varchar (50) NOT NULL ,
        PRENOM   Varchar (50) NOT NULL ,
        PASSWORD Varchar (255) NOT NULL ,
        EMAIL    Varchar (100) NOT NULL ,
        ID_ROLE  Int NOT NULL
	,CONSTRAINT GestionApp_USER_AK UNIQUE (EMAIL)
	,CONSTRAINT GestionApp_USER_PK PRIMARY KEY (ID_USER)

	,CONSTRAINT GestionApp_USER_ROLE_FK FOREIGN KEY (ID_ROLE) REFERENCES GestionApp_ROLE(ID_ROLE)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: USERhasCOURS
#------------------------------------------------------------

CREATE TABLE GestionApp_USERHASCOURS(
        ID_COURS Int NOT NULL ,
        ID_USER  Int NOT NULL ,
        ABSENT   TinyINT NOT NULL
	,CONSTRAINT GestionApp_USERHASCOURS_PK PRIMARY KEY (ID_COURS,ID_USER)

	,CONSTRAINT GestionApp_USERHASCOURS_COURS_FK FOREIGN KEY (ID_COURS) REFERENCES GestionApp_COURS(ID_COURS)
	,CONSTRAINT GestionApp_USERHASCOURS_USER0_FK FOREIGN KEY (ID_USER) REFERENCES GestionApp_USER(ID_USER)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: USERhasCLASSE
#------------------------------------------------------------

CREATE TABLE GestionApp_USERHASCLASSE(
        ID_CLASS Int NOT NULL ,
        ID_USER  Int NOT NULL
	,CONSTRAINT GestionApp_USERHASCLASSE_PK PRIMARY KEY (ID_CLASS,ID_USER)

	,CONSTRAINT GestionApp_USERHASCLASSE_CLASSE_FK FOREIGN KEY (ID_CLASS) REFERENCES GestionApp_CLASSE(ID_CLASS)
	,CONSTRAINT GestionApp_USERHASCLASSE_USER0_FK FOREIGN KEY (ID_USER) REFERENCES GestionApp_USER(ID_USER)
)ENGINE=InnoDB;

