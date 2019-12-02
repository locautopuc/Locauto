/* OS cruds abaixo são apenas para mostrar para o professor */

CREATE DATABASE locauto;
USE locauto;

/* tabela de cadastro de usuario */
CREATE TABLE `locauto`.`tabela_cadastro_usuario` (
`ID_usuario` int AUTO_INCREMENT PRIMARY KEY NOT NULL,
`escolher` VARCHAR(4) NOT NULL,
`cpf_cnpj` int(14) NOT NULL,
`nome` VARCHAR(250) NOT NULL,
`razao_social` VARCHAR(50) NULL,
`identidade` int(10) NULL,
`telefone` int(11) NOT NULL,
`email` VARCHAR(100) NOT NULL,
`senha` VARCHAR(8) NOT NULL,
`logradouro` VARCHAR(50) NOT NULL,
`numero` int(5) NOT NULL,
`complemento` VARCHAR(255) NOT NULL,
`bairro` VARCHAR(50) NOT NULL,
`cidade` VARCHAR(50) NOT NULL,
`estado` VARCHAR(50) NOT NULL,
`cep` int(10) NOT NULL,
UNIQUE KEY unique_email (`email`),
UNIQUE KEY unique_cpf_cnpj (`cpf_cnpj`)
);

INSERT INTO tabela_cadastro_usuario (escolher,cpf_cnpj,nome,razao_social,identidade,telefone,email,senha,logradouro,numero,complemento,bairro,cidade,estado,cep)
VALUE ('cpf','12345678912','alguem','','1231231245','1231231245','hue@hue.com','123','ali','100','rua','centro','goiania','go','1231231245');

SELECT * from tabela_cadastro_usuario WHERE ID_usuario = 1;

UPDATE tabela_cadastro_usuario SET senha = 'admin' WHERE ID_usuario = 1;

DELETE FROM tabela_cadastro_usuario WHERE ID_usuario = 1;

/************************************************************************/

/* tabela de locacao */
/*
CREATE TABLE `locauto`.`tabela_cadastro_locacao` (
`ID_locacao` int AUTO_INCREMENT PRIMARY KEY NOT NULL,
`placa` VARCHAR,
`cpf_cnpj` INT,
`cpf` INT,
`data_retirada` DATETIME NOT NULL,
`data_devolucao` DATE NOT NULL,
`kilometragem_inicial` INT(10) NOT NULL,
`kilometragem_final` INT(10) NOT NULL,
`valor_locacao` INT(10) NOT NULL,
`valor_calcao` INT(10) NOT NULL,
`valor_seguro` INT(10) NOT NULL,
`pagamento_final` INT*10) NOT NULL,
CONSTRAINT FK_LocacaoVeiculo FOREIGN KEY (`placa`) 
REFERENCES `locauto`.`tabela_cadastro_veiculo` (`placa`),
CONSTRAINT FK_LocacaoMotorista FOREIGN KEY (`cpf`) 
REFERENCES `locauto`.`tabela_cadastro_motorista` (`cpf`),
CONSTRAINT FK_LocacaoUsuario FOREIGN KEY (`cpf_cnpj`) 
REFERENCES `locauto`.`tabela_cadastro_usuario` (`cpf_cnpj`)
);*/

/************************************************************************/

/* tabela de admin */
CREATE TABLE `locauto`.`tabela_admin` (
`ID_admin` int AUTO_INCREMENT PRIMARY KEY NOT NULL,
`admin` VARCHAR(5) NOT NULL,
`senha` VARCHAR(5) NOT NULL
);

INSERT INTO tabela_admin (admin,senha)
VALUE ('admin','admin');

SELECT * from tabela_admin WHERE ID_admin = 1;

UPDATE tabela_admin SET senha = 'hue' WHERE ID_admin = 1;

DELETE FROM tabela_admin WHERE ID_admin = 1;

/************************************************************************/

