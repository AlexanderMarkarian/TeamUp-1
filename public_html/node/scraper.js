/*!
 * basketball-reference
 * MIT License (c) 2015
 * https://github.com/codenameyau/basketball-reference
 *
 * Description:
 * Scraper for basketball-reference.com that outputs JSON.
 */
'use strict';


/***************************************************************
* Dependencies
***************************************************************/
var request = require('request');
var cheerio = require('cheerio');
var util = require('util');


/***************************************************************
* Globals
***************************************************************/
var NBA = 'http://www.basketball-reference.com/';

var NHL = 'http://www.hockey-reference.com/';

var NFL = 'http://www.pro-football-reference.com/';

var MLB = 'http://www.baseball-reference.com/';


/***************************************************************
* Internal Functions
***************************************************************/
var getNBA = function(menu, resource) {
  return util.format('%s/%s/%s.html',
    NBA, menu, resource);
};

var getNHL = function(menu, resource){
  return util.format('%s/%s/%s.html',
    NHL, menu, resource);
};

var getMLB = function(menu, resource){
  return util.format('%s/%s/%s.shtml',
    MLB, menu, resource);
};

var getNFL = function(resource){
  return util.format('%s/%s.html',
    NFL, resource);
};

var convertToNumber = function(value) {
  if (isNaN(value)) {
    return 0;
  } else {
    return parseFloat(value);
  }
};

var parseNBAConferenceName = function($conference) {
  return $conference.find('.sort_default_asc').html();
};

var parseNHLConferenceName = function($conference){
  return $conference[0].children[0].next.next.next.children[1].children[0].next.children[0].data;
};

var parseDivisionName = function($row) {
  return $row.find('.black_text')[0].children[0].data;

};

var parseNFLDivisionName = function($row){
  return $row[0].children[0].next.children[0].children[0].data;
}

var parseSeed = function(text) {
  return parseInt(
    text.match(/\(\d+\)/gm)[0]
        .match(/\d+/gm)[0], 10);
};

var parseNHL = function($row) {
  var standing = {};
  var teamURL = $row.find('a');
  //var id = teamURL.attr().href.match(/[A-Z]+/g)[0];
  var team = teamURL.text();

  var rawData = $row.text().trim().replace(/\n\s+/gm, ',').split(',');

  var keys = [
    'GP',
    'wins',
    'loses',
  ];

  var image = {
    'Boston Bruins': [61, '../assets/images/nhl/bruins.jpg',],
    'Tampa Bay Lightning': [62, '../assets/images/nhl/lightning.jpg',],
    'Florida Panthers': [63,'../assets/images/nhl/panthers.jpg',],
    'Toronto Maple Leafs': [64,'../assets/images/nhl/maple-leafs.jpg',],
    'Dallas Stars': [65,'../assets/images/nhl/stars.jpg',],
    'Carolina Hurricanes': [66,'../assets/images/nhl/hurricanes.jpg',],
    'Los Angeles Kings': [67,'../assets/images/nhl/kings.jpg',],
    'Pittsburgh Penguins': [68,'../assets/images/nhl/penguins.jpg',],
    'Chicago Blackhawks': [69,'../assets/images/nhl/blackhawks.jpg',],
    'San Jose Sharks': [70,'../assets/images/nhl/sharks.jpg',],
    'Vancouver Canucks': [71,'../assets/images/nhl/canucks.jpg',],
    'New York Rangers': [72,'../assets/images/nhl/rangers.jpg',],
    'Washington Capitals': [73,'../assets/images/nhl/capitals.jpg',],
    'Ottawa Senators': [74,'../assets/images/nhl/senators.jpg',],
    'Detroit Red Wings': [75,'../assets/images/nhl/red-wings.jpg',],
    'Columbus Blue Jackets': [76,'../assets/images/nhl/blue-jackets.jpg',],
    'Montreal Canadiens': [77,'../assets/images/nhl/canadiens.jpg',],
    'Nashville Predators': [78,'../assets/images/nhl/predators.jpg',],
    'Edmonton Oilers': [79,'../assets/images/nhl/oilers.jpg',],
    'Minnesota Wild': [80,'../assets/images/nhl/wild.jpg',],
    'New York Islanders': [81,'../assets/images/nhl/islanders.jpg',],
    'Colorado Avalanche': [82,'../assets/images/nhl/avalanche.jpg',],
    'Philadelphia Flyers': [83,'../assets/images/nhl/flyers.jpg',],
    'Arizona Coyotes': [84,'../assets/images/nhl/coyotes.jpg',],
    'Buffalo Sabres': [85,'../assets/images/nhl/sabres.jpg',],
    'Anaheim Ducks': [86,'../assets/images/nhl/ducks.jpg',],
    'St. Louis Blues': [87,'../assets/images/nhl/bluis.jpg',],
    'New Jersey Devils': [88,'../assets/images/nhl/devils.jpg',],
    'Winnipeg Jets': [89,'../assets/images/nhl/jets.jpg',],
    'Calgary Flames': [90,'../assets/images/nhl/flames.jpg']
  };

  for(var l in image){
    if(team == l){
      standing.id = image[l][0];
      standing.team = team;
      standing.image = image[l][1];

      var k = 0;
      for (var i=1, len=rawData.length; i<len; i++) {
        if(keys[k] != undefined)
          standing[keys[k]] = convertToNumber(rawData[i]);
        k++;
      }

      standing.percentage = (standing.wins / standing.GP).toFixed(3);
    }
  }


  return standing;
};

