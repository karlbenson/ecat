/*SQL TRIAL CODE*/

drop database lukedb;
create database lukedb;
use lukedb;

create table DOCTOR(
	DOC_LICENSE_NUM  CHAR(7) NOT NULL UNIQUE,
	LAST_NAME VARCHAR(20) NOT NULL,
	FIRST_NAME VARCHAR(20)  NOT NULL,
	ADDRESS VARCHAR(50),
	SPECIALIZATION VARCHAR(25),
	PRIMARY KEY (DOC_LICENSE_NUM)
);

INSERT INTO DOCTOR VALUES
	('0000001','Smith','John','West Virginia. 26 Santos Street.','Anesthesiologist'),
	('0000002','South','Johan','West Virginia. 15 Santos Street.','Internist'),
	('0000003','Reefs','James','West Virginia. 106 Santos Street.','Anesthesiologist'),
	('0000004','Reefs','Jessie','West Virginia. 106 Santos Street.','Surgeon'),
	('0000005','Nedd','Milah','Florida, Border Street Avenue, Block 56.','Surgeon'),
	('0000006','Colonel','Sanders','Kentucky, Fried Chicken.','Internist'),
	('0000007','Ricardo','Heart','09 Silver Road, Beckham Park.','Anesthesiologist'),
	('0000008','Ketchup','Ash','Pallet Town, West Kanto Region.','Internist'),
	('0000009','Viva','Giovanni','Soul Silver Street, Viridian City, West Kanto Region.','Surgeon'),
	('0000010','Crystal','Grey','City of Evergreen, Central Johto Region.','Internist'),
	('0000011','Light','Lilian','','Surgeon'),
	('0000012','Violet','Vivi','Route 26, Cinnabar Island, Kanto Region.','Internist'),
	('0000013','Lilam','Loren','Route 205, Floaroma Town, Sinnoh Region.','Anesthesiologist')
;

/*NOTE:
	EYE PATIENT FORM:
	- form will be filed before surgery
	- post VA values will be placed after surgery
	- Patient info. such as name, age, sex... (taken from patient record's group?)
*/

create table EYEPATIENT(
	PAT_ID_NUM VARCHAR(15) NOT NULL UNIQUE,
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
	FOREIGN KEY (PHY_LICENSE_NUM) references DOCTOR(DOC_LICENSE_NUM) on update cascade
);

INSERT INTO EYEPATIENT VALUES
	('CAT2016-000','Johnny','Sins', '34', 'Y', 'M','0000001','0000002','20/32','20/20','20/12.5','20/12.5','20/32','20/20','20/12.5','20/12.5','excess eye', 'too much dota2', 'sample diag', 'remove eye','unknown','unknown'),
	('CAT2017-000','JL','Gayo', '69', 'N', 'M','0000006','0000012','20/32','20/20','20/12.5','20/12.5','20/32','20/20','20/12.5','20/12.5','excess eye', 'too much dota2', 'sample diag', 'remove eye','unknown','unknown')
;

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

