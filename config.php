<?php
/**
 * Simple URL shortener for use in scripts
 *
 * Configuration
 *
 * @author Thom Wiggers
 * @license MIT License
 */

// Path to get.php. Gets appended with ?i=<id>
define('GET_URL', 'http://x.rded.nl/');

// Password for shortening	
define('PASSWORD', 'shortenpw');

//Change database connection here. Sqlite needs 
// php5-sqlite
//
// Use complete path.
$pdo = new PDO("sqlite:/var/www/shortener/database.sqlite");

//set errormode to exceptions
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

