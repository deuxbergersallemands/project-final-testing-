
CREATE TABLE IF NOT EXISTS `Tasks`(
    `taskId`                INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `taskIdentifier`        VARCHAR(255) NOT NULL,
    `taskDescription`       VARCHAR(255) NOT NULL,
    `taskExpectedDuration`  INT(11),
    `taskDuration`          INT(11),
    `taskState`             VARCHAR(255),
    `taskComment`           TEXT,
    `devId`                 INT(11)
)
