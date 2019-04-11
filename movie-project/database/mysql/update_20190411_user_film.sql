ALTER TABLE `film`
  DROP `liked`,
  DROP `view`,
  DROP `share`;
RENAME TABLE rate TO user_film;
ALTER TABLE `user_film` ADD `liked` INT(11) NOT NULL DEFAULT '0' AFTER `user_id`;
ALTER TABLE `user_film` ADD `view` INT(11) NOT NULL DEFAULT '0' AFTER `liked`;
ALTER TABLE `user_film` ADD `share` INT(11) NOT NULL DEFAULT '0' AFTER `view`;
