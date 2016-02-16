/*
 * install node modules 
 * express
 * jade
 * nba
 * nba-schedules
 * nfl_scores
 * mlb
 * 
 * for nba playerInfo, teamInfo, teamSplits, teamInfo
 * you need to get the id from nba node modules, nba, data, player and team json
 * files
 * 
 */

var express = require('express');
var path = require('path');
var nba = require('nba');
var nbaSchedules = require('nba-schedules');
var nflScores = require('nfl_scores');
var mlb = require('mlb');
var app = express();

app.set("views", path.join(__dirname, "views"));
app.set("view engine", "jade");

app.get('/', function(req, res) {
    res.render('index');
});

app.get('/teamStats', function (req,res){
   nba.stats.teamStats(function (err, data){
        res.render('index',{info:JSON.stringify(data)});
   });
});

app.get('/lineups', function (req,res){
   nba.stats.lineups(function (err,data){
      res.render('index',{info:JSON.stringify(data)});
   });
});

app.get('/playerInfo/:id', function (req,res){
    nba.stats.playerInfo({playerId:req.params.id}, function(err,data){
        res.render('index',{info:JSON.stringify(data)});
    });
});

app.get('/playerProfile/:id', function (req,res){
    nba.stats.playerProfile({playerId:req.params.id}, function(err,data){
        res.render('index',{info:JSON.stringify(data)});
    });
});

app.get('/teamSplits/:id', function (req,res){
    nba.stats.teamSplits({teamId:req.params.id}, function(err,data){
        res.render('index',{info:JSON.stringify(data)});
    });
});

app.get('/teamInfo/:id', function (req,res){
   nba.stats.teamInfoCommon({teamId:req.params.id},function(err,data){
       res.render('index',{info:JSON.stringify(data)});
   });
});

app.get('/nflScores', function (req,res){
    nflScores.refresh(function(err, scores) {
        res.render('index',{info:JSON.stringify(scores)});
    });
});

app.get('/mlb', function (req,res){
    mlb.games.get(function(err, data) {
       res.render('index',{info:JSON.stringify(data)})
    });
});

app.listen(3000);
console.log('Server running on port 3000');




