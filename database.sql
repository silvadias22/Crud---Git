   drop database CrudProfissional;
   create database CrudProfissional;
   use CrudProfissional;
   
   
   -- Tabela para armazenamento dos dados do Profissional.
   
    CREATE TABLE Profissional (
		idProfissional int NOT NULL PRIMARY KEY AUTO_INCREMENT,
		nome VARCHAR(30) NOT NULL,
		idade VARCHAR(3) NOT NULL,
		nascimento DATE NOT NULL,
		sexo CHAR(1) NOT NULL,
		estadoCivil VARCHAR(15) NOT NULL,
		habilidade VARCHAR(40),
		vinculo VARCHAR(15) NOT NULL,
		horarioEntrada VARCHAR(10),
		horarioSaida VARCHAR(10),
		observacao VARCHAR(500)
	);
		
	-- Tabela para armazenamento dos dados de Endereco do Profissional.		
	CREATE TABLE Endereco (
		idEndereco int NOT NULL PRIMARY KEY AUTO_INCREMENT,
		idProfissional int NOT NULL,
		logradouro VARCHAR(30),
		cidade VARCHAR(30) NOT NULL,
		bairro VARCHAR(30) NOT NULL,
		numero VARCHAR(4) NOT NULL,
		tipoEndereco VARCHAR(15)NOT NULL,
		complemento VARCHAR(30),
		cep VARCHAR(9) NOT NULL,
		uf VARCHAR(2) NOT NULL
	);
	
	-- Tabela para armazenamento dos dados de contato do Profissional.
		CREATE TABLE Contato (
		idContato int NOT NULL PRIMARY KEY AUTO_INCREMENT,
		idProfissional int NOT NULL,
		tipoTelefone VARCHAR(15)NOT NULL,
		operadora VARCHAR(15)NOT NULL,
		numero varchar(15) NOT NULL,
		tipoEmail VARCHAR(15)NOT NULL,
		Email VARCHAR(30)NOT NULL
		
	);
	
	-- Alterações posterior a criação das tabelas, processo de inclusão de chaves estrangeiras.
	-- A inclusão da chave "IdProfissional"	na tabela de Endereços;
	ALTER TABLE Endereco
	ADD CONSTRAINT fk_Profissional_Endereco
	FOREIGN KEY (idProfissional) REFERENCES Profissional (idProfissional) ;
	
	-- A inclusão da chave "IdProfissional"	na tabela de Contato;
	ALTER TABLE Contato
	ADD CONSTRAINT fk_Profissional_Contato
	FOREIGN KEY (idProfissional) REFERENCES Profissional (idProfissional) ;