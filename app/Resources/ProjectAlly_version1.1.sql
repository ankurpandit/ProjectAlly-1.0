-- addition of time tracking related entries to database

ALTER TABLE `milestones`  ADD `remaining_hours` INT(4) NOT NULL,  ADD `worked_hours` INT(4) NOT NULL
ALTER TABLE `bugs_and_features`  ADD `remaining_hours` INT(4) NOT NULL AFTER `project_id`,  ADD `worked_hours` INT(4) NOT NULL AFTER `remaining_hours`