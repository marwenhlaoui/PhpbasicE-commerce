CREATE TABLE IF NOT EXISTS `produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8_general_mysql500_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `prix` float NOT NULL,
  `quantite` int(11) NOT NULL,
  `description` text COLLATE utf8_general_mysql500_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci AUTO_INCREMENT=16 ;