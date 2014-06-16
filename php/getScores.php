<?php

require_once('db.php');

$sth = $dbh->query("SELECT name, score, game FROM scores ORDER BY score");
$sth->setFetchMode(PDO::FETCH_OBJ);
$scores = $sth->fetchAll();

$json = json_encode($scores);

echo $json;