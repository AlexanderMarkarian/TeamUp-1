<?php
/*
https://allsportsdata.herokuapp.com/nba
https://allsportsdata.herokuapp.com/nhl
https://allsportsdata.herokuapp.com/nfl
https://allsportsdata.herokuapp.com/mlb
*/
/*
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, 'https://allsportsdata.herokuapp.com/nba');
$result = curl_exec($ch);
curl_close($ch);
 * 
 */
$result = file_get_contents('http://teamup-node.herokuapp.com/nbaJSON');
$nba = get_string_between($result, '<', '>');

//$obj = json_decode(substr(substr($result, 1), 0, -1));
//$nba=get_string_between($result, '<body><', '></body>');


$myfile = fopen("nba/nba_".date("Y-m-d").".json", "w") or die("Unable to open file!");

fwrite($myfile, $nba);
fclose($myfile);

/*
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, 'https://allsportsdata.herokuapp.com/nhl');
$result = curl_exec($ch);
curl_close($ch);

$obj = json_decode(substr(substr($result, 1), 0, -1));
$nhl=get_string_between($result, '<body><', '></body>');
*/
$result = file_get_contents('http://teamup-node.herokuapp.com/nhlJSON');
$nhl = get_string_between($result, '<', '>');

$myfile = fopen("nhl/nhl_".date("Y-m-d").".json", "w") or die("Unable to open file!");

fwrite($myfile, $nhl);
fclose($myfile);

/*
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, 'https://allsportsdata.herokuapp.com/nfl');
$result = curl_exec($ch);
curl_close($ch);

$obj = json_decode(substr(substr($result, 1), 0, -1));
$nfl=get_string_between($result, '<body><', '></body>');
*/
$result = file_get_contents('http://teamup-node.herokuapp.com/nflJSON');
$nfl = get_string_between($result, '<', '>');

$myfile = fopen("nfl/nfl_".date("Y-m-d").".json", "w") or die("Unable to open file!");

fwrite($myfile, $nfl);
fclose($myfile);
/*
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, 'https://allsportsdata.herokuapp.com/mlb');
$result = curl_exec($ch);
curl_close($ch);

$obj = json_decode(substr(substr($result, 1), 0, -1));
$mlb=get_string_between($result, '<body><', '></body>');
*/
$result = file_get_contents('http://teamup-node.herokuapp.com/mlbJSON');
$mlb = get_string_between($result, '<', '>');

$myfile = fopen("mlb/mlb_".date("Y-m-d").".json", "w") or die("Unable to open file!");

fwrite($myfile, $mlb);
fclose($myfile);

function get_string_between($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}

?>