var parseNFL = function($row){
  var standing = {};
  var teamURL = $row.find('a');
  //standing.id = teamURL.attr().href.match(/[A-Z]+/g)[0];
  var team = teamURL.text();
  var rawData = $row.text().trim().replace(/\n\s+/gm, ',').split(',');

  var keys = [
    'wins',
    'loses',
  ];

  var image = {
    'New England Patriots': [91,'../assets/images/nfl/patriots.jpg',],
    'Dallas Cowboys': [92,'../assets/images/nfl/cowboys.jpg',],
    'San Francisco 49ers' : [93,'../assets/images/nfl/49ers.jpg',],
    'Cleveland Browns': [94,'../assets/images/nfl/browns.jpg',],
    'Cincinnati Bengals': [95,'../assets/images/nfl/bengals.jpg',],
    'Miami Dolphins': [96,'../assets/images/nfl/dolphins.jpg',],
    'New York Jets': [97,'../assets/images/nfl/jets.jpg',],
    'Buffalo Bills': [98,'../assets/images/nfl/bills.jpg',],
    'New York Giants': [99,'../assets/images/nfl/giants.jpg',],
    'Philadelphia Eagles': [100,'../assets/images/nfl/eagles.jpg',],
    'Washinton Redskins': [101,'../assets/images/nfl/redskins.jpg',],
    'Pittsburgh Steelers': [102,'../assets/images/nfl/steelers.jpg',],
    'Baltimore Ravens': [103,'../assets/images/nfl/ravens.jpg',],
    'Seattle Seahawks': [104,'../assets/images/nfl/seahawks.jpg',],
    'Arizona Cardinals': [105,'../assets/images/nfl/cardinals.jpg',],
    'St. Louis Rams': [106,'../assets/images/nfl/rams.jpg',],
    'Denver Broncos': [107,'../assets/images/nfl/broncos.jpg',],
    'San Diego Chargers': [108,'../assets/images/nfl/chargers.jpg',],
    'Oakland Raiders': [109,'../assets/images/nfl/raiders.jpg',],
    'Kansas City Chiefs': [110,'../assets/images/nfl/chiefs.jpg',],
    'Green Bay Packers': [111,'../assets/images/nfl/packers.jpg',],
    'Minnesota Vikings': [112,'../assets/images/nfl/vikings.jpg',],
    'Detroit Lions': [113,'../assets/images/nfl/lions.jpg',],
    'Chicago Bears': [114,'../assets/images/nfl/bears.jpg',],
    'Houston Texans': [115,'../assets/images/nfl/texans.jpg',],
    'Indianapolis Colts': [116,'../assets/images/nfl/colts.jpg',],
    'Tennessee Titans': [117,'../assets/images/nfl/titans.jpg',],
    'Jacksonville Jaguars': [118, '../assets/images/nfl/jaguars.jpg',],
    'Atlanta Falcons': [119,'../assets/images/nfl/falcons.jpg',],
    'Carolina Panthers': [120,'../assets/images/nfl/panthers.jpg',],
    'New Orleans Saints': [121,'../assets/images/nfl/saints.jpg',],
    'Tampa Bay Buccaneers': [122,'../assets/images/nfl/buccaneers.jpg']
  };

  for(var l in image){
    if(team == l){
      standing.id = image[l][0];
      standing.team = team;
      standing.image = image[l][1];

      var k = 0;
      for (var i=1, len=rawData.length; i<len; i++) {
        if(keys[k] != undefined)
          standing[keys[k]] = convertToNumber(rawData[i]);
        k++;
      }

      standing.GP = standing.wins + standing.loses;
      standing.percentage = (standing.wins / standing.GP).toFixed(3);
    }
  }


  return standing;

};

