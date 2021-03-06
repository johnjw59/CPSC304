-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.21 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table cpsc304.creator
CREATE TABLE IF NOT EXISTS `creator` (
  `creator_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` tinytext NOT NULL,
  `type` tinytext NOT NULL,
  `description` text NOT NULL,
  `country` tinytext NOT NULL,
  `year_founded` smallint(4) NOT NULL,
  `website` tinytext NOT NULL,
  `image_url` tinytext NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`creator_id`),
  UNIQUE KEY `creator_id` (`creator_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table cpsc304.creator: 5 rows
/*!40000 ALTER TABLE `creator` DISABLE KEYS */;
INSERT INTO `creator` (`creator_id`, `company_name`, `type`, `description`, `country`, `year_founded`, `website`, `image_url`, `date_added`) VALUES
	(1, 'EA', 'publisher', 'Founded and incorporated on May 28, 1982 by Trip Hawkins, the company was a pioneer of the early home computer games industry', 'USA', 1982, 'www.ea.com', 'ea.gif', '2015-03-19 17:48:41'),
	(2, 'Nintendo', 'both', 'Nintendo is a Japanese multinational consumer electronics company headquartered in Kyoto, Japan. Nintendo is the world\'s largest video game company by revenue', 'Japan', 1889, 'www.nintendo.com', 'nintendo.jpg', '2015-03-19 17:48:41'),
	(3, 'Blizzard', 'both', 'Blizzard was founded under the name Silicon & Synapse and is currently a subsidiary of American company Activision Blizzard', 'USA', 1991, 'us.blizzard.com', 'blizzard.png', '2015-03-19 17:48:41'),
	(4, 'Activision', 'publisher', 'Activion is the world\'s first independent developer and distributor of video games for gaming consoles. Its first products were cartridges for the Atari 2600 video console system', 'USA', 1979, 'www.activision.com', 'activision.jpg', '2015-03-19 17:48:41'),
	(5, 'Bioware', 'developer', 'BioWare is currently owned by American company Electronic Arts. The company specializes in role-playing video games, and became famous for launching highly praised and successful licensed franchises', 'Canada', 2007, 'www.bioware.com', 'bioware.jpg', '2015-03-19 17:48:41'),
	(6, '2K Games', 'both', 'K Games, Inc. is an American global developer, marketer, distributor and publisher of video games. 2K Games is a subsidiary of Take-Two Interactive. It was created on January 25, 2005 after Take-Two acquired developer Visual Concepts and its wholly owned subsidiary Kush Games from Sega.', 'USA', 2005, 'www.2k.com', '2kgames.png', '2015-03-26 23:59:16'),
	(7, 'Bungie', 'developer', 'Bungie, Inc.  was established in May 1991 as Bungie Software Products Corporation by University of Chicago undergraduate student Alex Seropian, who later brought in programmer Jason Jones. The company concentrated primarily on Macintosh games during its early years but was acquired by Microsoft in 2000.', 'USA', 1991, 'www.bungie.net', 'bungie.png', '2015-03-27 00:05:18'),
	(8, 'Microsoft', 'publisher', 'Microsoft Corporation /?ma?kr?s??ft/[4] is an American multinational corporation that develops, manufactures, licenses, supports and sells computer software, consumer electronics and personal computers and services. Its best known software products are the Microsoft Windows line of operating systems, Microsoft Office office suite, and Internet Explorer web browser. Its flagship hardware products are the Xbox game consoles and the Microsoft Surface tablet lineup.', 'USA', 1975, 'www.microsoft.com', 'Microsoft.png', '2015-03-27 00:05:38');
/*!40000 ALTER TABLE `creator` ENABLE KEYS */;


-- Dumping structure for table cpsc304.favourite
CREATE TABLE IF NOT EXISTS `favourite` (
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  PRIMARY KEY (`game_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table cpsc304.favourite: ~4 rows (approximately)
/*!40000 ALTER TABLE `favourite` DISABLE KEYS */;
INSERT INTO `favourite` (`user_id`, `game_id`) VALUES
	(1, 1),
	(4, 1),
	(5, 1),
	(1, 5);
/*!40000 ALTER TABLE `favourite` ENABLE KEYS */;


-- Dumping structure for table cpsc304.game
CREATE TABLE IF NOT EXISTS `game` (
  `game_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` tinytext NOT NULL,
  `image_url` tinytext NOT NULL,
  `description` text NOT NULL,
  `release_date` date NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`game_id`),
  UNIQUE KEY `game_id` (`game_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table cpsc304.game: 5 rows
/*!40000 ALTER TABLE `game` DISABLE KEYS */;
INSERT INTO `game` (`game_id`, `title`, `image_url`, `description`, `release_date`, `date_added`) VALUES
	(1, 'Mass Effect 2', 'mass_effect_2.jpg', 'After being revived from death and having to join a pro-human organization without a choice, Commander Shepard must assemble a team, battle a new threat, and make tough choices in order to save the galaxy from total annihilation once more.', '2010-01-26', '2015-03-17 18:05:43'),
	(2, 'Call of Duty Black Ops', 'cod_black_ops.jpg', 'When he\'s interrogated by unknown figures, Alex Mason has to remember the location of a broadcast station, to stop a horrifying biotic weapon attack. During the progress, he begins to suspect the true identity of his Soviet friend-Victor Reznov.', '2010-09-11', '2015-03-17 18:05:43'),
	(3, 'StarCraft 2', 'starcraft_2.jpg', 'Four years after the events of StarCraft: Brood War, Jim Raynor fights against the Dominion and begins a search for artifacts when at the same time zerg attack once again.', '2014-11-21', '2015-03-17 18:05:43'),
	(4, 'Super Smash Bros. for Wii U', 'smash_bros_wiiu.png', 'Famous characters from Nintendo\'s franchises, as well as special guest characters, come to battle each other.', '2014-09-21', '2015-03-17 18:05:43'),
	(5, 'Halo Reach', 'halo_reach.jpg', 'The game takes place in the year 2552, where humanity is locked in a war with the alien Covenant. Players control Noble Six, a member of an elite supersoldier squad, when the human world known as Reach falls under Covenant attack.', '2011-11-19', '2015-03-19 01:36:38'),
	(6, 'Bioshock', 'bioshock.jpg', 'BioShock is set in 1960, in which the player guides the protagonist, Jack, after his airplane crashes in the ocean near the bathysphere terminus that leads to the underwater city of Rapture. Built by the business magnate Andrew Ryan, the city was intended to be an isolated utopia, but the discovery of ADAM, a plasmid which grants superhuman powers, initiated the city\'s turbulent decline.', '2007-08-21', '2015-03-26 23:56:36');
/*!40000 ALTER TABLE `game` ENABLE KEYS */;


-- Dumping structure for table cpsc304.genre
CREATE TABLE IF NOT EXISTS `genre` (
  `genre_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`genre_id`),
  UNIQUE KEY `genre_id` (`genre_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table cpsc304.genre: 5 rows
/*!40000 ALTER TABLE `genre` DISABLE KEYS */;
INSERT INTO `genre` (`genre_id`, `name`, `description`) VALUES
	(1, 'first-person shooter', 'Action games where the player is “behind the eyes” of the game character in a first-person perspective. Although a number of FPS games also support third-person views'),
	(2, 'action/adventure', 'Action-adventure games can be described in terms of a blend of the characteristics associated with both adventure and action games, i.e. often involving both exploration and puzzle solving alongside fast-paced action sequences.'),
	(3, 'real-time strategy', 'RTS games typically defined a number of goals around resource collection, base and unit construction and engagement in combat with other players or computer opponents who also share similar goals.'),
	(4, 'platformer', 'This genre often requires the protagonist to run and jump between surfaces (i.e. platforms) whilst avoiding game objects and the detrimental effects of gravity.'),
	(5, 'fighter', 'In fighting games the player typically fights other players or the computer in some form of one-on-one combat.'),
	(6, 'third-person shooter', 'A third-person shooter is a game structured around shooting,[1] and in which the player can see the avatar on-screen in a third-person view.'),
	(7, 'role-playing game', 'Role-playing video games form a loosely defined genre of computer and console games with origins in role-playing games such as Dungeons & Dragons, on which they base much of their terminology, settings, and game mechanics. This translation changes the experience of the game, providing a visual representation of the world but emphasizing statistical character development over collaborative, interactive storytelling.');
/*!40000 ALTER TABLE `genre` ENABLE KEYS */;


-- Dumping structure for table cpsc304.isgenre
CREATE TABLE IF NOT EXISTS `isgenre` (
  `game_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  PRIMARY KEY (`game_id`,`genre_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table cpsc304.isgenre: 5 rows
/*!40000 ALTER TABLE `isgenre` DISABLE KEYS */;
INSERT INTO `isgenre` (`game_id`, `genre_id`) VALUES
	(1, 2),
	(1, 6),
	(1, 7),
	(2, 1),
	(3, 3),
	(4, 5),
	(5, 1),
	(6, 1),
	(6, 2);
/*!40000 ALTER TABLE `isgenre` ENABLE KEYS */;


-- Dumping structure for table cpsc304.madeby
CREATE TABLE IF NOT EXISTS `madeby` (
  `game_id` int(11) NOT NULL,
  `creator_id` int(11) NOT NULL,
  PRIMARY KEY (`game_id`,`creator_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table cpsc304.madeby: 5 rows
/*!40000 ALTER TABLE `madeby` DISABLE KEYS */;
INSERT INTO `madeby` (`game_id`, `creator_id`) VALUES
	(1, 1),
	(1, 5),
	(2, 4),
	(3, 3),
	(4, 2),
	(5, 7),
	(5, 8);
/*!40000 ALTER TABLE `madeby` ENABLE KEYS */;


-- Dumping structure for table cpsc304.onplatform
CREATE TABLE IF NOT EXISTS `onplatform` (
  `game_id` int(11) NOT NULL,
  `platform_id` int(11) NOT NULL,
  PRIMARY KEY (`game_id`,`platform_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table cpsc304.onplatform: 5 rows
/*!40000 ALTER TABLE `onplatform` DISABLE KEYS */;
INSERT INTO `onplatform` (`game_id`, `platform_id`) VALUES
	(1, 1),
	(1, 2),
	(1, 4),
	(2, 1),
	(2, 2),
	(2, 4),
	(3, 4),
	(4, 3),
	(5, 2),
	(6, 1),
	(6, 2),
	(6, 4);
/*!40000 ALTER TABLE `onplatform` ENABLE KEYS */;


-- Dumping structure for table cpsc304.platform
CREATE TABLE IF NOT EXISTS `platform` (
  `platform_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `manufacturer` tinytext NOT NULL,
  PRIMARY KEY (`platform_id`),
  UNIQUE KEY `platform_id` (`platform_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table cpsc304.platform: 2 rows
/*!40000 ALTER TABLE `platform` DISABLE KEYS */;
INSERT INTO `platform` (`platform_id`, `name`, `manufacturer`) VALUES
	(1, 'Playstation 3', 'Sony'),
	(2, 'Xbox 360', 'Microsoft'),
	(3, 'Wii U', 'Nintendo'),
	(4, 'PC', 'Microsoft');
/*!40000 ALTER TABLE `platform` ENABLE KEYS */;


-- Dumping structure for table cpsc304.review
CREATE TABLE IF NOT EXISTS `review` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `text` text,
  `rating` int(11) NOT NULL,
  PRIMARY KEY (`review_id`),
  UNIQUE KEY `review_id` (`review_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table cpsc304.review: 5 rows
/*!40000 ALTER TABLE `review` DISABLE KEYS */;
INSERT INTO `review` (`review_id`, `user_id`, `game_id`, `text`, `rating`) VALUES
	(1, 1, 1, 'it\'s amazing!!!', 10),
	(2, 2, 1, 'Meh', 4),
	(3, 3, 1, 'I liked the first one more, but it\'s still good i guess.', 7),
	(4, 1, 2, 'HOLY CRAP ITS GOOD', 9),
	(5, 1, 3, 'this game sux', 1),
	(6, 2, 6, 'mediocre', 6),
	(7, 3, 7, 'my favourite game', 7),
	(8, 2, 3, 'worst', 1),
	(9, 2, 4, 'pretty great!', 8);
/*!40000 ALTER TABLE `review` ENABLE KEYS */;


-- Dumping structure for table cpsc304.user
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` tinytext NOT NULL,
  `admin` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_id` (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table cpsc304.user: 4 rows
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`user_id`, `name`, `email`, `password`, `admin`) VALUES
	(1, 'John', 'johnjw59@gmail.com', 'c0f2e5c77c372ae1b5e30c52bed447a8', 1),
	(2, 'Joe', 'a;lsdk', 'a;lskdf', 0),
	(3, 'Jeff', 'a;lskdfj', 'a;lskd', 0),
	(4, 'Admin', 'cpsc304@admin.com', '81dc9bdb52d04dc20036dbd8313ed055', 1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
