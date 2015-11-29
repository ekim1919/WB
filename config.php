<?php


class Config {

	/*
		Image Configuration constants
	*/

	const IMAGE_ROOT = '/Images/'; //In respect to the root directory of http
	const MAX_WIDTH = 700;
	const MAX_HEIGHT = 700;

	const ACCEPTED_IMG_TYPES = array( //File types of accepted images. 
	'image/jpeg' => 'jpg',         
	'image/png' => 'png',
	'image/gif' => 'gif',
	'image/pjpeg' => 'jpg');

	const THUMB_IMAGE_ROOT = '/Images/Thumbnails/';
	const THUMB_WIDTH = 64;
	const THUMB_HEIGHT = 64;

	/*
		Database Configuration constants
	*/

	const DB_HOSTNAME = 'localhost';
	const DB_USERNAME = 'postgres';
	const DB_PASSWORD = NULL;
	const DB_PORT = 5432;
}

?>