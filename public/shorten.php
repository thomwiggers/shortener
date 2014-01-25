<?php
/**
 * Simple URL shortener for use in scripts
 *
 * @author Thom Wiggers
 * @license MIT License
 */

require '../config.php';

if (empty($_GET['password']) || $_GET['password'] !== PASSWORD) {
	header('HTTP/1.0 403 Forbidden');
	die("<html><head><title>Forbidden</title></head><body><h1>Forbidden</h1></body></html>");
} elseif (empty($_GET['url'])) {
	header('HTTP/1.0 404 Not Found');
	die("<html><head><title>Not Found</title></head><body><h1>Missing Parameters</h1></body></html>");
}

//generate unique id
$key = uniqid();

//get insert.
$stmt = $pdo->prepare("INSERT INTO urls (key, url) VALUES (:key, :url)");
$stmt->bindParam(':url', $_GET['url']);
$stmt->bindParam(':key', $key);
$stmt->execute();


echo GET_URL . '?i=' . $key;
