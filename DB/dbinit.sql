CREATE TABLE UserAuthInfo (
	
	Username	VARCHAR(16) NOT NULL,
	Password 	VARCHAR(32) NOT NULL,
	PRIMARY KEY (Username));

CREATE TABLE User (
	Username VARCHAR(16) NOT NULL references UserAuthInfo(Username),
	AvatarPath VARCHAR(128) NOT NULL,
	PRIMARY KEY(Username)); 

CREATE TABLE PointsSystem (

	Score                 integer NOT NULL,
	GoodSimpleGesture     smallint NOT NULL,
	GoodMidGesture        smallint NOT NULL,
	GoodAdvGesture        smallint NOT NULL,
	BadSimpleGesture      smallint NOT NULL,
	BadMidGesture         smallint NOT NULL,
	BadAdvGesture         smallint NOT NULL,
	PRIMARY KEY(Score));
	
CREATE TABLE Player (

	Username     VARCHAR(16) references UserAuthInfo(Username),
	Score        integer NOT NULL references PointsSystem(Score),
 	PRIMARY KEY(Username));
 
/*Values use the metric system*/
CREATE TABLE Character	(

	CharacterID      smallint,
	FirstName        VARCHAR(20),
	LastName         VARCHAR(20),
	HairColor        VARCHAR(20),
	EyeColor         VARCHAR(20),
	Height           VARCHAR(20),
    Weight           VARCHAR(20),
	Bust             VARCHAR(20),
	Waist            VARCHAR(20),
	Hips             VARCHAR(20),
	BodyType         VARCHAR(20),
	Personality      VARCHAR(20),
	AvatarPath		 VARCHAR(128),
	AvatarThumbPath  VARCHAR(128),
	PRIMARY KEY(CharacterID));

CREATE TABLE GameRoster	(

	Username         VARCHAR(16) references UserAuthInfo(Username),
	CharacterID      smallint references Character(CharacterID),
	PRIMARY KEY(Username, CharacterID));

CREATE SEQUENCE Character_CharacterID_seq
 INCREMENT BY 1
 MINVALUE 1
 NO CYCLE;
 
 /*Resets the "nextval" for the INSERT INTO command if needed. A user easily can execute 
 an INSERT command with the same entries more than once, which affects the sequence.*/
ALTER SEQUENCE Character_CharacterID_seq
RESTART WITH /*Insert value here*/;
               
