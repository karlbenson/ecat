

create table DOCTOR(
	DOC_LICENSE_NUM  CHAR(7) NOT NULL UNIQUE,
	LAST_NAME VARCHAR(20) NOT NULL,
	FIRST_NAME VARCHAR(20)  NOT NULL,
	ADDRESS VARCHAR(50),
	SPECIALIZATION VARCHAR(25),
	PRIMARY KEY (DOC_LICENSE_NUM)
);

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
	RIGHT_DIAGNOSIS VARCHAR(30),
	LEFT_DIAGNOSIS VARCHAR(30),
	PROCEDURE_TO_DO VARCHAR(15),
	PRIMARY KEY (PAT_ID_NUM),
	FOREIGN KEY (PHY_LICENSE_NUM) references DOCTOR(DOC_LICENSE_NUM) on update cascade,
	FOREIGN KEY (PAT_UNIV_ID) references PATIENT(PATIENT_ID) on update cascade,
	FOREIGN KEY (STAFF_LICENSE_NUM) references STAFF_LICENSE_NUM(STAFF_LICENSE_NUM) on update cascade
);

CREATE TABLE SURGERY(
	CASE_NUM CHAR(10) NOT NULL UNIQUE,
	SURG_LICENSE_NUM CHAR(7) NOT NULL,
	SURG_LICENSE_NUM1 CHAR(7),
	SURG_LICENSE_NUM2 CHAR(7),
	PAT_ID_NUM VARCHAR(15) NOT NULL,
	VISUAL_IMPARITY VARCHAR(100) NOT NULL,
	MED_HISTORY VARCHAR(100),
	RIGHT_DIAGNOSIS VARCHAR(30),
	LEFT_DIAGNOSIS VARCHAR(30),
	SURG_ANESTHESIA VARCHAR(25) NOT NULL,
	SURG_ADDRESS VARCHAR(50) NOT NULL,
	SURG_DATE DATE NOT NULL,
	REMARKS VARCHAR(100),
	INTERNIST VARCHAR(40),
	INTERNIST1 VARCHAR(40),
	INTERNIST2 VARCHAR(40),
	ANESTHESIOLOGIST VARCHAR(40) NOT NULL,
	IOLPOWER VARCHAR(20) NOT NULL,
	PC_IOL DECIMAL(8,2),
	PC_LAB DECIMAL(8,2),
	PC_PF DECIMAL(8,2),
	SPO_IOL DECIMAL(8,2),
	CSF_HBILL DECIMAL(8,2),
	CSF_SUPPLIES DECIMAL(8,2),
	CSF_LAB DECIMAL(8,2),
	NDDCH_RA DECIMAL(8,2),
	NDDCH_ZEISS DECIMAL(8,2),
	NDDCH_SUPPLIES DECIMAL(8,2),
	LF_PF DECIMAL(8,2),
	LF_CPC DECIMAL(8,2),
	VISIBLE CHAR(1),
	PRIMARY KEY (CASE_NUM),
	FOREIGN KEY (SURG_LICENSE_NUM) REFERENCES DOCTOR(DOC_LICENSE_NUM),
	FOREIGN KEY (ANESTHESIOLOGIST) REFERENCES DOCTOR(DOC_LICENSE_NUM),
	FOREIGN KEY (PAT_ID_NUM) REFERENCES EYEPATIENT(PAT_ID_NUM) on delete cascade
);