/* tabela de cadastro de funcionario */
CREATE TABLE `locauto`.`tabela_cadastro_funcionario` (
`ID_funcionario` int AUTO_INCREMENT PRIMARY KEY NOT NULL,
`matricula` int(11) NOT NULL,
`nome` VARCHAR(250) NOT NULL,
`identidade` int(10) NOT NULL,
`telefone` int(11) NOT NULL,
`email` VARCHAR(100) NOT NULL,
`senha` VARCHAR(8) NOT NULL,
`logradouro` VARCHAR(50) NOT NULL,
`numero` int(10) NOT NULL,
`complemento` VARCHAR(250) NOT NULL,
`bairro` VARCHAR(50) NOT NULL,
`cidade` VARCHAR(50) NOT NULL,
`estado` VARCHAR(50) NOT NULL,
`cep` int(10) NOT NULL,
`data_cadastro` DATETIME NOT NULL,
UNIQUE KEY unique_matricula (`matricula`),
UNIQUE KEY unique_email (`email`)
);


INSERT INTO tabela_cadastro_funcionario (matricula,nome,identidade,telefone,email,senha,logradouro,numero,complemento,bairro,cidade,estado,cep,data_cadastro)
VALUE ('12312312321','eu','1231231232','12312321232','senha','lol@lol.com','casa','321','predio','centro','rio','rio','1236548752',NOW());

SELECT * from tabela_cadastro_funcionario WHERE ID_funcionario = 1;

UPDATE tabela_cadastro_funcionario SET senha = '123' WHERE ID_funcionario = 1;

DELETE FROM tabela_cadastro_funcionario WHERE ID_funcionario = 1;

/************************************************************************/


CREATE TABLE `locauto`.`tabela_cadastro_veiculo_categoria` (
`ID_categoria` int AUTO_INCREMENT PRIMARY KEY NOT NULL,
`categoria` VARCHAR(50) NOT NULL
);

INSERT INTO tabela_cadastro_veiculo_categoria (categoria)
VALUE ('suv');

SELECT * from tabela_cadastro_veiculo_categoria WHERE ID_categoria = 1;

UPDATE tabela_cadastro_veiculo_categoria SET categoria = 'esportivo' WHERE ID_categoria = 1;

DELETE FROM tabela_cadastro_veiculo_categoria WHERE ID_categoria = 1;

/************************************************************************/

CREATE TABLE `locauto`.`tabela_cadastro_veiculo_marca` (
`ID_marca` int AUTO_INCREMENT PRIMARY KEY NOT NULL,
`marca` VARCHAR(50) NOT NULL
);

INSERT INTO tabela_cadastro_veiculo_marca (marca)
VALUE ('BMW');

SELECT * from tabela_cadastro_veiculo_marca WHERE ID_marca = 1;

UPDATE tabela_cadastro_veiculo_marca SET marca = 'Jeep' WHERE ID_marca = 1;

DELETE FROM tabela_cadastro_veiculo_marca WHERE ID_marca = 1;

/************************************************************************/

CREATE TABLE `locauto`.`tabela_cadastro_veiculo_modelo` (
`ID_modelo` int AUTO_INCREMENT PRIMARY KEY NOT NULL,
`ID_marca` INT,
`modelo` VARCHAR(50) NOT NULL,
CONSTRAINT FK_MarcaModelo FOREIGN KEY (`ID_marca`) 
REFERENCES `locauto`.`tabela_cadastro_veiculo_marca` (`ID_marca`)
);

INSERT INTO tabela_cadastro_veiculo_modelo (ID_marca,modelo) SELECT tabela_cadastro_veiculo_marca.ID_marca, 'JeepVerde' FROM tabela_cadastro_veiculo_marca WHERE tabela_cadastro_veiculo_marca.ID_marca = $marca;

SELECT * from tabela_cadastro_veiculo_modelo WHERE ID_modelo = 1;

UPDATE tabela_cadastro_veiculo_modelo SET modelo = 'S20' WHERE ID_modelo = 1;

DELETE FROM tabela_cadastro_veiculo_modelo WHERE ID_modelo = 1;


/************************************************************************/

