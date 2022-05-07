DROP DATABASE IF EXISTS BDAY;

CREATE DATABASE BDAY;
USE BDAY;

-- User

CREATE TABLE Users (
`UserId` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
`FirstName` VARCHAR(50) NOT NULL,
`LastName` VARCHAR(50) NOT NULL,
`Gender` VARCHAR(6) NOT NULL,
`Email` VARCHAR(80) NOT NULL UNIQUE,
`Password` VARCHAR(50) NOT NULL,
`Birthdate` DATE NOT NULL
);

-- Shop

CREATE TABLE Shops (
`ShopID` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
`Name` VARCHAR(50) NOT NULL, 
`Category` VARCHAR(50) NOT NULL,
`Website` VARCHAR(1000),
`Telephone` VARCHAR(50),
`Email` VARCHAR(50)
);

-- Friends

CREATE TABLE Friends (
`UserID` INT NOT NULL,
`FriendID` INT NOT NULL,
PRIMARY KEY (UserID, FriendID),
FOREIGN KEY (UserID) REFERENCES Users(UserID),
FOREIGN KEY (FriendID) REFERENCES Users(UserID)
);

-- Preference

CREATE TABLE Preferences (
`PreferenceID` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
`Name` VARCHAR(50) NOT NULL
);

-- User Preference

CREATE TABLE User_Preferences (
`UserID` INT NOT NULL,
`PreferenceID` INT NOT NULL,
PRIMARY KEY (UserID, PreferenceID),
FOREIGN KEY (UserID) REFERENCES Users(UserID),
FOREIGN KEY (PreferenceID) REFERENCES Preferences(PreferenceID)
);


-- Event Category
CREATE TABLE Event_Category (
`CategoryID` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
`Name` VARCHAR(50) NOT NULL
);


-- Guests

CREATE TABLE Guests (
`UserID` INT NOT NULL,
`GuestID` INT NOT NULL,
FirstName VARCHAR(50) NOT NULL,
LastName VARCHAR(50),
Preference1 INT,
Preference2 INT,
PRIMARY KEY (UserID, GuestID),
FOREIGN KEY (UserID) REFERENCES Users(UserID),
FOREIGN KEY (Preference1) REFERENCES Preferences(PreferenceID),
FOREIGN KEY (Preference2) REFERENCES Preferences(PreferenceID)
);

-- Events

CREATE TABLE Events (
`EventID` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
`Name` VARCHAR(200) NOT NULL,
`Date` DATE NOT NULL,
`EventCategory` INT NOT NULL,
`UserID` INT NOT NULL,
`FriendID` INT,
`GuestID` INT,
FOREIGN KEY (EventCategory) REFERENCES Event_Category(CategoryID),
FOREIGN KEY (UserID, FriendID) REFERENCES Friends(UserID, FriendID),
FOREIGN KEY (UserID, GuestID) REFERENCES Guests(UserID, GuestID)
);

-- Gifts

CREATE TABLE Gifts (
`GiftID` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
`ProductName` VARCHAR(50) NOT NULL,
`Shop` VARCHAR(50) NOT NULL,
`Price` DOUBLE NOT NULL,
`Website` VARCHAR(1000),
`EventCategory` INT,
FOREIGN KEY (EventCategory) REFERENCES Event_Category(CategoryID)
);

-- Favorite

CREATE TABLE Favorite (
`UserID` INT NOT NULL,
`GiftID` INT NOT NULL,
`EventID` INT NOT NULL,
PRIMARY KEY (UserID, GiftID, EventID),
FOREIGN KEY (UserID) REFERENCES Users(UserID),
FOREIGN KEY (GiftID) REFERENCES Gifts(GiftID),
FOREIGN KEY (EventID) REFERENCES Events(EventID)
);

-- Gift Preferences

CREATE TABLE Gift_Preferences (
`GiftID` INT NOT NULL,
`PreferenceID` INT NOT NULL,
PRIMARY KEY (GiftID, PreferenceID),
FOREIGN KEY (GiftID) REFERENCES Gifts(GiftID),
FOREIGN KEY (PreferenceID) REFERENCES Preferences(PreferenceID)
);

-- Shop Preferences

CREATE TABLE Shop_Preferences (
`ShopID` INT NOT NULL,
`PreferenceID` INT NOT NULL,
PRIMARY KEY (ShopID, PreferenceID),
FOREIGN KEY (ShopID) REFERENCES Shops(ShopID),
FOREIGN KEY (PreferenceID) REFERENCES Preferences(PreferenceID)
);

INSERT INTO `Preferences` (`Name`) VALUES ('sports');
INSERT INTO `Preferences` (`Name`) VALUES ('gaming');
INSERT INTO `Preferences` (`Name`) VALUES ('clothing');
INSERT INTO `Preferences` (`Name`) VALUES ('decoration');
INSERT INTO `Preferences` (`Name`) VALUES ('gardening');
INSERT INTO `Preferences` (`Name`) VALUES ('gadgets');
INSERT INTO `Preferences` (`Name`) VALUES ('books');
INSERT INTO `Preferences` (`Name`) VALUES ('movies');
INSERT INTO `Preferences` (`Name`) VALUES ('art');
INSERT INTO `Preferences` (`Name`) VALUES ('beauty');
INSERT INTO `Preferences` (`Name`) VALUES ('travel');
INSERT INTO `Preferences` (`Name`) VALUES ('toys');
INSERT INTO `Preferences` (`Name`) VALUES ('cooking');

INSERT INTO `User_Preferences` (`UserID`, `PreferenceID`) VALUES ('11','1');