
CREATE TABLE IF NOT EXISTS `Sprints`(
    `sprintId`          INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `sprintIdentifier`  VARCHAR(255) NOT NULL,
    `sprintDuration`    VARCHAR(255) NOT NULL,
    `sprintState`       VARCHAR(255),
    `sprintDescription` TEXT
)
