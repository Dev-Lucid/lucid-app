create table organizations (
	org_id int auto_increment primary key,
	name varchar(50)
);

insert into organizations (name) values ('admin');

create table users (
	user_id int auto_increment primary key,
	email varchar(255),
	password varchar(255),
	first_name varchar(255),
	last_name varchar(255)
);

insert into users (email,password,)