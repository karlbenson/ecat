create database lukedb;
use lukedb;

CREATE TABLE STAFF(
	STAFF_LICENSE_NUM CHAR(7) NOT NULL,
	STAFF_FNAME VARCHAR(20) NOT NULL,
	STAFF_LNAME VARCHAR(20) NOT NULL,
	PRIMARY KEY (STAFF_LICENSE_NUM)
);