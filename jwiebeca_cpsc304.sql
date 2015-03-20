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
-- Dumping data for table cpsc304.creator: 5 rows
/*!40000 ALTER TABLE `creator` DISABLE KEYS */;
REPLACE INTO `creator` (`creator_id`, `company_name`, `type`, `description`, `country`, `year_founded`, `website`, `image_url`, `date_added`) VALUES
	(1, 'EA', 'publisher', 'Founded and incorporated on May 28, 1982 by Trip Hawkins, the company was a pioneer of the early home computer games industry', 'USA', 1982, 'www.ea.com', 'ea.png', '2015-03-19 17:48:41'),
	(2, 'Nintendo', 'both', 'Nintendo is a Japanese multinational consumer electronics company headquartered in Kyoto, Japan. Nintendo is the world\'s largest video game company by revenue', 'Japan', 1889, 'www.nintendo.com', 'nintendo.png', '2015-03-19 17:48:41'),
	(3, 'Blizzard', 'both', 'Blizzard was founded under the name Silicon & Synapse and is currently a subsidiary of American company Activision Blizzard', 'USA', 1991, 'us.blizzard.com', 'blizzard.png', '2015-03-19 17:48:41'),
	(4, 'Activision', 'publisher', 'Activion is the world\'s first independent developer and distributor of video games for gaming consoles. Its first products were cartridges for the Atari 2600 video console system', 'USA', 1979, 'www.activision.com', 'activision.png', '2015-03-19 17:48:41'),
	(5, 'Bioware', 'developer', 'BioWare is currently owned by American company Electronic Arts. The company specializes in role-playing video games, and became famous for launching highly praised and successful licensed franchises', 'Canada', 2007, 'www.bioware.com', 'bioware.png', '2015-03-19 17:48:41');
/*!40000 ALTER TABLE `creator` ENABLE KEYS */;

-- Dumping data for table cpsc304.game: 5 rows
/*!40000 ALTER TABLE `game` DISABLE KEYS */;
REPLACE INTO `game` (`game_id`, `title`, `image_url`, `description`, `release_date`, `date_added`) VALUES
	(1, 'Mass Effect 2', 'mass_effect_2.jpg', 'After being revived from death and having to join a pro-human organization without a choice, Commander Shepard must assemble a team, battle a new threat, and make tough choices in order to save the galaxy from total annihilation once more.', '2010-01-26', '2015-03-17 18:05:43'),
	(2, 'Call of Duty Black Ops', 'cod_black_ops.jpg', 'When he\'s interrogated by unknown figures, Alex Mason has to remember the location of a broadcast station, to stop a horrifying biotic weapon attack. During the progress, he begins to suspect the true identity of his Soviet friend-Victor Reznov.', '2010-09-11', '2015-03-17 18:05:43'),
	(3, 'StarCraft 2', 'starcraft_2.jpg', 'Four years after the events of StarCraft: Brood War, Jim Raynor fights against the Dominion and begins a search for artifacts when at the same time zerg attack once again.', '2014-11-21', '2015-03-17 18:05:43'),
	(4, 'Super Smash Bros. for Wii U', 'smash_bros_wiiu.png', 'Famous characters from Nintendo\'s franchises, as well as special guest characters, come to battle each other.', '2014-09-21', '2015-03-17 18:05:43'),
	(5, 'Halo Reach', 'halo_reach.jpg', 'The game takes place in the year 2552, where humanity is locked in a war with the alien Covenant. Players control Noble Six, a member of an elite supersoldier squad, when the human world known as Reach falls under Covenant attack.', '2011-11-19', '2015-03-19 01:36:38');
/*!40000 ALTER TABLE `game` ENABLE KEYS */;

-- Dumping data for table cpsc304.genre: 5 rows
/*!40000 ALTER TABLE `genre` DISABLE KEYS */;
REPLACE INTO `genre` (`genre_id`, `name`, `description`) VALUES
	(1, 'first-person shooter', 'Action games where the player is “behind the eyes” of the game character in a first-person perspective. Although a number of FPS games also support third-person views'),
	(2, 'action/adventure', 'Action-adventure games can be described in terms of a blend of the characteristics associated with both adventure and action games, i.e. often involving both exploration and puzzle solving alongside fast-paced action sequences.'),
	(3, 'real-time strategy', 'RTS games typically defined a number of goals around resource collection, base and unit construction and engagement in combat with other players or computer opponents who also share similar goals.'),
	(4, 'platformer', 'This genre often requires the protagonist to run and jump between surfaces (i.e. platforms) whilst avoiding game objects and the detrimental effects of gravity.'),
	(5, 'fighter', 'In fighting games the player typically fights other players or the computer in some form of one-on-one combat.');
/*!40000 ALTER TABLE `genre` ENABLE KEYS */;

-- Dumping data for table cpsc304.isgenre: 5 rows
/*!40000 ALTER TABLE `isgenre` DISABLE KEYS */;
REPLACE INTO `isgenre` (`game_id`, `genre_id`) VALUES
	(1, 2),
	(2, 1),
	(3, 5),
	(4, 3),
	(5, 4);
/*!40000 ALTER TABLE `isgenre` ENABLE KEYS */;

-- Dumping data for table cpsc304.madeby: 5 rows
/*!40000 ALTER TABLE `madeby` DISABLE KEYS */;
REPLACE INTO `madeby` (`game_id`, `creator_id`) VALUES
	(1, 1),
	(1, 5),
	(2, 4),
	(3, 2),
	(4, 3);
/*!40000 ALTER TABLE `madeby` ENABLE KEYS */;

-- Dumping data for table cpsc304.onplatform: 5 rows
/*!40000 ALTER TABLE `onplatform` DISABLE KEYS */;
REPLACE INTO `onplatform` (`game_id`, `platform_id`) VALUES
	(1, 1),
	(1, 2),
	(3, 4),
	(4, 3),
	(5, 2);
/*!40000 ALTER TABLE `onplatform` ENABLE KEYS */;

-- Dumping data for table cpsc304.platform: 2 rows
/*!40000 ALTER TABLE `platform` DISABLE KEYS */;
REPLACE INTO `platform` (`platform_id`, `name`, `manufacturer`) VALUES
	(1, 'Playstation 3', 'Sony'),
	(2, 'Xbox 360', 'Microsoft');
/*!40000 ALTER TABLE `platform` ENABLE KEYS */;

-- Dumping data for table cpsc304.review: 5 rows
/*!40000 ALTER TABLE `review` DISABLE KEYS */;
REPLACE INTO `review` (`review_id`, `user_id`, `game_id`, `text`, `rating`, `review_date`) VALUES
	(1, 1, 1, 'it\'s amazing!!!', 10, '2015-03-19 17:22:25'),
	(2, 2, 1, 'Meh', 4, '2015-03-19 17:22:45'),
	(3, 3, 1, 'I liked the first one more, but it\'s still good i guess.', 7, '2015-03-19 17:23:16'),
	(4, 1, 2, 'HOLY BALLS ITS GOOD', 9, '2015-03-19 17:23:41'),
	(5, 1, 3, 'this game sux', 1, '2015-03-19 17:23:59');
/*!40000 ALTER TABLE `review` ENABLE KEYS */;

-- Dumping data for table cpsc304.user: 0 rows
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
REPLACE INTO `user` (`user_id`, `name`, `email`, `password`) VALUES
	(1, 'John', 'johnjw59@gmail.com', ';alskdf'),
	(2, 'Joe', 'a;lsdk', 'a;lskdf'),
	(3, 'Jeff', 'a;lskdfj', 'a;lskd');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
