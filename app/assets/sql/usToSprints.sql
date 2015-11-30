
CREATE TABLE IF NOT EXISTS `UserStoriesToSprints`(
    `usId`      INT(11) NOT NULL,
    `sprintId`  INT(11) NOT NULL,
    PRIMARY KEY (`usId`, `sprintId`)
)
