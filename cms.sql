-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2017 at 09:28 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(8, 'Rome'),
(9, 'Sparta'),
(10, 'Aztec');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) CHARACTER SET latin1 NOT NULL,
  `comment_email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `comment_content` text CHARACTER SET latin1 NOT NULL,
  `comment_status` varchar(255) CHARACTER SET latin1 NOT NULL,
  `comment_date` date NOT NULL,
  `comment_user_name` varchar(255) COLLATE utf8mb4_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`, `comment_user_name`) VALUES
(18, 5, 'admin admin', 'admin@gmail.com', 'Primjer komentara', 'approved', '2017-09-06', 'admin'),
(19, 5, 'admin admin', 'admin@gmail.com', 'Drugi primjer komentara', 'unapproved', '2017-09-06', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tag` varchar(255) NOT NULL,
  `post_comment_count` int(10) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft',
  `post_views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tag`, `post_comment_count`, `post_status`, `post_views`) VALUES
(5, 8, 'The First Samnite War', 'John Smith', '2017-09-06', 'rome.jpg', '<p>In the 340s BC, while Philip II of Macedonia (father of Alexander the Great) was occupied with the Persians to the east, war in Italy broke out on the plains of Campania, near the Greek colony of Neapolis (Naples). Philip and the Macedonian armies were occupied with Persians to the east and various other regional conflicts, while Lucanian and Bruttian tribes were harassing the Greek colonies farther to the east on the Adriatic coast. These colonies called to Epirus for help, while Neapolis, in a more isolated position, had no choice but to call on Rome for assistance. The most powerful group of the highland Sabellian people, the Samnites, in the middle of the fourth century, were invading into Campania and taking territory easily. The warlike Samnites far outmatched their civilized neighbors and found the fertile lands a much better place for herding than the rough hills of the Appenines. According to unreliable accounts, Roman envoys, at the behest of Neapolis, went to the Samnites to discuss mutual terms of peace in the region. Their intervention was supposedly rudely rebuffed, and war would be the result. The resulting First Samnite War, was a brief but consequential affair. While historical accounts, including one by Livy, are rife with un-trustworthy depictions, it is safe to assume that the war was marked by Roman victories in the field. Despite the successes, trouble again with her Latin neighbors would force Rome to make peace with 2 years of the onset of war. Angry over conscription into a Roman war outside of their own territory, the Latins revolted once again. Increasingly dependent on Rome, the Latin League saw the Samnite pre-occupation as a perfect opportunity to withdraw from Romes dominance. In response, the Romans had no choice, but to break off their southern conquests and deal with their neighbors once again. Despite its brevity, and lack of true historical references, the First Samnite War was a resounding success for Rome. It resulted in the major acquisition of the rich lands of Campania with its capital of Capua. The Campanians, civilized and peaceful were probably no match for the aggressive Samnites and an alliance with the powerful young Roman Republic seems a natural occurrence. It illustrates the model of Roman diplomacy in which an alliance results in the absorption of the ally into Romes dominion. Whether through political and diplomatic necessity or through military intimidation there is no dispute that Campania became firmly attached to Rome at the end of the First Samnite War. The addition of Campania not only added considerable wealth and territory to the growing power of Rome, but boosted her already sufficient manpower recruiting base for future legionary campaigns.</p>', 'Rome, Samnites, War', 2, 'active', 80),
(6, 10, 'Flower War', 'Nikola Stipic', '2017-09-06', 'aztec.jpg', '<p>Texcocan nobleman Ixtlilxochitl gives the fullest early statement concerning the origin as well as the initial rationale of the flower war. From 1450 to 1454, the Aztecs had suffered from crop failure and severe drought: this led to famine and many deaths in the central Mexican highlands. Ixtlilxochitl reports that the flower war began as a response to the famine: the priests . . . of Mexico (Tenochtitlan) said that the gods were angry at the empire, and that to placate them it was necessary to sacrifice many men, and that this had to be done regularly. Thus, Tenochtitlan (the Aztec capital), Texcoco, Tlaxcala, Cholula, and Huejotzingo agreed to engage in flower war for the purpose of obtaining human sacrifices for the gods. However, scholars such as Hicks disagree with using Ixlilxochitls writings as the origin story of the flower war, due to Ixtlilxochitl not specifically mentioning flower war and being the only known source to record these events.</p>', 'Aztec, War, Spain, Conquest', 0, 'active', 3),
(7, 9, 'The Peloponnesian War', 'Nikola Stipic', '2017-09-06', 'sparta.jpg', '<p>The Peloponnesian Wars fought between Athens and Sparta and their respective allies came in two stages, the first from c. 460 to 446 BCE and the second and more significant war from 431 to 404 BCE. With battles occurring at home and abroad, the long and complex conflict was damaging to both sides but Sparta, with financial help from Persia, finally won the conflict by destroying the Athenian fleet at Aegospotami in 405 BCE. The tough military training in Sparta, which started from the age of seven and was known as the agÅgÄ“, resulted in a professional hoplite army capable of great discipline and relatively sophisticated battle manoeuvres which made them feared throughout Greece, a fact perhaps evidenced by Spartas notable lack of fortifications for most of its history. The regional instability in Greece in the late 6th century BCE brought about the Peloponnesian League (c. 505 to 365 BCE) which was a grouping of Corinth, Elis, Tegea and other states (but never Argos) where each member swore to have the same enemies and allies as Sparta. Membership of the League did not necessitate the paying of tribute to Sparta but rather the provision of troops under Spartan command. The League would allow Sparta to establish hegemony over and dominate the Peloponnese until the 4th century BCE.</p>', 'Sparta, Athens, War, Peloponnes', 0, 'active', 1),
(9, 9, 'Helot Revolt 465 B.C.', 'Nikola Stipic', '2017-09-06', 'helot.jpg', '<p>The pressure to reform the judicial system reached the boiling point when a crisis in foreign affairs heated up Athenian politics. The crisis began in 465 B.C. with a tremendous earthquake in Laconia, the territory of the Spartans in the Peloponnese. It killed so many Spartans that the helots in Messenia instigated a massive revolt. Messenia was the large region of the Peloponnesus bordering Spartan territory on the west, which the Spartans had conquered in the eighth and seventh centuries and whose formerly free inhabitants they had enslaved as helots to farm the land for the benefit of the Spartans. By 462 B.C. the revolt had become so serious that the Spartans, swallowing their considerable pride, appealed to Athens for military help, despite the chill that had fallen over relations between Athens and Sparta since the days of their cooperation against the Persians. The tension between the former allies was caused by rebellious members of the Delian League like the Thasians, who had received at least moral support from the leaders at Sparta. Spartan leaders apparently felt that Athens, as the head of the Delian League, was growing powerful enough someday to threaten Spartan interests in the Peloponnese. Cimon, the hero of the Delian Leagues campaigns, marshalled all his prestige to persuade a reluctant Athenian assembly to send hoplites to help the Spartans in 462 B.C. Cimon, like many Athenian aristocrats, had always admired the Spartans, and he was renowned for registering his opposition to proposals in the assembly by saying, But that is not what the Spartans would do. His Spartan friends let him down, however, by soon changing their minds and sending him and his army home. The Spartans feared that the democratically inclined Athenian soldiers might decide to help the helots (who were fellow Greeks) escape from Spartan domination.</p>', 'Sparta, Helot, War, Revolt, 465 B.C.', 0, 'active', 4),
(20, 8, 'draft', 'Nikola Stipic', '2017-09-06', 'lighthouse.jpg', '<p>draft</p>', 'draft', 0, 'draft', 0),
(21, 8, 'Lighthouse', 'admin admin', '2017-09-06', 'lighthouse.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent blandit vestibulum lacinia. Donec molestie justo sit amet nunc placerat, ac placerat risus ullamcorper. Phasellus imperdiet eros magna, sed maximus est tempor et. Vestibulum tortor felis, efficitur sit amet justo a, ullamcorper suscipit turpis. Proin quis commodo velit. Donec ac dictum eros. Donec sed justo ac odio elementum venenatis. Mauris sit amet accumsan justo. Mauris efficitur dolor ut accumsan facilisis. Proin gravida dapibus felis, eget consequat ante cursus et. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nam dictum, metus in porttitor condimentum, mi neque finibus ligula, et lacinia diam massa interdum lorem.', 'lighthouse', 0, 'active', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_fname` varchar(255) NOT NULL,
  `user_lname` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_fname`, `user_lname`, `user_role`, `user_email`, `user_image`) VALUES
(27, 'admin', '$2y$10$6XHJi7oU0XJ8Z78fqQqV1Oi72M1WdvbuG4nP0AzEUISCPdkOtyPja', 'admin', 'admin', 'admin', 'admin@gmail.com', ''),
(28, 'user', '$2y$10$4hqINyxPsqN.nwrFdkLzx.kmI2UI4SFh9vCU65kXEuvYEDl8lHD6.', 'user', 'user', 'subscriber', 'user@gmail.com', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
