
CREATE TABLE IF NOT EXISTS `Developpers`(
    devId           INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    devName         VARCHAR(255) NOT NULL,
    devFirstName    VARCHAR(255) NOT NULL,
    devDescription  TEXT
)
