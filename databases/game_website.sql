-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2021 at 11:47 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `game_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `password`) VALUES
(1, 'Praga', 'admin@mail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `game_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `overall_rating` varchar(6) NOT NULL DEFAULT '0',
  `game_description` varchar(5000) NOT NULL,
  `url` varchar(2083) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`game_id`, `name`, `overall_rating`, `game_description`, `url`) VALUES
(56, 'Tales Of Arise', '5.0', 'Tales of Arise is an action role-playing game developed and published by Bandai Namco Entertainment for Microsoft Windows, PlayStation 4, PlayStation 5, Xbox One, and Xbox Series X/S. The seventeenth main entry in the Tales series, it was originally planned to release in 2020 but was delayed to September 2021 due to internal quality issues and the ability to launch the game on more platforms.\n It is also the first game of the series with a worldwide simultaneous launch. The game follows a man and a woman from the opposing worlds of Dahna and Rena and their journey to end the Renans oppression of the Dahnan people.           ', 'https://www.bandainamcoent.com/games/tales-of-arise'),
(57, 'Elden Ring', '0', 'Elden Ring is a 2022 action role-playing game developed by FromSoftware and published by Bandai Namco Entertainment. It was directed by Hidetaka Miyazaki and made in collaboration with the fantasy novelist George R. R. Martin, who provided material for the setting. It was released for PlayStation 4, PlayStation 5, Windows, Xbox One, and Xbox Series X/S on February 25.\n Elden Ring is presented through a third-person perspective, with players freely roaming its interactive open world. Gameplay elements include combat featuring several types of weapons and magic spells, horseback riding, summons, and crafting. The game received critical acclaim, with praise for its open world and evolution of the Souls games, a related series by FromSoftware sharing the same core gameplay. Elden Ring sold more than 13.4 million copies within five weeks of its release.     ', 'https://en.bandainamcoent.eu/elden-ring/elden-ring'),
(58, 'Forza Horizon 5', '0', 'Forza Horizon 5 is a 2021 racing video game developed by Playground Games and published by Xbox Game Studios. It is the fifth Forza Horizon title and twelfth main instalment in the Forza series. The game is set in a fictionalised representation of Mexico. It was released on 9 November 2021 for Microsoft Windows, Xbox One, and Xbox Series X/S. \n The game received critical acclaim and became a commercial success upon release; it launched to over ten million players in the first week, the biggest-ever launch for an Xbox Game Studios game. The game was nominated for three jury-voted awards at The Game Awards 2021, winning all three of its nominations and tying with Hazelights It Takes Two for most wins, and was also nominated for the public-voted Players Voice award, which went to fellow Xbox Game Studios title Halo Infinite.    ', 'https://www.xbox.com/en-US/games/forza-horizon-5'),
(59, 'Honkai Impact 3rd', '0', 'Honkai Impact 3rd is a free-to-play 3D action role-playing game (originally a mobile exclusive) developed and published by miHoYo, and later ported to Microsoft Windows. It is the spiritual successor to Houkai Gakuen 2, using many characters from the previous title in a separate story. \n The game is notable for incorporating a variety of genres, from hack and slash and social simulation, to elements of bullet hell, platforming, shoot em up and dungeon crawling across multiple single and multiplayer modes. It features gacha mechanics. In addition to the game, the storyline of Honkai Impact 3rd spans multiple supplementary media including an anime series, multiple manhua series, and promotional videos.    ', 'https://honkaiimpact3.hoyoverse.com/global/en-us/home'),
(60, 'Star Wars: Battlefront II', '0', 'Star Wars Battlefront II is an action shooter video game based on the Star Wars franchise. It is the fourth main installment of the Star Wars: Battlefront series, and a sequel to the 2015 reboot of the series. It was developed by DICE, in collaboration with Criterion Games and Motive Studios, and published by Electronic Arts. \n The game was released worldwide on November 17, 2017, for the PlayStation 4, Xbox One, and Microsoft Windows. The game features both single-player and multiplayer modes, and overall includes more content than its predecessor. The single-player campaign of the game is set between the films Return of the Jedi and The Force Awakens, and follows an original character, Iden Versio, the commander of an Imperial special ops squad, who defects to the New Republic after becoming disillusioned with the Galactic Empires tactics. Most of the story takes place during the final year of the Galactic Civil War, before the Empires definitive defeat at the Battle of Jakku.  ', 'https://www.ea.com/games/starwars/battlefront/star-wars-battlefront-2'),
(61, 'Halo Infinite', '0', 'Halo Infinite is a 2021 first-person shooter game developed by 343 Industries and published by Xbox Game Studios. It is the sixth mainline entry in the Halo series, and the third in the "Reclaimer Saga" following Halo 5: Guardians (2015). The campaign follows the human supersoldier Master Chief and his fight against the enemy Banished on the Forerunner ringworld Zeta Halo, also known as Installation 07. \n Unlike previous installments in the series, the multiplayer portion of the game is free-to-play. ', 'https://www.halowaypoint.com/'),
(62, 'Hitman 3', '0', 'Hitman 3 (stylized as HITMAN III) is a 2021 stealth game developed and published by IO Interactive. It is the sequel to the 2018 video game Hitman 2, the eighth main installment in the Hitman series and the third and final entry in the World of Assassination trilogy. \n Concluding the plot arc started in Hitman, the single-player storyline follows genetically-engineered assassin Agent 47 and his allies as they hunt down the leaders of the secretive organization Providence, which controls the worlds affairs and was partially responsible for agent 47 creation and upbringing. ', 'https://hitman.com/global/'),
(63, 'Genshin Impact', '0', 'Genshin Impact is an action role-playing game developed and published by miHoYo. It was released for Microsoft Windows, PlayStation 4, iOS, and Android in 2020, and on PlayStation 5 in 2021. The game is also set for release on Nintendo Switch. The game features an anime-style open-world environment and an action-based battle system using elemental magic and character-switching. \n The game is free-to-play and is monetized through gacha game mechanics where players can obtain new characters and weapons. The base game is expanded on a regular basis through patches using the games as a service model. ', 'https://genshin.hoyoverse.com/en/'),
(64, 'Valorant', '0', 'Valorant (stylized as VALORANT) is a free-to-play first-person hero shooter developed and published by Riot Games, for Microsoft Windows. First teased under the codename Project A in October 2019, the game began a closed beta period with limited access on April 7, 2020, followed by an official release on June 2, 2020.\n  The development of the game started in 2014. Valorant takes inspiration from the Counter-Strike series of tactical shooters, borrowing several mechanics such as the buy menu, spray patterns, and inaccuracy while moving. ', 'https://playvalorant.com/en-us/'),
(65, 'Devil May Cry 5', '0', 'Devil May Cry 5 is a 2019 action-adventure game developed and published by Capcom. It is the sixth installment overall and the fifth mainline installment in the Devil May Cry series. Capcom released it for PlayStation 4, Windows, and Xbox One on 8 March 2019. \n The game takes place five years after Devil May Cry 4 and follows a trio of warriors with demonic powers, the returning Dante, Nero, and a new protagonist named V, as they attempt to stop the Demon King Urizen from destroying the human world. Across their journey in Red Grave City, the player can use these characters in different missions. Each of them has their own way of fighting and becoming stronger. As this happens, the mystery behind V is revealed, along with his connection with Urizen. ', 'https://www.devilmaycry5.com/'),
(66, 'Dying Light', '0', 'Dying Light is a 2015 survival horror video game developed by Techland and published by Warner Bros. Interactive Entertainment. The story of the game follows an undercover agent named Kyle Crane who is sent to infiltrate a quarantine zone in a Middle-eastern city called Harran. \n It features an enemy-infested, open-world city with a dynamic day and night cycle, in which zombies are slow and clumsy during daytime but become extremely aggressive at night. The gameplay is focused on weapons-based combat and parkour, allowing players to choose fight or flight when presented with dangers. The game also features an asymmetrical multiplayer mode which was originally set to be a pre-order bonus, and a four-player co-operative multiplayer mode. ', 'https://dyinglightgame.com/'),
(67, 'Assassins Creed Origins', '0', 'Assassins Creed Origins is a 2017 action role-playing video game developed by Ubisoft Montreal and published by Ubisoft. It is the tenth major installment in the Assassins Creed series, following 2015 Assassins Creed Syndicate.\n Principally set in Egypt, near the end of the Ptolemaic period (49 to 43 BC), the story follows a Medjay named Bayek of Siwa and his wife Aya, and explores the origins of the millennia-long conflict between the Hidden Ones—forerunners to the Assassin Brotherhood—who fight for peace by promoting liberty, and The Order of the Ancients—forerunners to the Templar Order—who desire peace through the forced imposition of order. The narrative also includes sequences set during the 21st century, which follow a new character, Layla Hassan. Origins marked the shift of the series, which up until that point consisted mainly of action-adventure games, towards a new genre, and introduced an overhauled hitbox-based combat system. ', 'https://www.ubisoft.com/en-gb/game/assassins-creed/origins');


