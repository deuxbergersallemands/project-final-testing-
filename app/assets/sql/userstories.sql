
CREATE TABLE IF NOT EXISTS `UserStories`(
    usId            INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    usIdentifier    VARCHAR(255) NOT NULL,
    usSummary       VARCHAR(255) NOT NULL,
    usPriority      INT(11),
    usDifficulty    INT(11),
    usState         VARCHAR(11),
    usDuration      INT(11),
    usDescription   TEXT
)
