create database Blog-ku

create table users(
    id int,
    fullname varchar(255),
    email  varchar(255),
    username varchar(255),
    password varchar(255),
    bio varchar(255),     
    profile_images varchar(255),
    Created_at date
) 

create table users_admin(
    id int,
    fullname varchar(255),
    email  varchar(255),
    username varchar(255),
    password varchar(255),
    bio varchar(255),     
    profile_images varchar(255),
    Created_at date
) 

create table blog(
    id int,
    id_username int(11),
    judul  varchar(255),
    category varchar(255),
    isi varchar(255),
    Created_at date
) 

create table feedback(
    id int,
    id_users int(11),
    category varchar(255), 
    isi varchar(255),
    Created_at date    
) 