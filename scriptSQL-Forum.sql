#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: role
#------------------------------------------------------------

CREATE TABLE role(
        id   Int  Auto_increment  NOT NULL ,
        name Varchar (100) NOT NULL
	,CONSTRAINT role_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: user
#------------------------------------------------------------

CREATE TABLE user(
        id            Int  Auto_increment  NOT NULL ,
        pseudo        Varchar (100) NOT NULL ,
        mail          Varchar (255) NOT NULL ,
        password      Varchar (100) NOT NULL ,
        register_date Date NOT NULL ,
        id_role       Int NOT NULL
	,CONSTRAINT user_PK PRIMARY KEY (id)

	,CONSTRAINT user_role_FK FOREIGN KEY (id_role) REFERENCES role(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: subject
#------------------------------------------------------------

CREATE TABLE subject(
        id            Int  Auto_increment  NOT NULL ,
        title         Varchar (100) NOT NULL ,
        description   Varchar (255) NOT NULL ,
        creation_date Date NOT NULL ,
        id_user       Int NOT NULL
	,CONSTRAINT subject_PK PRIMARY KEY (id)

	,CONSTRAINT subject_user_FK FOREIGN KEY (id_user) REFERENCES user(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: article
#------------------------------------------------------------

CREATE TABLE article(
        id                Int  Auto_increment  NOT NULL ,
        title             Varchar (100) NOT NULL ,
        content           Text NOT NULL ,
        creation_date     Date NOT NULL ,
        modification_date Date ,
        id_user           Int NOT NULL ,
        id_subject        Int NOT NULL
	,CONSTRAINT article_PK PRIMARY KEY (id)

	,CONSTRAINT article_user_FK FOREIGN KEY (id_user) REFERENCES user(id)
	,CONSTRAINT article_subject0_FK FOREIGN KEY (id_subject) REFERENCES subject(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: note
#------------------------------------------------------------

CREATE TABLE note(
        id         Int  Auto_increment  NOT NULL ,
        value      Int NOT NULL ,
        id_user    Int NOT NULL ,
        id_article Int NOT NULL
	,CONSTRAINT note_PK PRIMARY KEY (id)

	,CONSTRAINT note_user_FK FOREIGN KEY (id_user) REFERENCES user(id)
	,CONSTRAINT note_article0_FK FOREIGN KEY (id_article) REFERENCES article(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: comment
#------------------------------------------------------------

CREATE TABLE comment(
        id                Int  Auto_increment  NOT NULL ,
        content           Text NOT NULL ,
        creation_date     Date NOT NULL ,
        modification_date Date ,
        id_article        Int NOT NULL ,
        id_user           Int NOT NULL
	,CONSTRAINT comment_PK PRIMARY KEY (id)

	,CONSTRAINT comment_article_FK FOREIGN KEY (id_article) REFERENCES article(id)
	,CONSTRAINT comment_user0_FK FOREIGN KEY (id_user) REFERENCES user(id)
)ENGINE=InnoDB;

