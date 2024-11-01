<?php
/*
Plugin Name: TheCzarOfAll's SC2 Ladder Displayer
Plugin URI: http://www.TheCzarOfAll.com
Version: 0.1
Description: Displays StarCraft 2 ladder rank and other vital information as a widget.
Author: Dereck "TheCzarOfAll" Gilbert
Author URI: http://www.theczarofall.com
License: GPL2
*/

add_action("widgets_init", array("LadderDisplayer", "register"));
if (!class_exists("LadderDispayer")) {
	class LadderDisplayer {
		function LadderDisplayer() { //constructor
		}
		function ladderRank(){
		$options = get_option("ladderRank");
		if (!is_array( $options ))
		{
			$options = array(
			'profileURL' => 'http://',
			'region' => 'na'
			);
		}
		$kr = 'kr';
		$na = 'na';
		$eu = 'eu';
		if($options['region'] == $kr){
		$profilePHP = "PHP/krladder.php";
		}
		if($options['region'] == $na){
		$profilePHP = "PHP/naladder.php";
		}
		if($options['region'] == $eu){
		$profilePHP = "PHP/euladder.php";
		}
		include $profilePHP;
		include "PHP/widgetDisplay.php";
		}

		function widgetLadderDisplayer($args){
			extract($args);

		}
		function controlPanel(){
    		include "PHP/controlPanel.php";
 		 }
		function register(){
			register_sidebar_widget( 'LadderDisplayer', array('LadderDisplayer', 'ladderRank'));
			register_widget_control('LadderDisplayer', array('LadderDisplayer', 'controlPanel'), 300, 200);
		}

	} //End Class
}
if (class_exists("LadderDisplayer")) {
	$ladderDisplay = new LadderDisplayer();
}

//Actions and Filters
if (isset($ladderDisplay)) {
//Actions
//Filters

}
?>
