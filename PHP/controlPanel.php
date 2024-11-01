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

 $options = get_option("ladderRank");
  if (!is_array( $options ))
{
$options = array(
      'profileURL' => 'http://',
	'region' => 'na'
      );
  }
 
  if ($_POST['ladderControlSend'])
  {
    $options['profileURL'] = htmlspecialchars($_POST['profileURLBox']);
	$options['region'] = $_POST['regionSwitcher'];
    update_option("ladderRank", $options);
  }
 
?>
  <p>
<? echo $options['region']; ?>
    <label for="profileURLBox">Battle.Net Profile URL </label>
    <input type="text" id="profileURLBox" name="profileURLBox" value="<? echo $options['profileURL'];?>" /><br />
NA <input type="radio" name="regionSwitcher" value="na" <? if($options['region'] == na){ echo "checked"; } ?> />
KR/TW <input type="radio" name="regionSwitcher" value="kr" <? if($options['region'] == kr){ echo "checked"; } ?> />
LA <input type="radio" name="regionSwitcher" value="la" <? if($options['region'] == la){ echo "checked"; } ?> />
EU <input type="radio" name="regionSwitcher" value="eu" <? if($options['region'] == eu){ echo "checked"; } ?> />
<input type="hidden" id="ladderControlSend" name="ladderControlSend" value="1" />
  </p>
<?