var parseMLB = function($row){
  var standing = {};
  var teamURL = $row.find('a');
  var id = teamURL.text();
  
  var rawData = $row.text().trim().replace(/\n\s+/gm, ',').split(',');

  var keys = [
    'GP',
    'wins',
    'loses',
    'percentage'
  ];

  var converter = {
    'STL': [31, 'St. Louis Cardinals', '../assets/images/mlb/cardinals.jpg'],
    'PIT': [32, 'Pittsburgh Pirates', '../assets/images/mlb/pirates.jpg'],
    'CHC': [33, 'Chicago Cubs','../assets/images/mlb/cubs.jpg'],
    'LAD': [34, 'Los Angeles Dodgers', '../assets/images/mlb/dodgers.jpg'],
    'KCR': [35, 'Kansas City Royals', '../assets/images/mlb/royals.jpg'],
    'TOR': [36, 'Toronto Blue Jays', '../assets/images/mlb/blue-jays'],
    'NYM': [37, 'New York Mets', '../assets/images/mlb/mets.jpg'],
    'TEX': [38, 'Texas Rangers', '../assets/images/mlb/rangers.jpg'],
    'NYY': [39, 'New York Yankees', '../assets/images/mlb/yankees.jpg'],
    'BOS': [40, 'Boston Red Sox', '../assets/images/mlb/red-sox.jpg'],
    'HOU': [41, 'Houston Astros', '../assets/images/mlb/astros.jpg'],
    'LAA': [42, 'Los Angeles Angels', '../assets/images/mlb/angels.jpg'],
    'SFG': [43, 'San Fransisco Giants', '../assets/images/mlb/giants.jpg'],
    'WSN': [44, 'Washington Nationals', '../assets/images/mlb/nationals.jpg'],
    'CLE': [45, 'Cleveland Indians', '../assets/images/mlb/indians.jpg'],
    'MIN': [46, 'Minnestoa Twins', '../assets/images/mlb/twins.jpg'],
    'BAL': [47, 'Baltimore Orioles', '../assets/images/mlb/orioles.jpg'],
    'ARI': [48, 'Arizona Diamondbacks', '../assets/images/mlb/diamondbacks.jpg'],
    'SEA': [49, 'Seattle Mariners', '../assets/images/mlb/mariners.jpg'],
    'DET': [50, 'Detroit Tigers', '../assets/images/mlb/tigers.jpg'],
    'SDP': [51, 'San Diego Padres', '../assets/images/mlb/padres.jpg'],
    'MIA': [52, 'Miami Marlins', '../assets/images/mlb/marlins'],
    'OAK': [53, 'Oakland Athletics', '../assets/images/mlb/athletics.jpg'],
    'PHI': [54, 'Philadelphia Phillies', '../assets/images/mlb/phillies.jpg'],
    'COL': [55, 'Colorado Rockies', '../assets/images/mlb/rockies.jpg'],
    'MIL': [56, 'Milwaukee Brewers', '../assets/images/mlb/brewers.jpg'],
    'CHW': [57, 'Chicago White Sox', '../assets/images/mlb/white-sox.jpg'],
    'TBR': [58, 'Tampa Bay Rays', '../assets/images/mlb/rays.jpg'],
    'CIN': [59, 'Cincinnati Reds', '../assets/images/mlb/reds.jpg'],
    'ATL': [60, 'Atlanta Braves', '../assets/images/mlb/braves.jpg']
  };

  for(var l in converter){
    if(id == l){
      standing.id = converter[l][0];
      standing.team = converter[l][1];
      standing.image = converter[l][2];

      var k = 0;
      for (var i=3, len=rawData.length; i<len; i++) {
        if(keys[k] != undefined)
          standing[keys[k]] = convertToNumber(rawData[i]);
        k++;
      }
    }
  }

  return standing;
};

