-- phpMyAdmin SQL Dump
-- version 4.0.10.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2016 at 01:17 PM
-- Server version: 5.1.69-community-log
-- PHP Version: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


-- Table structure for table `pool`
--

CREATE TABLE IF NOT EXISTS `pool` (
  `ID` int(120) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `sport` varchar(10) NOT NULL,
  `logo` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=123 ;

--
-- Dumping data for table `pool`
--

INSERT INTO `pool` (`ID`, `name`, `sport`, `logo`) VALUES
(1, 'Philadelphia 76ers', 'NBA', 'images/nba/76ers.jpg'),
(2, 'Portland Trail Blazers', 'NBA', 'images/nba/blazers.jpg'),
(3, 'Milwaukee Bucks', 'NBA', 'images/nba/bucks.jpg'),
(4, 'Chicago Bulls', 'NBA', 'images/nba/bulls.jpg'),
(5, 'Cleveland Cavaliers', 'NBA', 'images/nba/cavaliers.jpg'),
(6, 'Boston Celtics', 'NBA', 'images/nba/celtics.jpg'),
(7, 'Los Angeles Clippers', 'NBA', 'images/nba/clippers.jpg'),
(8, 'Memphis Grizzlies', 'NBA', 'images/nba/grizzlies.jpg'),
(9, 'Atlanta Hawks', 'NBA', 'images/nba/hawks.jpg'),
(10, 'Miami Heat', 'NBA', 'images/nba/heat.jpg'),
(11, 'Charlotte Hornets', 'NBA', 'images/nba/hornets.jpg'),
(12, 'Utah Jazz', 'NBA', 'images/nba/jazz.jpg'),
(13, 'Sacramento Kings', 'NBA', 'images/nba/kings.jpg'),
(14, 'New York Knicks', 'NBA', 'images/nba/knicks.jpg'),
(15, 'Los Angeles Lakers', 'NBA', 'images/nba/lakers.jpg'),
(16, 'Orlando Magic', 'NBA', 'images/nba/magic.jpg'),
(17, 'Dallas Mavericks', 'NBA', 'images/nba/mavericks.jpg'),
(18, 'Brooklyn Nets', 'NBA', 'images/nba/nets.jpg'),
(19, 'Denver Nuggets', 'NBA', 'images/nba/nuggets.jpg'),
(20, 'Indiana Pacers', 'NBA', 'images/nba/pacers.jpg'),
(21, 'New Orleans Pelicans', 'NBA', 'images/nba/pelicans.jpg'),
(22, 'Detroit Pistons', 'NBA', 'images/nba/pistons.jpg'),
(23, 'Toronto Raptors', 'NBA', 'images/nba/raptors.jpg'),
(24, 'Houston Rockets', 'NBA', 'images/nba/rockets.jpg'),
(25, 'San Antonio Spurs', 'NBA', 'images/nba/spurs.jpg'),
(26, 'Phoenix Suns', 'NBA', 'images/nba/suns.jpg'),
(27, 'Oklahoma City Thunder', 'NBA', 'images/nba/thunder.jpg'),
(28, 'Minnesota Timberwolves', 'NBA', 'images/nba/timberwolves.jpg'),
(29, 'Golden State Warriors', 'NBA', 'images/nba/warriors.jpg'),
(30, 'Washington Wizards', 'NBA', 'images/nba/wizards.jpg'),
(31, 'San Fransisco 49ers', 'NFL', 'images/nfl/49ers.jpg'),
(32, 'Chicago Bears', 'NFL', 'images/nfl/bears.jpg'),
(33, 'Cincinnati Bengals', 'NFL', 'images/nfl/bengals.jpg'),
(34, 'Buffalo Bills', 'NFL', 'images/nfl/bills.jpg'),
(35, 'Denver Broncos', 'NFL', 'images/nfl/broncos.jpg'),
(36, 'Cleveland Browns', 'NFL', 'images/nfl/browns.jpg'),
(37, 'Tampa Bay Buccaneers', 'NFL', 'images/nfl/buccaneers.jpg'),
(38, 'Arizona Cardinals', 'NFL', 'images/nfl/cardinals.jpg'),
(39, 'San Diego Chargers', 'NFL', 'images/nfl/chargers.jpg'),
(40, 'Kansas City Chiefs', 'NFL', 'images/nfl/chiefs.jpg'),
(41, 'Indianapolis Colts', 'NFL', 'images/nfl/colts.jpg'),
(42, 'Dallas Cowboys', 'NFL', 'images/nfl/cowboys.jpg'),
(43, 'Miami Dolphins', 'NFL', 'images/nfl/dolphins.jpg'),
(44, 'Philadelphia Eagles', 'NFL', 'images/nfl/eagles.jpg'),
(45, 'Atlanta Falcons', 'NFL', 'images/nfl/falcons.jpg'),
(46, 'New York Giants', 'NFL', 'images/nfl/giants.jpg'),
(47, 'Jacksonville Jaguars', 'NFL', 'images/nfl/jaguars.jpg'),
(48, 'New York Jets', 'NFL', 'images/nfl/jets.jpg'),
(49, 'Detroit Lions', 'NFL', 'images/nfl/lions.jpg'),
(50, 'Green Bay Packers', 'NFL', 'images/nfl/packers.jpg'),
(51, 'Carolina Panthers', 'NFL', 'images/nfl/panthers.jpg'),
(52, 'New England Patriots', 'NFL', 'images/nfl/patriots.jpg'),
(53, 'Oakland Raiders', 'NFL', 'images/nfl/raiders.jpg'),
(54, 'St. Louis Rams', 'NFL', 'images/nfl/rams.jpg'),
(55, 'Baltimore Ravens', 'NFL', 'images/nfl/ravens.jpg'),
(56, 'Washington Redskins', 'NFL', 'images/nfl/redskins.jpg'),
(57, 'New Orleans Saints', 'NFL', 'images/nfl/saints.jpg'),
(58, 'Seattle Seahawks', 'NFL', 'images/nfl/seahawks.jpg'),
(59, 'Pittsburgh Steelers', 'NFL', 'images/nfl/steelers.jpg'),
(60, 'Houston Texans', 'NFL', 'images/nfl/texans.jpg'),
(61, 'Tennessee Titans', 'NFL', 'images/nfl/titans.jpg'),
(62, 'Minnesota Vikings', 'NFL', 'images/nfl/vikings.jpg'),
(63, 'Anaheim Angels', 'MLB', 'images/mlb/angels.jpg'),
(64, 'Houston Astros', 'MLB', 'images/mlb/astros.jpg'),
(65, 'Oakland Athletics', 'MLB', 'images/mlb/athletics.jpg'),
(66, 'Toronto Blue-Jays', 'MLB', 'images/mlb/blue-jays.jpg'),
(67, 'Atlanta Braves', 'MLB', 'images/mlb/braves.jpg'),
(68, 'Milwaukee Brewers', 'MLB', 'images/mlb/brewers.jpg'),
(69, 'St. Louis Cardinals', 'MLB', 'images/mlb/cardinals.jpg'),
(70, 'Chicago Cubs', 'MLB', 'images/mlb/cubs.jpg'),
(71, 'Arizona Diamondbacks', 'MLB', 'images/mlb/diamondbacks.jpg'),
(72, 'Los Angeles Dodgers', 'MLB', 'images/mlb/dodgers.jpg'),
(73, 'San Fransisco Giants', 'MLB', 'images/mlb/giants.jpg'),
(74, 'Cleveland Indians', 'MLB', 'images/mlb/indians.jpg'),
(75, 'Seattle Mariners', 'MLB', 'images/mlb/mariners.jpg'),
(76, 'Florida Marlins', 'MLB', 'images/mlb/marlins.jpg'),
(77, 'New York Mets', 'MLB', 'images/mlb/mets.jpg'),
(78, 'Washington Nationals', 'MLB', 'images/mlb/nationals.jpg'),
(79, 'Baltimore Orioles', 'MLB', 'images/mlb/orioles.jpg'),
(80, 'San Diego Padres', 'MLB', 'images/mlb/padres.jpg'),
(81, 'Philadelphia Phillies', 'MLB', 'images/mlb/phillies.jpg'),
(82, 'Pittsburgh Pirates', 'MLB', 'images/mlb/pirates.jpg'),
(83, 'Texas Rangers', 'MLB', 'images/mlb/rangers.jpg'),
(84, 'Tampa Bay Rays', 'MLB', 'images/mlb/rays.jpg'),
(85, 'Cincinnati Reds', 'MLB', 'images/mlb/reds.jpg'),
(86, 'Boston Red Sox', 'MLB', 'images/mlb/red-sox.jpg'),
(87, 'Colorado Rockies', 'MLB', 'images/mlb/rockies.jpg'),
(88, 'Kansas City Royals', 'MLB', 'images/mlb/royals.jpg'),
(89, 'Detroit Tigers', 'MLB', 'images/mlb/tigers.jpg'),
(90, 'Minnesota Twins', 'MLB', 'images/mlb/twins.jpg'),
(91, 'Chicago White Sox', 'MLB', 'images/mlb/white-sox.jpg'),
(92, 'New York Yankees', 'MLB', 'images/mlb/yankees.jpg'),
(93, 'Colorado Avalanche', 'NHL', 'images/nhl/avalanche.jpg'),
(94, 'Chicago Blackhawks', 'NHL', 'images/nhl/blackhawks.jpg'),
(95, 'Columbus Blue Jackets', 'NHL', 'images/nhl/blue-jackets.jpg'),
(96, 'St. Louis Blues', 'NHL', 'images/nhl/blues.jpg'),
(97, 'Boston Bruins', 'NHL', 'images/nhl/bruins.jpg'),
(98, 'Montreal Canadiens', 'NHL', 'images/nhl/canadiens.jpg'),
(99, 'Vancouver Canucks', 'NHL', 'images/nhl/canucks.jpg'),
(100, 'Washington Capitals', 'NHL', 'images/nhl/capitals.jpg'),
(101, 'Arizona Coyotes', 'NHL', 'images/nhl/coyotes.jpg'),
(102, 'New Jersey Devils', 'NHL', 'images/nhl/devils.jpg'),
(103, 'Anaheim Ducks', 'NHL', 'images/nhl/ducks.jpg'),
(104, 'Calgary Flames', 'NHL', 'images/nhl/flames.jpg'),
(105, 'Philadelphia Flyers', 'NHL', 'images/nhl/flyers.jpg'),
(106, 'Carolina Hurricanes', 'NHL', 'images/nhl/hurricanes.jpg'),
(107, 'New York Islanders', 'NHL', 'images/nhl/islanders.jpg'),
(108, 'Winnipeg Jets', 'NHL', 'images/nhl/jets.jpg'),
(109, 'Los Angeles Kings', 'NHL', 'images/nhl/kings.jpg'),
(110, 'Tampa Bay Lightning', 'NHL', 'images/nhl/lightning.jpg'),
(111, 'Toronto Maple Leafs', 'NHL', 'images/nhl/maple-leafs.jpg'),
(112, 'Edmonton Oilers', 'NHL', 'images/nhl/oilers.jpg'),
(113, 'Florida Panthers', 'NHL', 'images/nhl/panthers.jpg'),
(114, 'Pittsburgh Penguins', 'NHL', 'images/nhl/penguins.jpg'),
(115, 'Nashville Predators', 'NHL', 'images/nhl/predators.jpg'),
(116, 'New York Rangers', 'NHL', 'images/nhl/rangers.jpg'),
(117, 'Detroit Red Wings', 'NHL', 'images/nhl/red-wings.jpg'),
(118, 'Buffalo Sabres', 'NHL', 'images/nhl/sabres.jpg'),
(119, 'Ottawa Senators', 'NHL', 'images/nhl/senators.jpg'),
(120, 'San Jose Sharks', 'NHL', 'images/nhl/sharks.jpg'),
(121, 'Dallas Stars', 'NHL', 'images/nhl/stars.jpg'),
(122, 'Minnesota Wild', 'NHL', 'images/nhl/wild.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
