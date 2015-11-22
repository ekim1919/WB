<?php

//Will add Database stuff  and a better way to load configurations. This is a temp fix.



//Image Stuff
$IMAGE_ROOT = $_SERVER['DOCUMENT_ROOT'] . '/Images';
$MAX_WIDTH = 500;
$MAX_HEIGHT = 500;

$accepted_img_file_types = array( //File types of accepted images. This can change based on
	'image/jpeg' => 'jpg',         //what types we want to use. 
	'image/png' => 'png',
	'image/gif' => 'gif',
	'image/pjpeg' => 'jpg',);
	
$THUMB_WIDTH = 125;
$THUMB_HEIGHT = 125; 

?>