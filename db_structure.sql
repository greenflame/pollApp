CREATE TABLE `User` (
  `Id` int(16) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `Login` varchar(32) NOT NULL,
  `Password` varchar(32) NOT NULL
);

CREATE TABLE `Poll` (
  `Id` int(16) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `Author` int(16) NOT NULL,
  `Name` varchar(32) NOT NULL,
  `Description` varchar(64) NOT NULL,

  INDEX `PollAuthorIndex` (`Author`),

  CONSTRAINT `PollAuthorFK` FOREIGN KEY
    (`Author`) REFERENCES `User` (`Id`)
    ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `Question` (
  `Id` int(16) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `Poll` int(16) NOT NULL,
  `Number` int(16) NOT NULL,
  `Caption` varchar(32) NOT NULL,
  `Body` text NOT NULL,

  INDEX `QuestionPolIndex` (`Poll`),

  CONSTRAINT `QuestionPollFK` FOREIGN KEY
    (`Poll`) REFERENCES `Poll` (`Id`)
    ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `Answer` (
  `Id` int(16) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `Question` int(16) NOT NULL,
  `Body` text NOT NULL,

  INDEX `AnswerQuestionFK` (`Question`),

  CONSTRAINT `AnswerQuestionFK` FOREIGN KEY
    (`Question`) REFERENCES `Question` (`Id`)
    ON DELETE CASCADE ON UPDATE CASCADE
);
