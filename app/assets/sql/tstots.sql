
CREATE TABLE IF NOT EXISTS `TasksToTasks`(
    `tsDependentId` INT(11) NOT NULL,
    `taskId`  INT(11) NOT NULL,
    
    PRIMARY KEY (`taskId`, `TsDependentId`)
)
