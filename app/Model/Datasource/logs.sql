CREATE TABLE `logs` (
 
		`id` int(10) unsigned NOT NULL auto_increment,
		`usuario_id` int(10) unsigned NOT NULL,
		`model` varchar(60) default NULL,
		`action` varchar(20) default NULL,
		`old_data` text,
		`new_data` text,
		`created` datetime default NULL,
		PRIMARY KEY  (`id`),
		INDEX `fk_logs_usuarios1_idx` (`usuario_id` ASC),
  		CONSTRAINT `fk_logs_usuarios1`
    		FOREIGN KEY (`usuario_id`)
    		REFERENCES `usuarios` (`id`)
        ) ENGINE=InnoDB;       