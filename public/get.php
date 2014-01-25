<?php
/**
 * Simple URL shortener for use in scripts
 *
 * @author Thom Wiggers
 * @license MIT License
 */

if (empty($_GET['i'])) {
	header('HTTP/1.0 404 Not Found');
	die("<html><head><title>Not Found</title></head><body><h1>Missing Parameters</h1></body></html>");
}

require '../config.php';

$stmt = $pdo->prepare("SELECT * FROM urls WHERE key = :key");
$stmt->bindParam(":key", $_GET['i']);

$stmt->execute();

$row = $stmt->fetch();

if ($row === False) {
	header('HTTP/1.0 404 Not Found');
	die("<html><head><title>Not Found</title></head><body><h1>Not found</h1></body></html>");
}

header('Location: ' . $row['url']);
die();
