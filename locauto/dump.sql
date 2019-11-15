CREATE DATABASE locauto;
USE locauto;

CREATE TABLE `locauto`.`tabela_cadastro_usuario` (
`ID_usuario` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
`escolher` VARCHAR(50) NOT NULL,
`cpf_cnpj` int(14) NOT NULL,
`nome` VARCHAR(200) NOT NULL,
`razao_social` VARCHAR(200) NULL,
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
UNIQUE KEY unique_email (`email`)
);


