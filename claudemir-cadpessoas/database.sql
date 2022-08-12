CREATE TABLE IF NOT EXISTS `cadpessoas` (
  `id` varchar(3) CHARACTER SET utf8 NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `cadpessoas` (`id`, `name`, `email`) VALUES
('CSL', 'Claudemir da Silva Lopes', 'claudemir.slopes@hotmail.com'),
('ERF', 'Eliane Rocha de Freitas', 'lifreitaslopes@gmail.com');
