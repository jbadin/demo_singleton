#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: users
#------------------------------------------------------------

CREATE TABLE users(
        id       Int  Auto_increment  NOT NULL ,
        mail     Varchar (100) NOT NULL ,
        password Varchar (100) NOT NULL
	,CONSTRAINT users_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: clients
#------------------------------------------------------------

CREATE TABLE clients(
        id        Int  Auto_increment  NOT NULL ,
        lastname  Varchar (50) NOT NULL ,
        firstname Varchar (50) NOT NULL ,
        birthdate Date NOT NULL ,
        id_users  Int NOT NULL
	,CONSTRAINT clients_PK PRIMARY KEY (id)

	,CONSTRAINT clients_users_FK FOREIGN KEY (id_users) REFERENCES users(id)
	,CONSTRAINT clients_users_AK UNIQUE (id_users)
)ENGINE=InnoDB;

