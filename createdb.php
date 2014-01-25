<?php
/**
 * Simple URL shortener for use in scripts
 *
 * This should only be run once. It should be run by php-cli
 *
 * Make sure www-data (or equivalent) can write to the database!
 *
 * @author Thom Wiggers
 * @license MIT License
 */

echo "Connecting to database...\n";
require 'config.php';
echo "Connected. Creating table...\n";

$result = $pdo->exec("CREATE TABLE urls (
						key TEXT,
						url TEXT)");

echo "We're done now. If everything went right.";
