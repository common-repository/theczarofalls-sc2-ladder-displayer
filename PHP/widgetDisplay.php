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

echo $before_widget; ?><div style="background: #000000; opacity:0.6;-moz-border-radius: 1em 4em 1em 1em; border-radius: 1em 4em 1em 1em;"><div style="opacity:1; padding: 1em 1em 1em 1em;"><?
echo $before_title;
?><span id="avatar" style="background: url('http://www.theczarofall.com/uploads/avatars.jpg')<?
echo $res['Avatar'];
?> display: block; float: left; opacity:1; -moz-border-radius: 1em 1em 1em 1em; border-radius: 1em 1em 1em 1em;"></span><br /><br /><br /><br /><br /><?
echo "<strong>".$res['Name']."</strong><br />";
echo $after_title;
echo "<strong>1v1 Rank: ".ucwords($res['League1'])." ".$res['Rank1']."</strong></div></div>";
?>
