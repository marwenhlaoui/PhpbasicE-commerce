CREATE TABLE IF NOT EXISTS `abonne` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FIRST_NAME` varchar(50) COLLATE utf8_general_mysql500_ci NOT NULL,
  `LAST_NAME` varchar(50) COLLATE utf8_general_mysql500_ci NOT NULL,
  `LOGIN` varchar(50) COLLATE utf8_general_mysql500_ci NOT NULL,
  `PASSWORD` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `E_MAIL` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `COUNTRY` varchar(50) COLLATE utf8_general_mysql500_ci NOT NULL,
  `POSTAL_CODE` varchar(50) COLLATE utf8_general_mysql500_ci NOT NULL,
  `PHONE` varchar(50) COLLATE utf8_general_mysql500_ci NOT NULL,
  `ADDRESS` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `NIVEAU` varchar(20) COLLATE utf8_general_mysql500_ci NOT NULL,
  `NV` varchar(20) COLLATE utf8_general_mysql500_ci NOT NULL,
  `DATE_INSC` datetime NOT NULL,
  `ROLE` tinyint(1) DEFAULT NULL,
  `AVATAR` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci AUTO_INCREMENT=15 ;