create database lukedb;
use lukedb;
create table patient(
patient_id int unsigned not null auto_increment primary key,
patient_fname varchar(30) not null,
patient_lname varchar(30) not null,
patient_minitial char(1) not null,
school_number int references school(school_id) on update cascade,
age tinyint(3) not null,
sex varchar(1) not null,
present_address varchar(150) null,
provincial_address varchar(150) null,
civil_status char(20) null,
birthdate date null,
birthplace varchar(150) null,
religion varchar(30) null,
occupation varchar(50) null,
monthly_income varchar(50) null,
contact_number varchar(50) null,
highest_educ_attainment varchar(50) null
);