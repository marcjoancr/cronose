create database if not exists `Cronose`;
use `Cronose`;

create table if not exists User (
	id int auto_increment primary key not null,
    username varchar(25) not null,
    email varchar(32) not null,
    password varchar(255) not null
);