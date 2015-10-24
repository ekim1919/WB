CREATE TABLE UserAuthInfo (
	
	Username	VARCHAR(16) NOT NULL,
	Password 	VARCHAR(32) NOT NULL,
	PRIMARY KEY (Username));
	
CREATE TABLE User (

	Username     VARCHAR(16),
	Score        NUMBER(50) NOT NULL,
 	PRIMARY KEY(Username),
 	FOREIGN KEY(Username));
 
CREATE TABLE PointsSystem (

	Score                 NUMBER(38) NOT NULL,
	GoodSimpleGesture     NUMBER(4) NOT NULL,
	GoodMidGesture        NUMBER(4) NOT NULL,
	GoodAdvGesture        NUMBER(4) NOT NULL,
	BadSimpleGesture      NUMBER(4) NOT NULL,
	BadMidGesture         NUMBER(4) NOT NULL,
	BadAdvGesture         NUMBER(4) NOT NULL,
	PRIMARY KEY(Score)
	FOREIGN KEY(Score));

CREATE TABLE GameRoster	(

	Username         VARCHAR(16),
	CharacterID      VARCHAR(20),
	PRIMARY KEY(Username)
	FOREIGN KEY(Username)
	PRIMARY KEY(CharacterID)
	FOREIGN KEY(CharacterID));
 
CREATE TABLE Character	(

	CharacterID      VARCHAR(20),
	FirstName        VARCHAR(20),
	LastName         VARCHAR(20),
	HairColor        VARCHAR(20),
	EyeColor         VARCHAR(20),
	Height           VARCHAR(20),
	Bust             VARCHAR(20),
	Waist            VARCHAR(20),
	Hips             VARCHAR(20),
	BodyType         VARCHAR(20),
	Personality      VARCHAR(20),
	PRIMARY KEY(CharacterID));
 
CREATE SEQUENCE Character_CharacterID_seq
 INCREMENT BY 1
 MINVALUE 1
 NOCYCLE;
