-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: sql301.epizy.com
-- Generation Time: Jan 14, 2019 at 01:49 AM
-- Server version: 5.6.41-84.1
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `epiz_23167716_dalbut`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `text` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `game_id` (`game_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `game_id`, `user_id`, `date`, `text`) VALUES
(32, 6, 47, '2019-01-13', 'An awesome game!'),
(31, 6, 46, '2019-01-13', 'You like Games with Unusual Mechanics? This game is definitely for ya! Time moves only when you move, and don''t think it is a piece of cake, as you''ll have to try hard on some levels! I recommend this Game for everyone and while it is on sale, you should grab it, play and enjoy!'),
(33, 7, 47, '2019-01-13', 'An awesome game!'),
(34, 6, 48, '2019-01-13', 'I really like this game.. It''s so frustrating but I guess it''s designed to be :D '),
(35, 8, 48, '2019-01-13', 'Love the level design.'),
(36, 9, 51, '2019-01-13', 'I would definetly suggest this game to anyone whos got nothing to do.'),
(37, 6, 50, '2019-01-13', 'Very entertaining and interesting game..'),
(38, 9, 52, '2019-01-13', 'Cheap, fun game :)'),
(39, 7, 52, '2019-01-13', 'Mirrors edge with guns <3'),
(40, 7, 53, '2019-01-13', 'ParaÅ¡ykit jam pitakÄ…'),
(41, 6, 55, '2019-01-13', 'Interesting game, having fun!'),
(42, 6, 53, '2019-01-13', 'ParaÅ¡ykit jam pitakÄ…'),
(43, 8, 53, '2019-01-13', 'ParaÅ¡ykit jam pitakÄ…'),
(44, 9, 53, '2019-01-13', 'ParaÅ¡ykit jam pitakÄ…'),
(45, 6, 51, '2019-01-13', 'Shit graphics '),
(46, 8, 51, '2019-01-13', 'Play for grandpa! '),
(47, 7, 51, '2019-01-13', 'Man''s not hot!');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE IF NOT EXISTS `games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `short_description` varchar(250) NOT NULL,
  `full_description` text NOT NULL,
  `developer` varchar(255) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `release_date` date NOT NULL,
  `state_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `trailer` varchar(255) DEFAULT NULL,
  `price` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `state_id` (`state_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `title`, `short_description`, `full_description`, `developer`, `publisher`, `release_date`, `state_id`, `user_id`, `trailer`, `price`) VALUES
