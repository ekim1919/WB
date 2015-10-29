CREATE TABLE UserAuthInfo (
	
	Username	VARCHAR(16) NOT NULL,
	Password 	VARCHAR(32) NOT NULL,
	PRIMARY KEY (Username));

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


CREATE TABLE GameRoster	(

	Username         VARCHAR(16) references UserAuthInfo(Username),
	CharacterID      VARCHAR(20) references Character(CharacterID),
	PRIMARY KEY(Username, CharacterID));
