<?php

session_start();
include 'functions.php';
//printrx($_SESSION);
$token=$_SESSION['access_token'];
$maxId=$_GET['page'];
//https://api.instagram.com/v1/users/self/feed?access_token=17674007.f59def8.6697be07923145c4a1008764ec939012&max_id=729001142163654810_194590305
$url="https://api.instagram.com/v1/users/self/feed?access_token=$token&max_id=$maxId";
//die($url);
//$json = file_get_contents($url);
$json = file_get_contents('feed.json');
die($json);


