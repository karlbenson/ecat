drop database lukedb;
create database lukedb;
use lukedb;

/* TEMPORARY lang to boys */

create table patient(
patient_id int unsigned not null auto_increment primary key,
patient_fname varchar(30) not null,
patient_lname varchar(30) not null,
patient_minitial char(1) not null
);