(9, 'BFF or Die', 'Cozy/crazy couch co-op puzzle game for one to four players', '<b>Congratulations!</b>\r\n\r\nYou and your friends are graduating from the prestigious Intergalactic Time Academy. No time for partying though as your first mission awaits! The Orbees are all missing. Yes, those curious little beings made of energy who power our time-tech are nowhere to be fou... no, wait! We have a faint trace on their signal. Are you brave enough to rescue them?\r\n\r\nPrepare yourself for unknown dangers. If you find some of the Orbees they might equip your Space-Time Machine with new tech. Decide who is in charge of each gadget and combine your abilities to discover the best strategies.\r\n\r\nUse cunning, comradeship and co-operation to survive and never forget the Academy motto: "BFF or Die!"\r\n\r\n<b>Best Friends Forever</b>\r\n\r\nBFF or Die is a game for you if:\r\n\r\n<li>You want a 2-4 player game to play with your partner/family/friends where you get to do everything as a team.</li>\r\n<li>Pure co-operation sounds fun to you as it''s a different feeling when you all work together.</li>\r\n<li>You like games that are easy to start playing but then gradually get more challenging.</li>\r\n<li>You like games that let you figure things out yourself rather than "hand holding" you too much and telling you what to do. </li>\r\n<li>You want a game with a fun, short campaign mode which adds replayability by having difficult trophies to collect and also an unlockable "Infinite" mode.</li>\r\n\r\n<b>Is There Online Multiplayer?</b>\r\n\r\nWe do not have native online multiplayer support ...BUT... you *can* play with your friends online by using Parsec. Parsec (which is free to use) lets you share games with friends by streaming your screen and sound to them. Their inputs (control pad or keyboard commands) then get sent to you and with almost no lag (depending on your computer and internet). This let''s you play real-time online co-op together..!\r\n\r\n<b>What to Expect</b>\r\n\r\nWe strongly recommend playing in co-op 2, 3 or 4 player mode as this is when the game is most fun. Playtime will vary depending on your skill level but as a guide:\r\n\r\n1-Player story game: 2-3 hours\r\n\r\n2-Player story game: 2-3 hours\r\n\r\n3-Player story game: 2-3 hours\r\n\r\n4-Player story game: 2-3 hours \r\n\r\n"The Infinite Trials": 1-999 hours! Or maybe infinity hours :) Complete as many randomised/procedural levels in a row as you can without losing. Go back to the start if you die.\r\n\r\nYou can either share controllers (two people per controller) or have separate controllers. As a minimum you need the keyboard and one control pad to have a 4-player game. Or you can use four separate control pads, it''s up to you.\r\n\r\nThere''s a story mode with 30 levels followed by an unlockable "Infinite Trials" mode with challenging randomised/procedural levels.\r\n\r\n<b>Is Your Computer Fast Enough?</b>\r\nIf you have a dedicated graphics card and your laptop or desktop PC can normally play 3D games then you should be able to run BFF or Die just fine.\r\n\r\nIf you have a high resolution screen (like with newer Macbooks) then you will probably want to set the bootup options of the game to 1920x1080 to get a smooth frame rate unless you also have a super fast graphics card to match your high screen resolution.', 'ASA Studio', 'ASA Studio', '2019-01-06', 1, NULL, 'https://www.youtube.com/embed/Dfr7Ildylhg', '$8.99 USD'),
(6, 'Protocol', 'Protocol - If Portal and Postal had a baby\r\n', '<b>You were chosen to carry out the Protocol program.</b>\r\n\r\nYour objective is to make "first contact" with an alien life form. \r\nAny violation of the Protocol will lead to the elimination of you and the entire operation.\r\nRemember, the fate of the humanity may depend on your actions. \r\nOnce signed, the Protocol must be promptly implemented.\r\nHave a nice day!\r\n\r\n<b>Plot</b>\r\nThe action of Protocol, most likely, takes place in the near future. You are a flippant soldier who signs up for the Protocol program implementation. Packed in a landing box and dropped off somewhere in the Arctic Circle, not far from the Terminus research complex, your main objective is to follow a mysterious AI''s orders, who uses you to make ""first contact"" within the Protocol program framework. Any deviation from AI''s orders is considered to be a violation of Protocol; leading to the elimination of the complex and staff.\r\n\r\n<b>Features</b>\r\nProtocol is a sci-fi comedy with a hint of horror, action and a twisted love story.\r\nUncover an intriguing plot filled with conspiracies, plot twists, countless expletives, dark humour, and some light-hearted mockery.\r\n\r\n<b>Have a Nice Day!</b>\r\nThis is a phrase you will love AND hate because you have violated the Protocol AGAIN. If you think that hardcore is when you can defeat the biggest bosses, then try not to die when taking a snowball.\r\n\r\n<b>Genre ambiguity</b>\r\nWe still can''t decide which genre suits this game. Adventure? Puzzle? Shooter? Immersive sim (seriously?)? Walking simulator? Crazy trip? Or, maybe... All in one?\r\n\r\n<b>PC or VR?</b>\r\nBoth! You can play on PC using a keyboard and a mouse, or in VR using a headset.', 'Fair Games Studio', 'Fair Games Studio', '2019-01-08', 1, NULL, 'https://www.youtube.com/embed/T5Yez0L49GY', '$17.99 USD'),
(7, 'Superhot', 'The first person shooter where time moves only when you move.', '<b>"A hallmark of excellence."</b>\r\n- Destructoid, 9/10\r\n\r\n<b>"The most innovative shooter I''ve played in years." </b>\r\n- Jimquisition 9.5/10\r\n\r\n<b>"Unlike anything else I''ve played." </b>\r\n- Polygon 9/10\r\n\r\n<b>"May very well belong in the same set as System Shock and Half-Life." </b>\r\n- The Daily Dot 5/5\r\n\r\n<b>"SUPERHOT IS THE MOST INNOVATIVE SHOOTER I''VE PLAYED IN YEARS!" </b>\r\n- Washington Post\r\n\r\nBlurring the lines between cautious strategy and unbridled mayhem, SUPERHOT is the FPS in which time moves only when you move. No regenerating health bars. No conveniently placed ammo drops. It''s just you, outnumbered and outgunned, grabbing weapons off fallen enemies to shoot, slice, and maneuver through a hurricane of slow-motion bullets.\r\n\r\nWith its unique, stylized graphics SUPERHOT finally adds something new and disruptive to the FPS genre. SUPERHOT''s polished, minimalist visual language helps you focus on what''s most important - the fluidity of gameplay and cinematic beauty of the fight.\r\n\r\n<b>SUPERHOT features:</b>\r\n\r\n<li>Endless Mode - how long can you last against unyielding waves of enemies?</li>\r\n<li>Challenge Mode - take on SUPERHOT with your bare hands, no restarts, timed runs, and more.</li>\r\n<li>Replay Editor - edit and upload your best runs for all to see on <a href="https://superhot.video/">superhot.video</a>.</li>\r\n <li>Extras - delve further into SUPERHOT with mini-games, ASCII art, and [redacted].</li>\r\nThirty months in the making. Thousands of hours put into development and design. From its humble origins in the 7 Day FPS game jam, through a hugely successful Kickstarter campaign to a plethora of awards and nominations from industry experts, SUPERHOT is a labor of love by its independent, dedicated team and thousands of backers from all around the globe.', 'SUPERHOT Team', 'SUPERHOT Team', '2016-02-24', 1, NULL, 'https://www.youtube.com/embed/R4LkToI4xzE', '$24.99 USD'),
(8, 'Moon Hunters', '1-4 player personality test RPG', '<b>Show Your Personality</b>\r\n\r\nMoon Hunters is a 1 to 4 player co-operative action personality test RPG in a rich, ancient world that''s different every time you play. Build your mythology as every action and choice contributes to how you''re remembered, as a constellation in the night sky.\r\n\r\n<b>A Hero''s Journey</b>\r\n\r\nPlay out 5 days from different angles to uncover new sides to characters, conflicts, and narratives. Try out all 4 player hometowns and 6 player character classes, each with their own abilities and randomly available upgrades.\r\n\r\n<b>Earn Your Reputation</b>\r\n\r\nOn your search for the missing Moon goddess, you will travel the world with your fellow Hunters and become a living legend for your deeds. How will you be remembered by your tribe in generations to come?\r\n\r\n\r\n<b>Awards:</b>\r\n\r\n<li>Indie MegaBooth - PAX Prime 2015 and PAX East 2016 Showcase</li>\r\n<li>Indie Prize Europe 2016 Winner: Most Promising Game in Development</li>\r\n<li>Indie Prize Europe 2016 Finalist: Critic''s Choice Best in Show, Best Multiplayer</li>\r\n<li>Montreal International Game Festival - Narrative Design Award</li>\r\n<li>Curse PAX East 2015 - Best Co-Op Experience</li>', 'Kitfox Games', 'Kitfox Games', '2016-03-10', 1, NULL, 'https://www.youtube.com/embed/UdGOvzXa4N8', '$11.33 USD');

