create database lukedb;
use lukedb;

/*SQL TRIAL CODE*/

create table DOCTOR(
DOC_LICENSE_NUM  CHAR(7) NOT NULL UNIQUE,
LAST_NAME VARCHAR(20) NOT NULL,
FIRST_NAME VARCHAR(20)  NOT NULL,
ADDRESS VARCHAR(50),
PRIMARY KEY (DOC_LICENSE_NUM)
);

/*SAMPLE DATA*/

create table patient(
patient_id int(15) unsigned not null auto_increment primary key,
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
monthly_income varchar(15) null,
contact_number int(30) unsigned null,
highest_educ_attainment varchar(50) null
);

INSERT INTO DOCTOR VALUES
('0000001','Smith','John','West Virginia. 26 Santos Street.'),
('0000002','South','Johan','West Virginia. 15 Santos Street.'),
('0000003','Reefs','James','West Virginia. 106 Santos Street.'),
('0000004','Reefs','Jessie','West Virginia. 106 Santos Street.'),
('0000005','Nedd','Milah','Florida, Border Street Avenue, Block 56.'),
('0000006','Colonel','Sanders','Kentucky, Fried Chicken.'),
('0000007','Ricardo','Heart','09 Silver Road, Beckham Park.'),
('0000008','Ketchup','Ash','Pallet Town, West Kanto Region.'),
('0000009','Viva','Giovanni','Soul Silver Street, Viridian City, West Kanto Region.'),
('0000010','Crystal','Grey','City of Evergreen, Central Johto Region.'),
('0000011','Light','Lilian',''),
('0000012','Violet','Vivi','Route 26, Cinnabar Island, Kanto Region.'),
('0000013','Lilam','Loren','Route 205, Floaroma Town, Sinnoh Region.')
;

INSERT INTO DOCTOR VALUES
('0000021','Smith','John','West Virginia. 26 Santos Street.'),
('0000022','South','Johan','West Virginia. 15 Santos Street.'),
('0000023','Reefs','James','West Virginia. 106 Santos Street.'),
('0000014','Reefs','Jessie','West Virginia. 106 Santos Street.'),
('0000015','Nedd','Milah','Florida, Border Street Avenue, Block 56.'),
('0000016','Colonel','Sanders','Kentucky, Fried Chicken.'),
('0000017','Ricardo','Heart','09 Silver Road, Beckham Park.'),
('0000018','Ketchup','Ash','Pallet Town, West Kanto Region.'),
('0000019','Viva','Giovanni','Soul Silver Street, Viridian City, West Kanto Region.'),
('0000020','Crystal','Grey','City of Evergreen, Central Johto Region.'),
('0000031','Light','Lilian',''),
('0000032','Violet','Vivi','Route 26, Cinnabar Island, Kanto Region.'),
('0000033','Lilam','Loren','Route 205, Floaroma Town, Sinnoh Region.')
;
/*SAMPLE DATA END*/

create table EYEPATIENT(
PAT_ID_NUM VARCHAR(15) NOT NULL UNIQUE,
PAT_FNAME VARCHAR(20) NOT NULL,
PAT_LNAME VARCHAR(20) NOT NULL,
HAS_PHIL_HEALTH CHAR(1) NOT NULL,
PHY_LICENSE_NUM CHAR(7) NOT NULL,
STAFF_LICENSE_NUM CHAR(7) NOT NULL,
PRE_VA_WITH_SPECT_RIGHT VARCHAR(7) NOT NULL,
PRE_VA_WITH_SPECT_LEFT VARCHAR(7) NOT NULL,
PRE_VA_NO_SPECT_RIGHT VARCHAR(7) NOT NULL,
PRE_VA_NO_SPECT_LEFT VARCHAR(7) NOT NULL,
POST_VA_WITH_SPECT_RIGHT VARCHAR(7) NOT NULL,
POST_VA_WITH_SPECT_LEFT VARCHAR(7) NOT NULL,
POST_VA_NO_SPECT_RIGHT VARCHAR(7) NOT NULL,
POST_VA_NO_SPECT_LEFT VARCHAR(7) NOT NULL,
VISUAL_DISABILITY VARCHAR(15),
DISABILITY_CAUSE VARCHAR(30),
DIAGNOSIS VARCHAR(15),
PROCEDURE_TO_DO VARCHAR(15),
RIGHT_EYE_AFFECTED VARCHAR(12),
LEFT_EYE_AFFECTED VARCHAR(12),
PRIMARY KEY (PAT_ID_NUM),
FOREIGN KEY (PHY_LICENSE_NUM) references DOCTOR(DOC_LICENSE_NUM) on update cascade
);

create table SURGERY(
CASE_NUM CHAR(10) NOT NULL UNIQUE,
SURG_LICENSE_NUM CHAR(7) NOT NULL,
PAT_ID_NUM VARCHAR(15) NOT NULL,
VISUAL_IMPARITY VARCHAR(100) NOT NULL,
MED_HISTORY VARCHAR(100),
DIAGNOSIS VARCHAR(100),
CLEARANCE_NUM VARCHAR(10) NOT NULL,
SURG_ADDRESS VARCHAR(50),
SURG_DATE DATE NOT NULL,
REMARKS VARCHAR(100),
PRIMARY KEY (CASE_NUM),
FOREIGN KEY (SURG_LICENSE_NUM) REFERENCES DOCTOR(DOC_LICENSE_NUM) on update cascade,
FOREIGN KEY (PAT_ID_NUM) REFERENCES EYEPATIENT(PAT_ID_NUM) on update cascade
);