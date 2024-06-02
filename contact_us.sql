drop database if exists contact_form;
create database contact_form;
use contact_form;

create table contact_message(
	id int auto_increment primary key,
	`name` varchar(50),
    `email` varchar(50),
    `subject` varchar(50),
    `message` text,
    created_at timestamp default current_timestamp
);