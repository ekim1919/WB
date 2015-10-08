CREATE TABLE USERAUTHINFO (
	
	USERNAME		VARCHAR(16) NOT NULL,
	PASSWORD 		VARCHAR(32) NOT NULL,
	PRIMARY KEY (USERNAME));
	
CREATE TABLE User
(Username VARCHAR2(16),
Score NUMBER(50) NOT NULL,
  CONSTRAINT User_Username_pk PRIMARY KEY(Username),
  CONSTRAINT User_Username_fk FOREIGN KEY(Username));
  
CREATE TABLE PointsSystem
(Score NUMBER(38) NOT NULL,
GoodSimpleGesture NUMBER(4) NOT NULL,
GoodMidGesture NUMBER(4) NOT NULL,
GoodAdvGesture NUMBER(4) NOT NULL,
BadSimpleGesture NUMBER(4) NOT NULL,
BadMidGesture NUMBER(4) NOT NULL,
BadAdvGesture NUMBER(4) NOT NULL,
  CONSTRAINT PointsSystem_Score_pk PRIMARY KEY(Score)
  CONSTRAINT PointsSystem_Score_fk FOREIGN KEY(Score));

CREATE TABLE GameRoster
(Username VARCHAR2(16),
CharacterID VARCHAR2(20),
  CONSTRAINT GameRoster_Username_pk PRIMARY KEY(Username)
  CONSTRAINT GameRoster_Username_fk FOREIGN KEY(Username)
  CONSTRAINT GameRoster_CharacterID_pk PRIMARY KEY(CharacterID)
  CONSTRAINT GameRoster_CharacterID_fk FOREIGN KEY(CharacterID));
  
CREATE TABLE Character
(CharacterID VARCHAR2(20),
FirstName VARCHAR2(20),
LastName VARCHAR2(20),
HairColor VARCHAR2(20),
EyeColor VARCHAR2(20),
Height VARCHAR2(20),
Bust VARCHAR2(20),
Waist VARCHAR2(20),
Hips VARCHAR2(20),
BodyType VARCHAR2(20),
Personality VARCHAR2(20),
  CONSTRAINT Character_CharacterID_pk PRIMARY KEY(CharacterID));
  
CREATE SEQUENCE Character_CharacterID_seq
  INCREMENT BY 1
  MINVALUE 1
  NOCACHE
  NOCYCLE;
