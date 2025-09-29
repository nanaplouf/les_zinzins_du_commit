#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------
CREATE DATABASE IF NOT EXISTS `zinzindb`;
USE `zinzindb`;

CREATE TABLE IF NOT EXISTS `role`(
    `id_role` Int Auto_increment NOT NULL,
    `name` Varchar (20) NOT NULL,
    CONSTRAINT `role_pk` PRIMARY KEY (`id_role`)
);

CREATE TABLE IF NOT EXISTS `user`(
    `id_user` Int Auto_increment NOT NULL,
    `pseudo` Varchar (50) NOT NULL,
    `password` Varchar (255) NOT NULL,
    `email` Varchar (255) NOT NULL,
    `picture` Varchar (255),
    `description` Text,
    `creation_date` Date NOT NULL,
    `id_role` INT NOT NULL,
    CONSTRAINT `user_pk` PRIMARY KEY (`id_user`),
    CONSTRAINT `user_role_FK` FOREIGN KEY (`id_role`) REFERENCES role(id_role)
);

CREATE TABLE IF NOT EXISTS `commit`(
    `id_commit` Int Auto_increment NOT NULL,
    `text` Text NOT NULL,
    `creation_date` Date NOT NULL,
    `modification_date` Date,
    `picture` Varchar (255),
    `like_reaction` Int,
    `supports_reaction` Int,
    `funny_reaction` Int,
    `skeptical_reaction` Int,
    `id_user` INT NOT NULL,
    CONSTRAINT `commit_pk` PRIMARY KEY (`id_commit`),
    CONSTRAINT `commit_user_FK` FOREIGN KEY (`id_user`) REFERENCES user(id_user)
);

CREATE TABLE IF NOT EXISTS `comment`(
    `id_comment` Int Auto_increment NOT NULL,
    `text` Text NOT NULL,
    `creation_date` Date NOT NULL,
    `modification_date` Date,
    `id_commit` INT NOT NULL,
    `id_user` INT NOT NULL,
    CONSTRAINT `comment_pk` PRIMARY KEY (`id_comment`),
    CONSTRAINT `comment_commit_FK` FOREIGN KEY (`id_commit`) REFERENCES commit(id_commit),
    CONSTRAINT `user_comment_FK` FOREIGN KEY (`id_user`) REFERENCES user(id_user)
);
