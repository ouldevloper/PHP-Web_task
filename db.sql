create database sn;

use sn;
create table users(
	id int primary key auto_increment,
	fullname varchar(100) not null,
	username varchar(100) not null,
	email varchar(100) not null,
	phone varchar(25) not null,
	password varchar(255) not null,
	last_access varchar(25) not null
);

create table notes (
	id int primary key auto_increment,
	title varchar(55) not null,
	description varchar(255) not null,
	date varchar(20) not null,
	user_id int not null,
	foreign key (user_id) references users(id)
);
