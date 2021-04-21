drop database if exists patternMVCAuth;
drop user if exists 'mvcuser'@'localhost';

create database patternMVCAuth;
use patternMVCAuth;

create table users(
   userID int AUTO_INCREMENT,
   username varchar(30) not null, index(username),
   lastname varchar(50),
   firstname varchar(30),
   passwd varchar(30),
   email varchar(255),
   urole varchar(30),
   lastModified DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
   primary key(userID)
)engine=innodb;

create user 'mvcuser'@'localhost' identified by 'mvcpass';
grant all privileges on patternMVCAuth.* to 'mvcuser'@'localhost';

insert into users(username,lastname,firstname,passwd,email,urole)
   values('jsmith','Smith','Joe','buddy','jsmith@gmail.com','admin');

insert into users(username,lastname,firstname,passwd,email,urole)
   values('bwilliams','Williams','Brian','pass123','bwilliams@gmail.com','user');

insert into users(username,lastname,firstname,passwd,email,urole)
   values('mjones','Jones','Mike','pass1234','mjones@gmail.com','user');

insert into users(username,lastname,firstname,passwd,email,urole)
   values('mjohnson','Johnson','Monica','password','mjohnson@gmail.com','user');