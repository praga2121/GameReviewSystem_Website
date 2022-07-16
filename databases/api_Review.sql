CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'One Star'),
(2, 'Two Stars'),
(3, 'Three Stars'),
(4, 'Four Stars'),
(5, 'Five Stars');

CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);

INSERT INTO `posts` (`id`, `category_id`, `title`, `body`, `author`) VALUES
(1, 5, 'Tales of Arise', 'Rich in Worldbuilding and Story.','Sharona'),
(2, 4, 'Tales of Arise', 'Nice game, strongly recommend.','Pragatheswaran'),
(3, 1, 'Tales of Arise', 'Poor game in terms of Graphics. Story Is fine.','Jenny'),
(4, 5, 'Need for Speed Most Wanted', 'Cool Game, As a racing fan I love the OSTS and gameplay.','Frezzeli'),
(5, 3, 'Need for Speed Most Wanted', 'Overall game is fine, but then once you are done at the end, you got nothing to do rather than uninstalling.','Rebecca'),
(6, 5, 'Elden Ring', 'Recommend for friends who has zero experience in soul like game.','Alban');