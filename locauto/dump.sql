

/* ESTE BANCO AINDA NÃO ESTA COMPLETO */
/* ainda falta criar mais tabelas e fazer a FOREIGN KEY corretamente */

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
`numero` int(10) NOT NULL,
`complemento` VARCHAR(255) NOT NULL,
`bairro` VARCHAR(50) NOT NULL,
`cidade` VARCHAR(50) NOT NULL,
`estado` VARCHAR(50) NOT NULL,
`cep` int(10) NOT NULL,
UNIQUE KEY unique_email (`email`),
UNIQUE KEY unique_cpf_cnpj (`cpf_cnpj`)
);


/* tabela de admin */
CREATE TABLE `locauto`.`tabela_admin` (
`ID_admin` int(1) AUTO_INCREMENT PRIMARY KEY NOT NULL,
`admin` VARCHAR(5) NOT NULL,
`senha` VARCHAR(5) NOT NULL
);


/* tabela de cadastro de usuario */
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


/*
CREATE TABLE `locauto`.`tabela_cadastro_veiculo_categoria` (
`ID_categoria` int AUTO_INCREMENT PRIMARY KEY NOT NULL,
`categoria` VARCHAR(50) NOT NULL
);


CREATE TABLE `locauto`.`tabela_cadastro_veiculo_marca` (
`ID_marca` int AUTO_INCREMENT PRIMARY KEY NOT NULL,
`marca` VARCHAR(50) NOT NULL
);


CREATE TABLE `locauto`.`tabela_cadastro_veiculo_modelo` (
`ID_modelo` int AUTO_INCREMENT PRIMARY KEY NOT NULL,
`ID_marca` INT,
`modelo` VARCHAR(50) NOT NULL,
CONSTRAINT FK_MarcaModelo FOREIGN KEY (`ID_marca`) 
REFERENCES `locauto`.`tabela_cadastro_veiculo_marca` (`ID_marca`)
);
*/


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


CREATE TABLE `locauto`.`tabela_cadastro_veiculo` (
`ID_veiculo` int AUTO_INCREMENT PRIMARY KEY NOT NULL,
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
UNIQUE KEY unique_renavam (`renavam`)
);


/*
CREATE TABLE `locauto`.`tabela_cadastro_veiculo_marca` (
`ID_marca` int AUTO_INCREMENT PRIMARY KEY NOT NULL  REFERENCES `locauto`.`tabela_cadastro_veiculo` (`ID_veiculo`),
`marca` VARCHAR(250) NOT NULL,
UNIQUE KEY unique_placa (`marca`)
);


CREATE TABLE `locauto`.`tabela_cadastro_veiculo_modelo` (
`ID_modelo` int AUTO_INCREMENT PRIMARY KEY NOT NULL REFERENCES `locauto`.`tabela_cadastro_veiculo_marca` (`ID_marca`),
`modelo` VARCHAR(50) NOT NULL
);
*/







/*
CREATE TABLE tabela_cadastro_motorista (
ID_motorista int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
nome VARCHAR(200) NOT NULL,
cpf_cnpj INT,
.
.
.
CONSTRAINT FK_UsuarioMotorista FOREIGN KEY (cpf_cnpj) 
REFERENCES tabela_cadastro_usuario (cpf_cnpj)
);
*/

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



