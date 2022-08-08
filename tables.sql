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