-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 13 nov. 2020 à 21:05
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mglsi_news`
--

-- --------------------------------------------------------

--
-- Structure de la table `Article`
--

CREATE TABLE `Article` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `contenu` text DEFAULT NULL,
  `dateCreation` datetime DEFAULT current_timestamp(),
  `dateModification` datetime DEFAULT current_timestamp(),
  `categorie` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Article`
--

INSERT INTO `Article` (`id`, `titre`, `contenu`, `dateCreation`, `dateModification`, `categorie`) VALUES
(1, 'Euro 2020: Everything you need to know about next summer\'s tournament\r\n', 'The Euro 2020 line-up is finally complete.\r\n\r\nSome eight months later than expected - because of the coronavirus pandemic - the final four places for next summer\'s tournament have been decided.\r\n\r\nScotland have joined England and Wales in qualifying, thanks to a dramatic penalty shootout win against Serbia in their qualifying play-off final on Thursday.\r\n\r\nThe tournament, originally scheduled to take place from 12 June to 12 July this summer, will now run from 11 June to 11 July 2021.It will consist of 24 teams and 51 matches in 12 host cities across Europe, although it remains unknown whether fans will be allowed at the tournament, because of ongoing global heath crisis.', '2020-07-04 09:18:21', '2020-07-05 09:18:21', 1),
(2, 'US election: China congratulates Biden after long silence', 'China has finally congratulated Joe Biden on his projected win in the US presidential election, breaking a frosty period of silence.\r\n\r\n\"We respect the choice of the American people. We extend congratulations to Mr Biden and Ms Harris,\" a foreign ministry spokesman said on Friday.\r\n\r\nThe China-US relationship is crucial to both sides, and the wider world. Tensions have soared in recent times, over trade, espionage and the pandemic.\r\n\r\nRussia is yet to offer well wishes.\r\n\r\nFour years ago, the Russian leader Vladimir Putin was among the first to congratulate Donald Trump on his election victory, but there has been no tweet, telegram or phone call to Mr Biden this time. What does China\'s message tell us?\r\n\r\nTo put it bluntly, it shows China\'s leaders - and specifically Xi Jinping, the country\'s powerful president - have accepted the result and expect Joe Biden to be inaugurated as president in January despite legal challenges from the Trump campaign.\r\n\r\nUntil this point, the Chinese government had been holding out, saying only that it had \"noticed that Mr Biden had been declared winner\".\r\n\r\nAfter offering the congratulations on Thursday, foreign ministry spokesman Wang Wenbin added: \"We understand the results of the US election will be determined according to US laws and procedures.\"\r\n\r\nThe relationship between China and the US - the world\'s two biggest economies - is hugely consequential. A trade war initiated by President Trump has damaged relations, as has his insistence on often calling Covid-19, the \"China virus\" or \"Wuhan flu\".\r\n\r\nThe two countries have also sparred over espionage, China\'s military build-up in the South China Sea and the mass detention of Muslims in western China.\r\n\r\nWho China preferred to see in the White House was a matter for debate before the election. The US intelligence community believed Xi Jinping and the Communist Party leaned towards Mr Biden.\r\n\r\nBut Professor Yan Xuetong, at Beijing\'s Tsinghua University, said China would rather have seen four more years of Donald Trump.\r\n\r\n\"Not because Trump will do less damage to China\'s interests than Biden, but because he definitely will damage the US more than Biden,\" he told the BBC before the election.\r\n\r\n', '2019-07-04 09:18:21', '2019-07-04 09:18:21', 4),
(3, 'Joe Gomez: Liverpool defender out for \'significant part\' of season after surgery', 'Gomez was injured on Wednesday while training with England before Thursday\'s friendly with the Republic of Ireland.\r\n\r\nThe 23-year-old\'s club said he had undergone \"successful\" surgery to repair a tendon in his left knee.\r\n\r\nThe Reds are already without fellow centre-back Virgil van Dijk because of a long-term knee ligament injury.\r\n\r\n\"The issue was isolated to Gomez\'s tendon, with no damage to any other associated knee ligaments,\" Liverpool said.\r\n\r\n\"No timescale is being placed upon his return, though the issue is likely to rule him out for a significant part of the remainder of 2020-21.\"\r\n\r\nGomez has played in all but one of Liverpool\'s Premier League and Champions League games this season.\r\n\r\nThe injury is not the same as the cruciate ligament injury he suffered in 2015.\r\n\r\nEngland manager Gareth Southgate said the injury was \"probably a consequence of the number of games that have been played\".\r\n\r\n\"We are always for player welfare and to lose a player in the way that we did yesterday, it was really tragic for the boy,\" he told ITV.\r\n\r\n\"There needs to be a look at the calendar.\"\r\n\r\nVan Dijk has had surgery on the knee ligament injury he picked up against Everton in a 2-2 draw on 17 October.\r\n\r\nThe Premier League champions have also been without Fabinho, who had been deputising in defence for Van Dijk, because of a hamstring injury.\r\n\r\nAdditionally, Liverpool have an injury concern over right-back Trent Alexander-Arnold, who was taken off during the 1-1 draw at Manchester City on Sunday and withdrawn from England duty.\r\nAround the BBC iPlayer banner', '2019-07-04 09:18:21', '2019-07-04 09:18:21', 1),
(4, 'Ghana\'s Ex-President JJ Rawlings dies', '\r\n\r\nGhana’s former President Jerry John Rawlings has died in Accra Thursday morning, local media reports.\r\n\r\nHe is said to have passed on at the nation’s premier hospital, the Korle Bu Teaching Hospital.\r\n\r\nJerry Rawlings had been on admission at the hospital for about a week for an undisclosed ailment.\r\n\r\nLocal online news portal, Graphic Online reports that Mr. Rawlings felt sick after his mother\'s burial about three weeks ago.\r\n\r\nAs a former Ghanaian military leader and subsequent politician, Rawlings led a military junta from 1981 until 1992.\r\n\r\nHe then served two terms as the democratically elected President of Ghana from January 1993 to January 2001.\r\n\r\nThe late former president initially came to power as a flight lieutenant of the Ghana Air Force following a coup in 1979.\r\n\r\nBefore this, he led an unsuccessful coup attempt against the ruling military government in 1979, just five weeks before scheduled democratic elections were due to take place.\r\n\r\nAfter initially handing power over to a civilian government, he took back control of the country on December 31, 1981 as the Chairman of the Provisional National Defense Council (PNDC).\r\n\r\nIn 1992, Rawlings resigned from the military, founded the National Democratic Congress (NDC), and became the first President of the 4th Republic.\r\n\r\nHe was re-elected in 1996 for four more years. Rawlings was 73.\r\n', '2019-07-04 09:18:21', '2019-07-04 09:18:21', 4),
(5, 'Late resumption of schools in Senegal amid COVID safety concerns', 'After months of closure, schools have reopened Thursday in Senegal.\r\n\r\nUnicef had deplored in early October that only one country in three from West and Central Africa has managed to reopen its schools for the start of the school year 2020-2021 on schedule.\r\n\r\nMost of the students sitting Thursday in groups under the courtyard of an elementary school in Mbao, a suburb of Dakar, were not wearing masks. On the contrary, in a high school in Yoff, a working class neighborhood of the capital, most were wearing masks.\r\n\r\nBut these same students passed through the doors of the school without any provision to keep them at a distance from each other.\r\n\r\nFour million students, from primary to secondary school, were expected to return to classes, but a number of them delayed their return, a common practice even outside of a pandemic.\r\n\r\nSchools were closed in March after the first case of Covid-19 in the country. Only 500,000 students in examination classes had returned to school by June.\r\n\r\nSince then, the pandemic appears to have been contained at low levels. Senegal reported 15,744 cases and 326 deaths.\r\n\r\nEconomic activity, which has been severely affected, is slowly resuming its course. But there is also a slackening of daily vigilance.\r\n\r\n\"We have defined a health protocol with the Ministry of Health for the compulsory wearing of masks - except in preschool - hand washing, physical distancing,\" Ministry of Education spokesman Mohamed Moustapha Diagne said', '2019-07-04 09:18:21', '2019-07-04 09:18:21', 3),
(6, 'Russian Covid vaccine shows encouraging results', 'Early results from trials of a Covid vaccine developed in Russia suggest it could be 92% effective.\r\n\r\nThe data is based on 20 cases of Covid-19 from 16,000 volunteers given the Sputnik V vaccine or a dummy injection.\r\n\r\nWhile some scientists welcomed the news, others said the data had been rushed out too early.\r\n\r\nIt comes after Pfizer and BioNTech said their vaccine could prevent 90% of people getting Covid-19, based on a study of 43,500 people.\r\n\r\nAlthough the Sputnik data is based on fewer people being vaccinated and fewer cases of Covid developing during the trial, it does confirm promising results from earlier research.\r\n\r\nThe Sputnik V vaccine, developed at the National Research Centre for Epidemiology and Microbiology in Moscow, is currently going through phase III clinical trials in Belarus, UAE, Venezuela and India.\r\n\r\nSo far there are no safety issues, with Russian researchers saying there were \"no unexpected adverse events\" 21 days after volunteers received their first of two injections.', '2020-11-13 11:05:57', '2020-11-13 11:05:57', 2);

