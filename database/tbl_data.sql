CREATE TABLE IF NOT EXISTS `tbl_data` (
    `NIM` char(9) NOT NULL,
    `Nama` varchar(30) NOT NULL,
    `IPK` float NOT NULL,
    `Asal` varchar(30) NOT NULL,
    PRIMARY KEY (`NIM`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tbl_data` (`NIM`, `Nama`, `IPK`, `Asal`) VALUES
	('672019001', 'Krida Prastya', 3.89, 'Bantul'),
	('672019252', 'Gruda Sakti Krida Prastya', 3.91, 'Sleman'),
	('672020001', 'Ayu Lestari', 3.77, 'Tegal'),
	('672020002', 'Eko Saputro Wijaya', 3.55, 'Semarang'),
	('672020003', 'Indra Jaya', 3.58, 'Pekalongan');