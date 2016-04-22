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
    'Boston Bruins': [61, 'images/nhl/bruins.jpg',],
    'Tampa Bay Lightning': [62, 'images/nhl/lightning.jpg',],
    'Florida Panthers': [63,'images/nhl/panthers.jpg',],
    'Toronto Maple Leafs': [64,'images/nhl/maple-leafs.jpg',],
    'Dallas Stars': [65,'images/nhl/stars.jpg',],
    'Carolina Hurricanes': [66,'images/nhl/hurricanes.jpg',],
    'Los Angeles Kings': [67,'images/nhl/kings.jpg',],
    'Pittsburgh Penguins': [68,'images/nhl/penguins.jpg',],
    'Chicago Blackhawks': [69,'images/nhl/blackhawks.jpg',],
    'San Jose Sharks': [70,'images/nhl/sharks.jpg',],
    'Vancouver Canucks': [71,'images/nhl/canucks.jpg',],
    'New York Rangers': [72,'images/nhl/rangers.jpg',],
    'Washington Capitals': [73,'images/nhl/capitals.jpg',],
    'Ottawa Senators': [74,'images/nhl/senators.jpg',],
    'Detroit Red Wings': [75,'images/nhl/red-wings.jpg',],
    'Columbus Blue Jackets': [76,'images/nhl/blue-jackets.jpg',],
    'Montreal Canadiens': [77,'images/nhl/canadiens.jpg',],
    'Nashville Predators': [78,'images/nhl/predators.jpg',],
    'Edmonton Oilers': [79,'images/nhl/oilers.jpg',],
    'Minnesota Wild': [80,'images/nhl/wild.jpg',],
    'New York Islanders': [81,'images/nhl/islanders.jpg',],
    'Colorado Avalanche': [82,'images/nhl/avalanche.jpg',],
    'Philadelphia Flyers': [83,'images/nhl/flyers.jpg',],
    'Arizona Coyotes': [84,'images/nhl/coyotes.jpg',],
    'Buffalo Sabres': [85,'images/nhl/sabres.jpg',],
    'Anaheim Ducks': [86,'images/nhl/ducks.jpg',],
    'St. Louis Blues': [87,'images/nhl/bluis.jpg',],
    'New Jersey Devils': [88,'images/nhl/devils.jpg',],
    'Winnipeg Jets': [89,'images/nhl/jets.jpg',],
    'Calgary Flames': [90,'images/nhl/flames.jpg']
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
    'New England Patriots': [91,'images/nfl/patriots.jpg',],
    'Dallas Cowboys': [92,'images/nfl/cowboys.jpg',],
    'San Francisco 49ers' : [93,'images/nfl/49ers.jpg',],
    'Cleveland Browns': [94,'images/nfl/browns.jpg',],
    'Cincinnati Bengals': [95,'images/nfl/bengals.jpg',],
    'Miami Dolphins': [96,'images/nfl/dolphins.jpg',],
    'New York Jets': [97,'images/nfl/jets.jpg',],
    'Buffalo Bills': [98,'images/nfl/bills.jpg',],
    'New York Giants': [99,'images/nfl/giants.jpg',],
    'Philadelphia Eagles': [100,'images/nfl/eagles.jpg',],
    'Washinton Redskins': [101,'images/nfl/redskins.jpg',],
    'Pittsburgh Steelers': [102,'images/nfl/steelers.jpg',],
    'Baltimore Ravens': [103,'images/nfl/ravens.jpg',],
    'Seattle Seahawks': [104,'images/nfl/seahawks.jpg',],
    'Arizona Cardinals': [105,'images/nfl/cardinals.jpg',],
    'St. Louis Rams': [106,'images/nfl/rams.jpg',],
    'Denver Broncos': [107,'images/nfl/broncos.jpg',],
    'San Diego Chargers': [108,'images/nfl/chargers.jpg',],
    'Oakland Raiders': [109,'images/nfl/raiders.jpg',],
    'Kansas City Chiefs': [110,'images/nfl/chiefs.jpg',],
    'Green Bay Packers': [111,'images/nfl/packers.jpg',],
    'Minnesota Vikings': [112,'images/nfl/vikings.jpg',],
    'Detroit Lions': [113,'images/nfl/lions.jpg',],
    'Chicago Bears': [114,'images/nfl/bears.jpg',],
    'Houston Texans': [115,'images/nfl/texans.jpg',],
    'Indianapolis Colts': [116,'images/nfl/colts.jpg',],
    'Tennessee Titans': [117,'images/nfl/titans.jpg',],
    'Jacksonville Jaguars': [118, 'images/nfl/jaguars.jpg',],
    'Atlanta Falcons': [119,'images/nfl/falcons.jpg',],
    'Carolina Panthers': [120,'images/nfl/panthers.jpg',],
    'New Orleans Saints': [121,'images/nfl/saints.jpg',],
    'Tampa Bay Buccaneers': [122,'images/nfl/buccaneers.jpg']
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
    'STL': [31, 'St. Louis Cardinals', 'images/mlb/cardinals.jpg'],
    'PIT': [32, 'Pittsburgh Pirates', 'images/mlb/pirates.jpg'],
    'CHC': [33, 'Chicago Cubs','images/mlb/cubs.jpg'],
    'LAD': [34, 'Los Angeles Dodgers', 'images/mlb/dodgers.jpg'],
    'KCR': [35, 'Kansas City Royals', 'images/mlb/royals.jpg'],
    'TOR': [36, 'Toronto Blue Jays', 'images/mlb/blue-jays'],
    'NYM': [37, 'New York Mets', 'images/mlb/mets.jpg'],
    'TEX': [38, 'Texas Rangers', 'images/mlb/rangers.jpg'],
    'NYY': [39, 'New York Yankees', 'images/mlb/yankees.jpg'],
    'BOS': [40, 'Boston Red Sox', 'images/mlb/red-sox.jpg'],
    'HOU': [41, 'Houston Astros', 'images/mlb/astros.jpg'],
    'LAA': [42, 'Los Angeles Angels', 'images/mlb/angels.jpg'],
    'SFG': [43, 'San Fransisco Giants', 'images/mlb/giants.jpg'],
    'WSN': [44, 'Washington Nationals', 'images/mlb/nationals.jpg'],
    'CLE': [45, 'Cleveland Indians', 'images/mlb/indians.jpg'],
    'MIN': [46, 'Minnestoa Twins', 'images/mlb/twins.jpg'],
    'BAL': [47, 'Baltimore Orioles', 'images/mlb/orioles.jpg'],
    'ARI': [48, 'Arizona Diamondbacks', 'images/mlb/diamondbacks.jpg'],
    'SEA': [49, 'Seattle Mariners', 'images/mlb/mariners.jpg'],
    'DET': [50, 'Detroit Tigers', 'images/mlb/tigers.jpg'],
    'SDP': [51, 'San Diego Padres', 'images/mlb/padres.jpg'],
    'MIA': [52, 'Miami Marlins', 'images/mlb/marlins'],
    'OAK': [53, 'Oakland Athletics', 'images/mlb/athletics.jpg'],
    'PHI': [54, 'Philadelphia Phillies', 'images/mlb/phillies.jpg'],
    'COL': [55, 'Colorado Rockies', 'images/mlb/rockies.jpg'],
    'MIL': [56, 'Milwaukee Brewers', 'images/mlb/brewers.jpg'],
    'CHW': [57, 'Chicago White Sox', 'images/mlb/white-sox.jpg'],
    'TBR': [58, 'Tampa Bay Rays', 'images/mlb/rays.jpg'],
    'CIN': [59, 'Cincinnati Reds', 'images/mlb/reds.jpg'],
    'ATL': [60, 'Atlanta Braves', 'images/mlb/braves.jpg']
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
    'Philadelphia 76ers': ['images/nba/76ers.jpg', 1],
    'Portland Trail Blazers': ['images/nba/blazers.jpg', 2],
    'Milwaukee Bucks': ['images/nba/bucks.jpg', 3],
    'Chicago Bulls': ['images/nba/bulls.jpg', 4],
    'Cleveland Cavaliers': ['images/nba/cavaliers.jpg', 5],
    'Boston Celtics': ['images/nba/celtics.jpg', 6],
    'Los Angeles Clippers': ['images/nba/clippers.jpg', 7],
    'Memphis Grizzlies': ['images/nba/grizzlies.jpg', 8],
    'Atlanta Hawks': ['images/nba/hawks.jpg', 9],
    'Miami Heat': ['images/nba/heat.jpg', 10],
    'Charlotte Hornets': ['images/nba/hornets.jpg', 11],
    'Utah Jazz': ['images/nba/jazz.jpg', 12],
    'Sacramento Kings': ['images/nba/kings.jpg', 13], 
    'New York Knicks': ['images/nba/knicks.jpg', 14],
    'Los Angeles Lakers': ['images/nba/lakers.jpg', 15],
    'Orlando Magic': ['images/nba/magic.jpg', 16],
    'Dallas Mavericks': ['images/nba/mavericks.jpg', 17],
    'Brooklyn Nets': ['images/nba/nets.jpg', 18], 
    'Denver Nuggets': ['images/nba/nuggets.jpg', 19],
    'Indiana Pacers': ['images/nba/pacers.jpg', 20],
    'New Orleans Pelicans': ['images/nba/pelicans.jpg', 21],
    'Detroit Pistons': ['images/nba/pistons.jpg', 22],
    'Toronto Raptors': ['images/nba/raptors', 23],
    'Houston Rockets': ['images/nba/rockets.jpg', 24], 
    'San Antonio Spurs': ['images/nba/spurs.jpg', 25], 
    'Phoenix Sunbs': ['images/nba/suns.jpg', 26], 
    'Oklahoma City Thunder': ['images/nba/thunder.jpg', 27], 
    'Minnesota Timberwolves': ['images/nba/timberwolves.jpg', 28], 
    'Golden State Warriors': ['images/nba/warriors.jpg', 29],
    'Washington Wizards': ['images/nba/wizards.jpg', 30]
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