-- --------------------------------------------------------

--
-- Structure de la table `Categorie`
--

CREATE TABLE `Categorie` (
  `id` int(11) NOT NULL,
  `libelle` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Categorie`
--

INSERT INTO `Categorie` (`id`, `libelle`) VALUES
(1, 'Sport'),
(2, 'Sante'),
(3, 'Education'),
(4, 'Politique');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` bigint(11) NOT NULL,
  `nom` varchar(155) DEFAULT NULL,
  `prenom` varchar(155) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `deleted` int(2) DEFAULT NULL,
  `statut` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `username`, `mdp`, `deleted`, `statut`) VALUES
(1, 'Mariama', 'BA', 'admin', 'admin', 0, 1),
(2, 'sow', 'alpha', 'alpha', 'passer', 0, 2),
(3, 'Mbaye', 'Khady', 'khady', 'passer', 0, 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Article`
--
ALTER TABLE `Article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categorie_article` (`categorie`);

--
-- Index pour la table `Categorie`
--
ALTER TABLE `Categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Article`
--
ALTER TABLE `Article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `Categorie`
--
ALTER TABLE `Categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Article`
--
ALTER TABLE `Article`
  ADD CONSTRAINT `fk_categorie_article` FOREIGN KEY (`categorie`) REFERENCES `Categorie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
