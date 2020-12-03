# AS_WEB
Atividade Semestral - Programação WEB (ULBRA-CANOAS)

# Aluno
Lucas Bins Braga

# SCRIPT PARA USAR NO MYSQL

create schema webcursos;

USE webcursos;

CREATE TABLE tb_users(
	idusuario INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(64) NOT NULL,
    senha VARCHAR(256) NOT NULL,
    nome VARCHAR(256),
    email VARCHAR(256),
    fone VARCHAR(11),
    nasc DATE,
    dtcadastro TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP()
);

CREATE TABLE tb_cursos(
	idcurso INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nomecurso VARCHAR(150),
    url VARCHAR(256),
    tempodecurso VARCHAR(10),
    img VARCHAR(256),
    descriçao VARCHAR(256)
);

CREATE TABLE tb_user_curso(
	idusercurso INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    fk_user INT NOT NULL REFERENCES tb_user(idusuario),
    fk_curso INT NOT NULL REFERENCES tb_curso(idcurso),
    concluido BOOLEAN,
	iniciocurso TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP()
)