/*CREATE TABLE `locauto`.`tabela_cadastro_veiculo` (
`ID_veiculo` int AUTO_INCREMENT PRIMARY KEY NOT NULL,
`ID_modelo` INT,
`ID_categoria` INT,
`placa` VARCHAR(10) NOT NULL,
`marca` VARCHAR(50) NOT NULL,
`modelo` VARCHAR(50) NOT NULL,
`chassi` VARCHAR(17) NOT NULL,
`renavam` INT(11) NOT NULL,
`categoria` VARCHAR(50) NOT NULL,
`preco_compra` INT(10) NOT NULL,
`preco_venda` INT(10)NOT NULL,
`numero_passageiro` INT(10) NOT NULL,
`ano_fabricacao` INT(4) NOT NULL,
`ano_modelo` INT(4) NOT NULL,
`tipo_combustivel` VARCHAR(20) NOT NULL,
`kilometragem` INT(250) NOT NULL,
`potencia` INT(10) NOT NULL,
`capacidade_pmalas` INT(100) NOT NULL,
`situacao` VARCHAR(100) NOT NULL,
`foto_veiculo` VARCHAR(250) NOT NULL,
UNIQUE KEY unique_placa (`placa`),
UNIQUE KEY unique_chassi (`chassi`),
UNIQUE KEY unique_renavam (`renavam`),
CONSTRAINT FK_VeiculoModelo FOREIGN KEY (`ID_modelo`) 
REFERENCES `locauto`.`tabela_cadastro_veiculo_modelo` (`ID_modelo`),
CONSTRAINT FK_VeiculoCategoria FOREIGN KEY (`ID_categoria`) 
REFERENCES `locauto`.`tabela_cadastro_veiculo_categoria` (`ID_categoria`)
);*/

/************************************************************************/

CREATE TABLE `locauto`.`tabela_cadastro_veiculo` (
`ID_veiculo` int AUTO_INCREMENT PRIMARY KEY NOT NULL,
`placa` VARCHAR(10) NOT NULL,
`marca` VARCHAR(50) NOT NULL,
`modelo` VARCHAR(50) NOT NULL,
`chassi` VARCHAR(17) NOT NULL,
`renavam` INT(11) NOT NULL,
`categoria` VARCHAR(20) NOT NULL,
`preco_compra` INT(10) NOT NULL,
`preco_venda` INT(10)NOT NULL,
`numero_passageiro` INT(10) NOT NULL,
`ano_fabricacao` INT(4) NOT NULL,
`ano_modelo` INT(4) NOT NULL,
`tipo_combustivel` VARCHAR(20) NOT NULL,
`kilometragem` INT(250) NOT NULL,
`potencia` INT(10) NOT NULL,
`capacidade_pmalas` INT(100) NOT NULL,
`situacao` VARCHAR(10) NOT NULL,
`foto_veiculo` VARCHAR(250) NOT NULL,
UNIQUE KEY unique_placa (`placa`),
UNIQUE KEY unique_chassi (`chassi`),
UNIQUE KEY unique_renavam (`renavam`)
);

/************************************************************************/


/* tabela de cadastro de motorista */
CREATE TABLE `locauto`.`tabela_cadastro_motorista` (
`ID_motorista` int AUTO_INCREMENT PRIMARY KEY NOT NULL,
`cpf` int(11) NOT NULL,
`nome` VARCHAR(250) NOT NULL,
`identidade` int(10) NOT NULL,
`telefone` int(11) NOT NULL,
`email` VARCHAR(100) NOT NULL,
`numero_registro` INT(11) NOT NULL,
`categoria` VARCHAR(5) NOT NULL,
`date` DATE NOT NULL,
`foto_cnh` VARCHAR(250) NOT NULL,
`logradouro` VARCHAR(50) NOT NULL,
`numero` int(10) NOT NULL,
`complemento` VARCHAR(255) NOT NULL,
`bairro` VARCHAR(50) NOT NULL,
`cidade` VARCHAR(50) NOT NULL,
`estado` VARCHAR(50) NOT NULL,
`cep` int(10) NOT NULL,
UNIQUE KEY unique_email (`email`),
UNIQUE KEY unique_cpf (`cpf`)
);



