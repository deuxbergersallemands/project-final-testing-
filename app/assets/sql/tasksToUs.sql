
CREATE TABLE IF NOT EXISTS `TasksToUserStories`(
    `taskId`    INT(11) NOT NULL,
    `usId`      INT(11) NOT NULL,
    PRIMARY KEY (`taskId`, `usId`),
    FOREIGN KEY (`taskId`) REFERENCES Tasks(`taskId`),
    FOREIGN KEY (`usId`) REFERENCES UserStories(`usId`)
)
