--for heroku database, replace 'hospital_db' with heroku_bece3e49d0c6d9b

CREATE TABLE `hospital_db`.`patients` (
    `id` INT(255) NOT NULL AUTO_INCREMENT,
    `id_no` INT(10) NOT NULL,
    `op_num` INT(10) NOT NULL,
    `first_name` TEXT NOT NULL , 
    `last_name` TEXT NOT NULL , 
    `sex` TEXT NOT NULL , 
    `phone_num` INT(10) NOT NULL , 
    `physical_address` VARCHAR(255) NOT NULL , 
    `dob` DATE NOT NULL , 
    `nhif_num` INT(15) NOT NULL , 
    `number_of_visits` INT(255) NOT NULL DEFAULT '1'
    `date_in` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP , 
    `ip_number` INT(10) NOT NULL AFTER,
    `adm_ward` VARCHAR(255) NOT NULL AFTER `ip_number`,
    `next_of_kin` VARCHAR(255) NOT NULL,
    `kin_rlshp` VARCHAR(255) NOT NULL,
    `kin_telephone` INT(10) NOT NULL,
    `adm_date` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `hospital_db`.`employees` (
    `id` INT(255) NOT NULL AUTO_INCREMENT , 
    `id_num` INT(10) NOT NULL,
    `first_name` TEXT NOT NULL , 
    `last_name` TEXT NOT NULL , 
    `sex` TEXT NOT NULL , 
    `email` VARCHAR(255) NOT NULL , 
    `phone_num` INT(10) NOT NULL , 
    `physical_address` VARCHAR(255) NOT NULL , 
    `dob` DATE NOT NULL , 
    `job_title` VARCHAR(255) NOT NULL,
    `department` TEXT NOT NULL,
    `date_in` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `hospital_db`.`departments` (
    `id` INT(255) NOT NULL AUTO_INCREMENT , 
    `name` TEXT(255) NOT NULL,
    `hod` TEXT(255) NOT NULL,
    `date_created` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `hospital_db`.`wards` (
    `id` INT(255) NOT NULL AUTO_INCREMENT , 
    `name` TEXT(255) NOT NULL,
    `incharge` TEXT(255) NOT NULL,
    `capacity` INT(5) NOT NULL,
    `date_created` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `hospital_db`.`services` (
    `id` INT(255) NOT NULL AUTO_INCREMENT , 
    `name` VARCHAR(255) NOT NULL,
    `description` VARCHAR(255) NOT NULL,
    `unit_charge` INT(255) NOT NULL,
    `date_created` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `hospital_db`.`suppliers` (
    `id` INT(255) NOT NULL AUTO_INCREMENT , 
    `supplier_id` VARCHAR(255) NOT NULL,
    `name` TEXT NOT NULL , 
    `company_name` TEXT NOT NULL , 
    `status` TEXT NOT NULL , 
    `email` VARCHAR(255) NOT NULL , 
    `phone_num` INT(10) NOT NULL , 
    `physical_address` VARCHAR(255) NOT NULL , 
    `date_in` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `hospital_db`.`expenses_category` (
    `id` INT(255) NOT NULL AUTO_INCREMENT , 
    `name` TEXT NOT NULL , 
    `status` TEXT NOT NULL , 
    `description` VARCHAR(255) NOT NULL ,  
    `date_added` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `hospital_db`.`expenses` (
    `id` INT(255) NOT NULL AUTO_INCREMENT , 
    `name` TEXT NOT NULL , 
    `payment_method` TEXT NOT NULL , 
    `paid_from_account` VARCHAR(255) NOT NULL ,
    `description` VARCHAR(255) NOT NULL ,  
    `amount` INT NOT NULL ,
    `status` TEXT NOT NULL ,
    `due_date` DATE NOT NULL ,
    `date_added` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `hospital_db`.`drugs` (
    `id` INT(255) NOT NULL AUTO_INCREMENT , 
    `name` TEXT NOT NULL , 
    `category` TEXT NOT NULL , 
    `unit_price` INT(255) NOT NULL ,
    `supplier` VARCHAR(255) NOT NULL ,  
    `status` TEXT NOT NULL ,
    `date_added` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `hospital_db`.`notices` (
    `id` INT(255) NOT NULL AUTO_INCREMENT , 
    `title` TEXT NOT NULL ,
    `description` VARCHAR(255) NOT NULL ,  
    `start_date` DATE NOT NULL ,
    `end_date` DATE NOT NULL ,
    `status` TEXT NOT NULL ,
    `date_added` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `hospital_db`.`messages` (
    `id` INT(255) NOT NULL AUTO_INCREMENT , 
    `subject` VARCHAR NOT NULL ,
    `to_email` VARCHAR(255) NOT NULL ,  
    `from_email` VARCHAR(255) NOT NULL ,
    `body` VARCHAR(255) NOT NULL ,
    `attachments` VARCHAR(255) NOT NULL,
    `date_added` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

ALTER TABLE `messages` ADD `cc_email` VARCHAR(255) NOT NULL AFTER `to_email`;