var parseNBA = function($row){
  var standing = {};
  var teamURL = $row.find('a');
  var team = teamURL.text();

  var rawData = $row.text().trim().replace(/\n\s+/gm, ',').split(',');

  var keys = [
    'wins',
    'loses',
  ];

  var image = {
    'Philadelphia 76ers': ['../assets/images/nba/76ers.jpg', 1],
    'Portland Trail Blazers': ['../assets/images/nba/blazers.jpg', 2],
    'Milwaukee Bucks': ['../assets/images/nba/bucks.jpg', 3],
    'Chicago Bulls': ['../assets/images/nba/bulls.jpg', 4],
    'Cleveland Cavaliers': ['../assets/images/nba/cavaliers.jpg', 5],
    'Boston Celtics': ['../assets/images/nba/celtics.jpg', 6],
    'Los Angeles Clippers': ['../assets/images/nba/clippers.jpg', 7],
    'Memphis Grizzlies': ['../assets/images/nba/grizzlies.jpg', 8],
    'Atlanta Hawks': ['../assets/images/nba/hawks.jpg', 9],
    'Miami Heat': ['../assets/images/nba/heat.jpg', 10],
    'Charlotte Hornets': ['../assets/images/nba/hornets.jpg', 11],
    'Utah Jazz': ['../assets/images/nba/jazz.jpg', 12],
    'Sacramento Kings': ['../assets/images/nba/kings.jpg', 13], 
    'New York Knicks': ['../assets/images/nba/knicks.jpg', 14],
    'Los Angeles Lakers': ['../assets/images/nba/lakers.jpg', 15],
    'Orlando Magic': ['../assets/images/nba/magic.jpg', 16],
    'Dallas Mavericks': ['../assets/images/nba/mavericks.jpg', 17],
    'Brooklyn Nets': ['../assets/images/nba/nets.jpg', 18], 
    'Denver Nuggets': ['../assets/images/nba/nuggets.jpg', 19],
    'Indiana Pacers': ['../assets/images/nba/pacers.jpg', 20],
    'New Orleans Pelicans': ['../assets/images/nba/pelicans.jpg', 21],
    'Detroit Pistons': ['../assets/images/nba/pistons.jpg', 22],
    'Toronto Raptors': ['../assets/images/nba/raptors', 23],
    'Houston Rockets': ['../assets/images/nba/rockets.jpg', 24], 
    'San Antonio Spurs': ['../assets/images/nba/spurs.jpg', 25], 
    'Phoenix Sunbs': ['../assets/images/nba/suns.jpg', 26], 
    'Oklahoma City Thunder': ['../assets/images/nba/thunder.jpg', 27], 
    'Minnesota Timberwolves': ['../assets/images/nba/timberwolves.jpg', 28], 
    'Golden State Warriors': ['../assets/images/nba/warriors.jpg', 29],
    'Washington Wizards': ['../assets/images/nba/wizards.jpg', 30]
  };

  for(var l in image){
    if(team == l){
      standing.id = image[l][1];
      standing.team = team;
      standing.image = image[l][0];
    }
    var k = 0;
    for (var i=1, len=rawData.length; i<len; i++) {
      if(keys[k] != undefined){
        var array = rawData[i].split('-');
        standing.wins = convertToNumber(array[0]);
        standing.loses = convertToNumber(array[1]);
      } 
      k++;
    }
    standing.GP = standing.wins + standing.loses;
    standing.percentage = (standing.wins / standing.GP).toFixed(3);

  }

  return standing;
};


