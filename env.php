<?php

//Nommer ces variables correctement, ce fichier pourra être dans un .gitignore
/*$host = "localhost";
$dbname = "mailproject; port=3808; charset=utf8";
$user = "root";
$pass = "";
$projetName = "mailproject";*/


$host = "localhost";
$dbname = "messaouda_; port=3808; charset=utf8";
$user = "messaouda";
$pass = "kCP22KsNoBH5pg==";
$projetName = "messaouda_";

$projectNameLength = strlen($projetName) + 1;
$base_url = mb_substr($_SERVER['REQUEST_URI'], 0, $projectNameLength);

