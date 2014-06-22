<?php

require_once('hashes.php');

if(in_array(md5($_SERVER['HTTP_REFERER']), $hashes, true)) {
	require_once('db.php');

	$name  = $_POST['name'];
	$score = $_POST['score'];
	$game  = $_POST['game'];

	$timestamp = date("Y-m-d H:i:s");

	$sth = $dbh->prepare("INSERT INTO scores (name, score, game, timestamp) value (:name, :score, :game, :timestamp)");
	$sth->bindParam(':name', $name);
	$sth->bindParam(':score', $score);
	$sth->bindParam(':game', $game);
	$sth->bindParam(':timestamp', $timestamp);
	$sth->execute();
}