-- --------------------------------------------------------

--
-- Table structure for table `games_genres`
--

CREATE TABLE IF NOT EXISTS `games_genres` (
  `game_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  KEY `game_id` (`game_id`),
  KEY `genre_id` (`genre_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `games_genres`
--

INSERT INTO `games_genres` (`game_id`, `genre_id`) VALUES
(6, 1),
(6, 5),
(7, 6),
(7, 1),
(8, 7),
(9, 8);

-- --------------------------------------------------------

--
-- Table structure for table `games_links`
--

CREATE TABLE IF NOT EXISTS `games_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game_id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `link_text` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `games_links`
--

INSERT INTO `games_links` (`id`, `game_id`, `link`, `link_text`) VALUES
(3, 6, 'https://store.steampowered.com/app/724490/Protocol/', 'Protocol on Steam'),
(4, 0, 'http://fairgames.studio/protocol/', 'Visit the website'),
(5, 6, 'http://fairgames.studio/protocol/', 'Visite the website.'),
(6, 7, 'https://store.steampowered.com/app/322500/SUPERHOT/', 'Steam'),
(7, 7, 'https://superhotgame.com/', 'Homepage'),
(8, 7, 'https://discordapp.com/invite/NJKgwvx', 'Discord'),
(9, 7, 'https://twitter.com/SUPERHOTTHEGAME', 'Twitter'),
(10, 7, 'https://www.twitch.tv/superhotteam/', 'Twitch'),
(11, 8, 'http://www.moonhuntersgame.com/', 'Homepage'),
(12, 8, 'https://twitter.com/kitfoxgames', 'Twitter'),
(13, 8, 'http://steamcommunity.com/app/320040/discussions/', 'Support'),
(14, 9, 'https://store.steampowered.com/app/652360/BFF_or_Die/', 'Steam,'),
(15, 9, 'Homepage', 'http://www.bffordie.com/');

-- --------------------------------------------------------

--
-- Table structure for table `games_os`
--

CREATE TABLE IF NOT EXISTS `games_os` (
  `game_id` int(11) NOT NULL,
  `os_id` int(11) NOT NULL,
  KEY `game_id` (`game_id`),
  KEY `os_id` (`os_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `games_os`
--

INSERT INTO `games_os` (`game_id`, `os_id`) VALUES
(6, 1),
(7, 1),
(8, 1),
(8, 2),
(8, 3),
(8, 4),
(9, 1),
(9, 2),
(9, 3);

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE IF NOT EXISTS `genres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`) VALUES
(1, 'Action'),
(2, 'Horror'),
(3, 'Fantasy'),
(4, 'Racing'),
(5, 'Adventure'),
(6, 'Shooter'),
(7, 'Role Playing'),
(8, 'Puzzle');

