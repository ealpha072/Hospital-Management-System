--for heroku database, replace 'hospital_db' with heroku_bece3e49d0c6d9b

CREATE TABLE `hospital_db`.`patients` (
    `id` INT(255) NOT NULL AUTO_INCREMENT , 
    `first_name` TEXT NOT NULL , 
    `last_name` TEXT NOT NULL , 
    `age` INT(3) NOT NULL , 
    `sex` TEXT NOT NULL , 
    `marital_status` TEXT NOT NULL , 
    `email` VARCHAR(255) NOT NULL , 
    `phone_num` INT(10) NOT NULL , 
    `physical_address` VARCHAR(255) NOT NULL , 
    `dob` DATE NOT NULL , 
    `nhif_num` INT(15) NOT NULL , 
    `date_in` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `hospital_db`.`employees` (
    `id` INT(255) NOT NULL AUTO_INCREMENT , 
    `first_name` TEXT NOT NULL , 
    `last_name` TEXT NOT NULL , 
    `age` INT(3) NOT NULL , 
    `sex` TEXT NOT NULL , 
    `marital_status` TEXT NOT NULL , 
    `email` VARCHAR(255) NOT NULL , 
    `phone_num` INT(10) NOT NULL , 
    `physical_address` VARCHAR(255) NOT NULL , 
    `dob` DATE NOT NULL , 
    `nhif_num` INT(15) NOT NULL , 
    `picture` VARCHAR(255) NOT NULL, 
    `role` VARCHAR(255) NOT NULL,
    `kra_num` VARCHAR(255) NOT NULL,
    `nssf_num` VARCHAR(255) NOT NULL,
    `date_in` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `hospital_db`.`doctors` (
    `id` INT(255) NOT NULL AUTO_INCREMENT , 
    `first_name` TEXT NOT NULL , 
    `last_name` TEXT NOT NULL , 
    `age` INT(3) NOT NULL , 
    `sex` TEXT NOT NULL , 
    `status` TEXT NOT NULL , 
    `email` VARCHAR(255) NOT NULL , 
    `phone_num` INT(10) NOT NULL , 
    `physical_address` VARCHAR(255) NOT NULL , 
    `dob` DATE NOT NULL , 
    `nhif_num` INT(15) NOT NULL , 
    `picture` VARCHAR(255) NOT NULL, 
    `department` VARCHAR(255) NOT NULL,
    `kra_num` VARCHAR(255) NOT NULL,
    `nssf_num` VARCHAR(255) NOT NULL,
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