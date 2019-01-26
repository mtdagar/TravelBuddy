# Travel Buddy

Never travel alone.


![Landing Page](assets/images/landing-page-snap.png)


## About

A collaborative project in development by Meet Dagar, Dikshant Rawat, Purusharth Dang and Aditya Mehta.

## Technologies used

* PHP & MySQL
* JavaScript
* Bootstrap
* jQuery
* Here Maps API



### Setup MySQL Database

Create Database
```
CREATE DATABASE travelbuddy;
```

Use Database
```
USE travelbuddy;
```

Create users table
```
CREATE TABLE `users`. ( `id` INT NOT NULL AUTO_INCREMENT , `firstName` VARCHAR(50) NOT NULL , `lastName` VARCHAR(50) NOT NULL , `email` VARCHAR(200) NOT NULL , `password` VARCHAR(32) NOT NULL , `signUpDate` DATETIME NOT NULL , `startLocation` VARCHAR(100), `endLocation` VARCHAR(100), `bio` TEXT, PRIMARY KEY (`id`)) ENGINE = InnoDB;
```