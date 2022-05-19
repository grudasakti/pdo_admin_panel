CREATE TABLE IF NOT EXISTS `tbl_user` (
	`NIM` char(9) NOT NULL,
	`Password` varchar(30) NOT NULL,
	PRIMARY KEY (`NIM`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tbl_user` (`NIM`, `Password`) VALUES
	('672019001', 'qwerty'),
	('672019252', '123456'),
	('672020001', 'rahasia'),
	('672020002', 'susahditebak'),
	('672020003', 'lupadeh123');