-- --------------------------------------------------------

--
-- Table structure for table `os`
--

CREATE TABLE IF NOT EXISTS `os` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `img_dir` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `os`
--

INSERT INTO `os` (`id`, `name`, `img_dir`) VALUES
(1, 'windows', 'os_img/windows.png'),
(2, 'linux', 'os_img/linux.png'),
(3, 'mac', 'os_img/apple.png'),
(4, 'android', 'os_img/android.png');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE IF NOT EXISTS `password_reset` (
  `email` varchar(25) NOT NULL,
  `token` varchar(255) NOT NULL,
  `selector` varchar(225) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `token` (`token`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `password_reset`
--

INSERT INTO `password_reset` (`email`, `token`, `selector`, `id`) VALUES
('daliusbutrimass@gmail.com', '$2y$10$N6HW8SXjjbh0lm1eBohFvujkZ8ZkTL9Lyj318bEyJlKp3WHaiHI4u', 'ea86ce97333535d4', 25);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE IF NOT EXISTS `ratings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rating` int(1) NOT NULL,
  `game_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `game_id` (`game_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=87 ;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `rating`, `game_id`, `user_id`) VALUES
(80, 1, 7, 47),
(79, 1, 6, 47),
(78, 1, 7, 46),
(77, 1, 6, 46),
(81, 1, 8, 47),
(82, 1, 6, 48),
(83, 1, 8, 48),
(84, 1, 8, 50),
(85, 1, 6, 50),
(86, 1, 7, 50);

-- --------------------------------------------------------

--
-- Table structure for table `screenshots`
--

CREATE TABLE IF NOT EXISTS `screenshots` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `sc_img_dir` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `game_id` (`game_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `screenshots`
--

INSERT INTO `screenshots` (`id`, `game_id`, `name`, `sc_img_dir`) VALUES
(3, 6, 'protocol', 'screenshots_img/kKh9Ad.jpg'),
(4, 6, 'protocol', 'screenshots_img/ui4uNh.jpg'),
(5, 6, 'protocol', 'screenshots_img/zGr3lN.jpg'),
(6, 6, 'protocol', 'screenshots_img/nLhbrK.jpg'),
(7, 7, 'superhot', 'screenshots_img/shot.jpg'),
(8, 7, 'superhot', 'screenshots_img/shot1.jpg'),
(9, 7, 'superhot', 'screenshots_img/shot2.jpg'),
(10, 8, 'moonhunters', 'screenshots_img/moonhunters1.png'),
(11, 8, 'moonhunters', 'screenshots_img/moonhunters2.png'),
(12, 8, 'moonhunters', 'screenshots_img/moonhunters3.png'),
(13, 8, 'moonhunters', 'screenshots_img/moonhunters4.png'),
(14, 9, 'bffordie', 'screenshots_img/bff1.png'),
(15, 9, 'bffordie', 'screenshots_img/bff2.png'),
(16, 9, 'bffordie', 'screenshots_img/bff3.png'),
(17, 9, 'bffordie', 'screenshots_img/bff4.png');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`) VALUES
(1, 'approved'),
(2, 'disapproved'),
(3, 'waiting');

-- --------------------------------------------------------

--
-- Table structure for table `system_requirements`
--

CREATE TABLE IF NOT EXISTS `system_requirements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cpu` varchar(100) NOT NULL,
  `ram` int(11) NOT NULL,
  `gpu` varchar(200) NOT NULL,
  `dx` int(11) NOT NULL,
  `storage` int(11) NOT NULL,
  `type` int(1) NOT NULL COMMENT '0-min 1-req',
  `game_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `game_id` (`game_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `thumbnails`
--

CREATE TABLE IF NOT EXISTS `thumbnails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `tn_img_dir` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `game_id` (`game_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `thumbnails`
--

INSERT INTO `thumbnails` (`id`, `game_id`, `name`, `tn_img_dir`) VALUES
(5, 6, 'Protocol', 'thumbnails_img/HNiQ6E.png'),
(6, 7, 'superhot', 'thumbnails_img/superhot.png\r\n'),
(7, 8, 'moonhunters', 'thumbnails_img/moonhunters.png'),
(8, 9, 'bffordie', 'thumbnails_img/bffordie.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`) VALUES
(57, 'aszzzzd@gmail.com', '$2y$10$rTrlmdMi92IkMiAhG4dXEu7Q1krTSnqjVPwuyDjGjmYftKtNCJGu6', 0),
(55, 'justas.jasnauskas@gmail.com', '$2y$10$YQcH57s37M9SLHmiXVCAGOuZCY0wv5VXGxeQHM8D7UKFv7bNOzXsq', 0),
(54, 'bandau123@gmail.com', '$2y$10$4lA3TK3a5M9C2fJMLRqCxeHVPrCb/eCcq2Zj/GYdQqA/oEwUxNsi.', 0),
(53, 'testuoju@gmail.com', '$2y$10$M/b1RYh4weaFFIieBsAI6OTFHKweMJZZPcn0/ddrpspss4X2IhNvK', 0),
(52, 'ebanelis55@gmail.com', '$2y$10$mhGLUNPkEBRBhnRRhKIo8.MHV4o8FvPr6en8n3w/bwe15lu4Gnb2G', 0),
(51, 'ruslanas252525@gmail.com', '$2y$10$HnW1y05paPWyzlNd9DnBNOcvCH6Kq4pqT2C6GsqmNoGR5ACrpC8Ce', 0),
(50, 'karinabutrimaite2003@gmail.com', '$2y$10$SiCMik/C51HLnqUN/gvEWecpH3oUBHHWENvTHhOchjrmHeVJOKoOG', 0),
(49, 'asdaaa@gmail.com', '$2y$10$UwWRQww7xleTIxtFXXH0/OHNxL14ttKpN5D02aIfqlrpLA1FNGohq', 0),
(48, 'HoneyThief@gmail.com', '$2y$10$KoaLxJz8/R4wTpnCchG4g.HemcdXc7TQT0m3v8YznDHyFMux7tuSu', 0),
(47, 'test@gmail.com', '$2y$10$9Yc6ZZmYeex36nlKuCT7N.sf4eDiH7h3jCaeJ4jP9UD0gg.RXyh1W', 0),
(46, 'daliusbutrimass@gmail.com', '$2y$10$hwy7HwPFSVBqqSVIFD2VmOamuiWyHkQDK0K74PDs4ug3gludbwQ/m', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
