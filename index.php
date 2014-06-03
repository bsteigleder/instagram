<?php
include('functions.php');
session_start();
//printrx($_SESSION);
if (isset($_SESSION['code'])||isset($_SESSION['access_token'])){
    header("location: feed.php");
}
?>
<html>
    <head>
        <title>FastInsta</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3" >
                    <img src="img/logo.png" class="col-md-offset-3" alt="" /><br />
                    <br />
                    <a  href="https://api.instagram.com/oauth/authorize/?scope=likes&client_id=8dcfc9cf4d684b5baeaf00a053f28785&redirect_uri=http://www.lifein.com.br/instagram/feed.php&response_type=code" class="btn btn-success btn-lg">Logar No instagram</a>
                </div>
            </div>
        </div>
    </body>
</html>