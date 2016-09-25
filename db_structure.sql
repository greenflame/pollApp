CREATE TABLE if not exists `Users` (
  `id` int(16) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `login` varchar(32) NOT NULL,
  `password_hash` varchar(32) NOT NULL
);

CREATE TABLE `Poll` (
  `Id` int(16) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `Author` int(16) NOT NULL,
  `Name` varchar(32) NOT NULL,
  `Description` varchar(64) NOT NULL,

  INDEX `PollAuthorIndex` (`Author`),

  CONSTRAINT `PollAuthorFK` FOREIGN KEY
    (`Author`) REFERENCES `Users` (`id`)
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
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,

  INDEX `AnswerQuestionFK` (`Question`),

  CONSTRAINT `AnswerQuestionFK` FOREIGN KEY
    (`Question`) REFERENCES `Question` (`Id`)
    ON DELETE CASCADE ON UPDATE CASCADE
);
