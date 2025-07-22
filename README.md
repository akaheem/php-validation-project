# php-validation-project

Install xampp server and create database with the name of "st_registration";

Then run these queries one by one:
query for signup table:
CREATE TABLE `st_registration`.`signup` (`sno` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(50) NOT NULL , `password` VARCHAR(50) NOT NULL , `date` TIMESTAMP NOT NULL , PRIMARY KEY (`sno`)) ENGINE = InnoDB; 

query for subjects table:
CREATE TABLE `st_registration`.`subjects` (`sno` INT NOT NULL , `subject_title` VARCHAR(50) NOT NULL , `subject_description` TEXT NOT NULL , `subject_status` BOOLEAN NOT NULL ) ENGINE = InnoDB; 

query for courses table:
CREATE TABLE `st_registration`.`courses` (`sno` INT NOT NULL , `course_title` VARCHAR(50) NOT NULL , `course_description` TEXT NOT NULL , `course_status` BOOLEAN NOT NULL ) ENGINE = InnoDB;

query for st_profile table:
CREATE TABLE `st_registration`.`st_profile` (`id` INT NOT NULL AUTO_INCREMENT , `name` TEXT NOT NULL , `email` VARCHAR(50) NOT NULL , `gender` TEXT NOT NULL , `courses` VARCHAR(50) NOT NULL , `subjects` VARCHAR(50) NOT NULL , `dob` DATE NOT NULL , `contact` INT NOT NULL , `date` TIMESTAMP NOT NULL , PRIMARY KEY (`sno`)) ENGINE = InnoDB; 

Congratulations you are good to go to use this validated CRUD application with sign up option
