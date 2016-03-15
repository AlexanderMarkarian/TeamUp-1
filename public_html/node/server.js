var express = require('express');
var path = require('path');
var scraper = require('basketball-reference');
var app = express();

app.set("views", path.join(__dirname, "views"));
app.set("view engine", "jade");

app.get('/', function(req, res) {
    res.render('index');
});


app.get('/nba', function (req, res){
    scraper.getNBAStandings(2016, function(data) {
      res.render('index',{info:JSON.stringify(data)});
  });  
});

app.get('/nhl', function (req, res){
    scraper.getNHLStandings(2016, function(data) {
      res.render('index',{info:JSON.stringify(data)});
  });  
});


app.get('/nfl', function (req, res){
    scraper.getNFLStandings(2015, function(data) {
      res.render('index',{info:JSON.stringify(data)});
  });  
});


app.get('/mlb', function (req, res){
    scraper.getMLBStandings(2015, function(data) {
      res.render('index',{info:JSON.stringify(data)});
  });  
});


app.listen(3000);
console.log('Server running on port 3000');

