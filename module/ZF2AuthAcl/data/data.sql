/* PLEASE CHANGE 'zend_zillow' to your DATABASE_NAME in INSERT below */
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'Y',
  `created_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `role` (
  `rid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(45) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `user_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE `resource` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `resource_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

CREATE TABLE `permission` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_name` varchar(45) NOT NULL,
  `resource_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

CREATE TABLE `role_permission` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `permission_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

/* Add Roles */

INSERT INTO `zend_zillow`.`role` (`role_name`, `status`) VALUES ('Role1', 'Active');
INSERT INTO `zend_zillow`.`role` (`role_name`, `status`) VALUES ('Role2', 'Active');
INSERT INTO `zend_zillow`.`role` (`role_name`, `status`) VALUES ('Role3', 'Active');

/* Add Resorces */
INSERT INTO `zend_zillow`.`resource` (`resource_name`) VALUES ('Application\\Controller\\Index');
INSERT INTO `zend_zillow`.`resource` (`resource_name`) VALUES ('CheckList\\Controller\\Task');
INSERT INTO `zend_zillow`.`resource` (`resource_name`) VALUES ('Album\\Controller\\Album');
INSERT INTO `zend_zillow`.`resource` (`resource_name`) VALUES ('FrontEnd\\Controller\\Home');

/* Add Users */
INSERT INTO `zend_zillow`.`users` (`email`, `password`, `status`) VALUES ('lehoanganh25991@gmail.com', '430e19e717f751e63adf5d671d8ea637b84e44ca', 'Y');
INSERT INTO `zend_zillow`.`users` (`email`, `password`, `status`) VALUES ('hoanganh25991@gmail.com', '430e19e717f751e63adf5d671d8ea637b84e44ca', 'Y');
INSERT INTO `zend_zillow`.`users` (`email`, `password`, `status`) VALUES ('hoanganh_25991@yahoo.com.vn', '430e19e717f751e63adf5d671d8ea637b84e44ca', 'Y');


/* Add User Roles */
INSERT INTO `zend_zillow`.`user_role` (`user_id`, `role_id`) VALUES (1, 1);
INSERT INTO `zend_zillow`.`user_role` (`user_id`, `role_id`) VALUES (2, 2);
INSERT INTO `zend_zillow`.`user_role` (`user_id`, `role_id`) VALUES (3, 3);

/* Add Permissions */
INSERT INTO `zend_zillow`.`permission` (`permission_name`, `resource_id`) VALUES ('index', 1);
INSERT INTO `zend_zillow`.`permission` (`permission_name`, `resource_id`) VALUES ('application', 1);
INSERT INTO `zend_zillow`.`permission` (`permission_name`, `resource_id`) VALUES ('index', 2);
INSERT INTO `zend_zillow`.`permission` (`permission_name`, `resource_id`) VALUES ('add', 2);
INSERT INTO `zend_zillow`.`permission` (`permission_name`, `resource_id`) VALUES ('edit', 2);
INSERT INTO `zend_zillow`.`permission` (`permission_name`, `resource_id`) VALUES ('delete', 2);
INSERT INTO `zend_zillow`.`permission` (`permission_name`, `resource_id`) VALUES ('json', 2);
INSERT INTO `zend_zillow`.`permission` (`permission_name`, `resource_id`) VALUES ('index', 3);
INSERT INTO `zend_zillow`.`permission` (`permission_name`, `resource_id`) VALUES ('add', 3);
INSERT INTO `zend_zillow`.`permission` (`permission_name`, `resource_id`) VALUES ('edit', 3);
INSERT INTO `zend_zillow`.`permission` (`permission_name`, `resource_id`) VALUES ('delete', 3);
INSERT INTO `zend_zillow`.`permission` (`permission_name`, `resource_id`) VALUES ('index', 4);

/* Add User Role Permissions */
INSERT INTO `zend_zillow`.`role_permission` (`role_id`, `permission_id`) VALUES (1, 1);
INSERT INTO `zend_zillow`.`role_permission` (`role_id`, `permission_id`) VALUES (1, 2);
INSERT INTO `zend_zillow`.`role_permission` (`role_id`, `permission_id`) VALUES (1, 3);
INSERT INTO `zend_zillow`.`role_permission` (`role_id`, `permission_id`) VALUES (1, 4);
INSERT INTO `zend_zillow`.`role_permission` (`role_id`, `permission_id`) VALUES (1, 5);
INSERT INTO `zend_zillow`.`role_permission` (`role_id`, `permission_id`) VALUES (1, 6);
INSERT INTO `zend_zillow`.`role_permission` (`role_id`, `permission_id`) VALUES (1, 7);
INSERT INTO `zend_zillow`.`role_permission` (`role_id`, `permission_id`) VALUES (1, 8);
INSERT INTO `zend_zillow`.`role_permission` (`role_id`, `permission_id`) VALUES (1, 9);
INSERT INTO `zend_zillow`.`role_permission` (`role_id`, `permission_id`) VALUES (1, 10);
INSERT INTO `zend_zillow`.`role_permission` (`role_id`, `permission_id`) VALUES (1, 11);
INSERT INTO `zend_zillow`.`role_permission` (`role_id`, `permission_id`) VALUES (1, 12);
INSERT INTO `zend_zillow`.`role_permission` (`role_id`, `permission_id`) VALUES (2, 1);
INSERT INTO `zend_zillow`.`role_permission` (`role_id`, `permission_id`) VALUES (2, 2);
INSERT INTO `zend_zillow`.`role_permission` (`role_id`, `permission_id`) VALUES (2, 3);
INSERT INTO `zend_zillow`.`role_permission` (`role_id`, `permission_id`) VALUES (2, 4);
INSERT INTO `zend_zillow`.`role_permission` (`role_id`, `permission_id`) VALUES (2, 5);
INSERT INTO `zend_zillow`.`role_permission` (`role_id`, `permission_id`) VALUES (2, 6);
INSERT INTO `zend_zillow`.`role_permission` (`role_id`, `permission_id`) VALUES (2, 7);
INSERT INTO `zend_zillow`.`role_permission` (`role_id`, `permission_id`) VALUES (2, 12);
INSERT INTO `zend_zillow`.`role_permission` (`role_id`, `permission_id`) VALUES (3, 1);
INSERT INTO `zend_zillow`.`role_permission` (`role_id`, `permission_id`) VALUES (3, 2);
