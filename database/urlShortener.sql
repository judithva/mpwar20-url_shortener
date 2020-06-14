CREATE TABLE `UrlShorten` (
  `idUrl` CHAR(36) NOT NULL,
  `urlOriginal` VARCHAR(255) NOT NULL,
  `urlShortened` VARCHAR(255) NOT NULL,
  `campaign` VARCHAR(255) NULL,
  `created_on` DATETIME NOT NULL,
  PRIMARY KEY (`idUrl`)
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
