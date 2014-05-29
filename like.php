<?php
session_start();
include "functions.php";
//echo $_REQUEST['id'];
//print_r($_SESSION);die();
$url="https://api.instagram.com/v1/media/".$_REQUEST['id']."/likes";
//die($_SESSION['access_token']);

echo post_to_url($url, array('access_token'=> $_SESSION['access_token']));
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