-- --------------------------------------------------------

--
-- Table structure for table `gamedetails`
--

CREATE TABLE `gamedetails` (
  `game_id` int(100) NOT NULL,
  `subject_id` int(100) NOT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `duration` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gamedetails`
--

INSERT INTO `gamedetails` (`game_id`, `subject_id`, `price`, `duration`) VALUES
(56, 1, 189, '1.7'),
(57, 1, 199, '0.3'),
(58, 6, 159, '1.9'),
(59, 1, 0, '6.4'),
(60, 3, 159, '5.6'),
(61, 3, 0, '1.3'),
(62, 5, 195, '0.5'),
(63, 1, 0, '1.8'),
(64, 3, 0, '2.5'),
(65, 8, 124, '3'),
(66, 8, 69, '7'),
(67, 1, 189, '5');


-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `game_id` int(10) NOT NULL,
  `page_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `rating` tinyint(1) NOT NULL,
  `submit_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `game_id`, `page_id`, `name`, `content`, `rating`, `submit_date`) VALUES
(42, 56, 1, 'Kevin', 'Cool Game', 5, '2021-10-28 20:29:00'),
(55, 56, 1, 'Jessica', 'Great game and highly recommended!', 5, '2021-11-17 20:56:29');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects` 
--

INSERT INTO `subjects` (`subject_id`, `name`) VALUES
(1, 'Role-playing (RPG, ARPG, and JRPG)'),
(2, 'Sandbox'),
(3, 'Shooters (FPS and TPS)'),
(4, 'Multiplayer online battle arena (MOBA)'),
(5, 'Simulations'),
(6, 'Sport'),
(7, 'Puzzler'),
(8, 'Action-adventure'),
(9, 'Survival'),
(10, 'Horror'),
(11, 'Platformer');

-- --------------------------------------------------------
--
-- Table structure for table `subject_enum`
--

CREATE TABLE `subject_enum` (
  `subject` enum('Role-playing (RPG, ARPG, and JRPG)','Sandbox','Shooters (FPS and TPS)','Multiplayer online battle arena (MOBA)','Simulations') NOT NULL DEFAULT 'Role-playing (RPG, ARPG, and JRPG)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject_enum`
--

INSERT INTO `subject_enum` (`subject`) VALUES
('Role-playing (RPG, ARPG, and JRPG)'),
('Sandbox'),
('Shooters (FPS and TPS)'),
('Multiplayer online battle arena (MOBA)'),
('Simulations');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`game_id`);

--
-- Indexes for table `gamedetails`
--
ALTER TABLE `gamedetails`
  ADD PRIMARY KEY (`game_id`,`subject_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `reviews_ibfk_1` (`game_id`),
  ADD KEY `reviews_ibfk_2` (`subject_id`);

--
-- Indexes for table `subjects` 
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `game_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gamedetails`
--
ALTER TABLE `gamedetails`
  ADD CONSTRAINT `gamedetails_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gamedetails_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `games` (`game_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `games` (`game_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
