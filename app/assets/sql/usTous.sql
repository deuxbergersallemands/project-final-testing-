
CREATE TABLE IF NOT EXISTS `UserStoriesToUserStories`(
    `usId`           INT(11) NOT NULL,
    `usDependentId`  INT(11) NOT NULL,
    
    PRIMARY KEY (`usId`, `usDependentId`)
)
