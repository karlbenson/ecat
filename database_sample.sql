/*SQL TRIAL CODE*/

drop database lukedb;
create database lukedb;
use lukedb;

create table patient(
patient_id int unsigned not null auto_increment,
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
highest_educ_attainment varchar(50) null,
primary key (patient_id)
);


create table DOCTOR(
	DOC_LICENSE_NUM  CHAR(7) NOT NULL UNIQUE,
	LAST_NAME VARCHAR(20) NOT NULL,
	FIRST_NAME VARCHAR(20)  NOT NULL,
	ADDRESS VARCHAR(50),
	SPECIALIZATION VARCHAR(25),
	PRIMARY KEY (DOC_LICENSE_NUM)
);

/*NOTE:
	EYE PATIENT FORM:
	- form will be filed before surgery
	- post VA values will be placed after surgery
	- Patient info. such as name, age, sex... (taken from patient record's group?)
*/

create table EYEPATIENT(
	PAT_ID_NUM VARCHAR(15) NOT NULL UNIQUE,
	PAT_UNIV_ID INT UNSIGNED NOT NULL,
	PAT_FNAME VARCHAR(20) NOT NULL,
	PAT_LNAME VARCHAR(20) NOT NULL,
	PAT_AGE VARCHAR(6) NOT NULL,
	PAT_PH CHAR(1) NOT NULL,
	PAT_SEX CHAR(1) NOT NULL,
	PHY_LICENSE_NUM CHAR(7) NOT NULL,
	STAFF_LICENSE_NUM CHAR(7) NOT NULL,
	PRE_VA_WITH_SPECT_LEFT VARCHAR(7) NOT NULL,
	POST_VA_WITH_SPECT_LEFT VARCHAR(7),
	PRE_VA_WITH_SPECT_RIGHT VARCHAR(7) NOT NULL,
	POST_VA_WITH_SPECT_RIGHT VARCHAR(7),
	PRE_VA_NO_SPECT_LEFT VARCHAR(7) NOT NULL,
	POST_VA_NO_SPECT_LEFT VARCHAR(7),
	PRE_VA_NO_SPECT_RIGHT VARCHAR(7) NOT NULL,
	POST_VA_NO_SPECT_RIGHT VARCHAR(7),
	VISUAL_DISABILITY VARCHAR(15),
	DISABILITY_CAUSE VARCHAR(30),
	DIAGNOSIS VARCHAR(15),
	PROCEDURE_TO_DO VARCHAR(15),
	RIGHT_EYE_AFFECTED VARCHAR(12),
	LEFT_EYE_AFFECTED VARCHAR(12),
	PRIMARY KEY (PAT_ID_NUM),
	FOREIGN KEY (PHY_LICENSE_NUM) references DOCTOR(DOC_LICENSE_NUM) on update cascade,
	FOREIGN KEY (PAT_UNIV_ID) references PATIENT(PATIENT_ID) on update cascade
);

/*NOTE:
	EYE SURGERY FORM:
	- info. provided (from eye.xsl):
		- has empty values for dates
		- surgeon, internist, anesthesiologist field are not left blank
		- internist field may have more than one value
*/

CREATE TABLE SURGERY(
	CASE_NUM CHAR(10) NOT NULL UNIQUE,
	SURG_LICENSE_NUM CHAR(7) NOT NULL,
	PAT_ID_NUM VARCHAR(15) NOT NULL,
	VISUAL_IMPARITY VARCHAR(100) NOT NULL,
	MED_HISTORY VARCHAR(100),
	DIAGNOSIS VARCHAR(100),
	SURG_ANESTHESIA vARCHAR(25) NOT NULL,
	SURG_ADDRESS VARCHAR(50) NOT NULL,
	SURG_DATE DATE,
	REMARKS VARCHAR(100),
	INTERNIST VARCHAR(40),
	ANESTHESIOLOGIST VARCHAR(40) NOT NULL,
	IOLPOWER VARCHAR(20) NOT NULL,
	PC_IOL DECIMAL(8,2),
	PC_LAB DECIMAL(8,2),
	PC_PF DECIMAL(8,2),
	SPO_IOL DECIMAL(8,2),
	CSF_HBILL DECIMAL(8,2),
	CSF_SUPPLIES DECIMAL(8,2),
	CSF_LAB DECIMAL(8,2),
	PRIMARY KEY (CASE_NUM),
	FOREIGN KEY (SURG_LICENSE_NUM) REFERENCES DOCTOR(DOC_LICENSE_NUM) on update cascade,
	FOREIGN KEY (PAT_ID_NUM) REFERENCES EYEPATIENT(PAT_ID_NUM) on update cascade
);