var addNBAStandings = function(standings, $, conference) {
  var $conference = $(conference);
  $conference.find('tbody tr').each(function(i, row) {
    var $row = $(row);
    var team = parseNBA($row);
    standings.push(team);
  });
};


var addNFLStandings = function(standings, $, conference) {
  var $conference = $(conference);
  var conferenceName;
  var divisionName;

  // Parse table information.
  $conference.find('tbody tr').each(function(i, row) {
    var $row = $(row);
    
    if ($row.hasClass('partial_table')) {
      divisionName = parseNFLDivisionName($row);
      if(divisionName.substring(0,4) == " NFC")
        conferenceName = "NFC";
      else
        conferenceName = "AFC";
    }
    else{
      var team = parseNFL($row);
     //team.conference = conferenceName;
     // team.division = divisionName;
      standings.push(team);
    }
  });
};

var addMLBStandings = function(standings, $, conference){
  var $conference = $(conference);
  
  $conference.find('tbody tr').each(function(i, row) {
    var $row = $(row);
    var team = parseMLB($row);
    standings.push(team);
  });
};

var addNHLStandings = function(standings, $, conference){
  var $conference = $(conference);
  $conference.find('tbody tr').each(function(i, row) {
    var $row = $(row);
    var team = parseNHL($row);
    standings.push(team);
  });
};

var parseNBAStandings = function(body) {
  var standings = [];
  var $ = cheerio.load(body);
  addNBAStandings(standings, $, '#expanded-standings');
  return standings;
};

var parseNHLStandings = function(body){
  var standings = [];
  var $ = cheerio.load(body);
  addNHLStandings(standings, $, '#EAS_standings');
  addNHLStandings(standings, $, '#WES_standings');
  return standings;
};

var parseNFLStandings = function(body){
  var standings = [];
  var $ = cheerio.load(body);
  addNFLStandings(standings, $, '#AFC');
  addNFLStandings(standings, $, '#NFC');
  return standings;
};

var parseMLBStandings = function(body){
  var standings = [];
  var $ = cheerio.load(body);
  addMLBStandings(standings, $, '#expanded_standings_overall');
  return standings;
};


/***************************************************************
* Module Exports
***************************************************************/
exports.getNBAStandings = function(year, cb) {
  var url = getNBA('leagues', 'NBA_' + year + '_standings');
  request.get(url, function(error, res, body) {
    if (!error && res.statusCode === 200) {
      cb({
          year: year,
          standings: parseNBAStandings(body),
        });
    }
  });
};


exports.getNHLStandings = function(year, cb){
  var url = getNHL('leagues', 'NHL_' + year + '_standings');
  request.get(url, function(error, res, body){
    if(!error && res.statusCode === 200){
      cb({
          year: year,
          standings: parseNHLStandings(body),
      });
    }
  });
};


exports.getNFLStandings = function(year, cb){
  var url = getNFL('years/' + year);
  request.get(url, function(error, res, body){
    if(!error && res.statusCode === 200){
      cb({
          year: year,
          standings: parseNFLStandings(body),
      });
    }
  });
};


exports.getMLBStandings = function(year, cb){
  var url = getMLB('leagues', 'MLB/' + year + '-standings');
  request.get(url, function(error, res, body){
    if(!error && res.statusCode === 200){
      cb({
          year: year,
          standings: parseMLBStandings(body),
      });
    }
  });
};




