

/* ESTE BANCO AINDA NÃO ESTA COMPLETO */
/* ainda falta criar mais tabelas e fazer a FOREIGN KEY corretamente */

CREATE DATABASE locauto;
USE locauto;

CREATE TABLE `locauto`.`tabela_cadastro_usuario` (
`ID_usuario` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
`escolher` VARCHAR(50) NOT NULL,
`cpf_cnpj` int(14) NOT NULL,
`nome` VARCHAR(200) NOT NULL,
`razao_social` VARCHAR(200) NULL,
`identidade` int(10) NULL,
`telefone` int(11) NOT NULL,
`email` VARCHAR(200) NOT NULL,
`senha` VARCHAR(255) NOT NULL,
`logradouro` VARCHAR(255) NOT NULL,
`numero` int(10) NOT NULL,
`complemento` VARCHAR(255) NOT NULL,
`bairro` VARCHAR(50) NOT NULL,
`cidade` VARCHAR(50) NOT NULL,
`estado` VARCHAR(50) NOT NULL,
`cep` int(10) NOT NULL,
UNIQUE KEY unique_email (`email`)
);


CREATE TABLE `locauto`.`tabela_admin` (
`ID_admin` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
`admin` VARCHAR(250) NOT NULL,
`senha` VARCHAR(250) NOT NULL
);


CREATE TABLE `locauto`.`tabela_cadastro_funcionario` (
`ID_funcionario` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
`matricula` int(11) NOT NULL,
`nome` VARCHAR(200) NOT NULL,
`identidade` int(10) NOT NULL,
`telefone` int(11) NOT NULL,
`email` VARCHAR(200) NOT NULL,
`senha` VARCHAR(255) NOT NULL,
`logradouro` VARCHAR(255) NOT NULL,
`numero` int(10) NOT NULL,
`complemento` VARCHAR(255) NOT NULL,
`bairro` VARCHAR(50) NOT NULL,
`cidade` VARCHAR(50) NOT NULL,
`estado` VARCHAR(50) NOT NULL,
`cep` int(10) NOT NULL,
`data_cadastro` DATETIME NOT NULL,
UNIQUE KEY unique_matricula (`matricula`),
UNIQUE KEY unique_email (`email`)
);




CREATE TABLE `locauto`.`tabela_cadastro_veiculo` (
`ID_veiculo` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
`placa` VARCHAR(10) NOT NULL,
`marca` VARCHAR(250) NOT NULL,
`modelo` VARCHAR(250) NOT NULL,
`chassi` VARCHAR(50) NOT NULL,
`renavam` INT(20) NOT NULL,
`categoria` VARCHAR(50) NOT NULL,
`preco_compra` INT(10) NOT NULL,
`preco_venda` INT(10)NOT NULL,
`numero_passageiro` INT(10) NOT NULL,
`ano_fabricacao` INT(10) NOT NULL,
`ano_modelo` INT(10) NOT NULL,
`tipo_combustivel` VARCHAR(250) NOT NULL,
`kilometragem` INT(250) NOT NULL,
`potencia` INT(10) NOT NULL,
`capacidade_pmalas` INT(100) NOT NULL,
`situacao VARCHAR(100) NOT NULL,
`foto_veiculo` VARCHAR(250) NOT NULL,
UNIQUE KEY unique_placa (`placa`),
UNIQUE KEY unique_chassi (`chassi`),
UNIQUE KEY unique_renavam (`renavam`)
);




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

CREATE TABLE `locauto`.`tabela_cadastro_motorista` (
`ID_motorista` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
`cpf` int(14) NOT NULL,
`nome` VARCHAR(200) NOT NULL,
`identidade` int(10) NOT NULL,
`telefone` int(11) NOT NULL,
`email` VARCHAR(200) NOT NULL,
`numero_registro` INT(11) NOT NULL,
`categoria` VARCHAR(10) NOT NULL,
`date` DATE NOT NULL,
`foto_cnh` VARCHAR(200) NOT NULL,
`logradouro` VARCHAR(255) NOT NULL,
`numero` int(10) NOT NULL,
`complemento` VARCHAR(255) NOT NULL,
`bairro` VARCHAR(50) NOT NULL,
`cidade` VARCHAR(50) NOT NULL,
`estado` VARCHAR(50) NOT NULL,
`cep` int(10) NOT NULL,
UNIQUE KEY unique_email (`email`)
);



