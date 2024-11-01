<?
/*
Plugin Name: TheCzarOfAll's SC2 Ladder Displayer
Plugin URI: http://www.TheCzarOfAll.com
Version: 0.1
Description: Displays StarCraft 2 ladder rank and other vital information as a widget.
Author: Dereck "TheCzarOfAll" Gilbert
Author URI: http://www.theczarofall.com
License: GPL2
*/

$res['League1']='';
$res['Rank1']='';
$res['Wins1']='';
$res['LeagueWins']='';
$res['MostPlayedRace']='';
$res['Name'] = '';
$res['Code'] = '';
$res['acheivement']='';
$res['Avatar']='';
$options = get_option("ladderRank");
if (!is_array( $options ))
{
$options = array(
      'profileURL' => 'http://'
      );
 }

$profileURL="http://us.battle.net/sc2/en/profile/291169/1/TheCzarOfAll/";


$rawPage = file($options['profileURL']);
foreach ($rawPage as $line_num => $line) {
	//GET AVATAR
	$pos = strpos($line,'.jpg?v40');
	if($pos !=false && $res['Avatar'] == '') {
		$res['Avatar'] = substr($line, $pos+10, -4);
	}
	//GET 1v1 LEAGUE
	$pos = strpos($line,'<span class="badge badge-');
	if($pos !=false && $res['League1'] == '') {
		$res['League1'] = substr($line,$pos+25, strpos($line,'">')-($pos+40));
	}
	//GET 1v1 LADDER RANK
	$pos = strpos($line,'<strong>Rank:</strong> ');
	if($pos !=false && $res['Rank1'] == '') {
		$res['Rank1'] = substr($line, $pos+23);
	}
	//GET Wins / Losses
	$pos = strpos($line,'<strong>Record:</strong> ');
	if($pos !=false && $res['Wins1'] == '') {
		$res['Wins1'] = substr($line,$pos+25,strpos($line,' -')-($pos+25));
	}
	//GET LEAGUE WINS
	$pos = strpos($line,'<h4>League Wins</h4>');
	if($pos !=false && $res['LeagueWins'] == '') {
		$lNext='1';
	}
	else if($lNext=='1'){
		$pos = strpos($line,'<h2>');
		$lNext='0';
		$res['LeagueWins'] = substr($line,$pos+4,strpos($line,'</h2>')-($pos+4));
	}
	//GET NAME
	$pos = strpos($line,'itle>');
	if($pos !=false && $res['Name'] == '') {
		$res['Name'] = substr($line,7,strpos($line,' - ')-($pos+5));
	}
}

?>
