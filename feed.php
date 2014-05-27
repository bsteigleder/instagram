<pre>
<?php 

    $json=file_get_contents('https://api.instagram.com/v1/users/self/feed?access_token=17674007.f59def8.6697be07923145c4a1008764ec939012');
    $all=json_decode($json,true);
    //print_r($all);
    //die();
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/estilo.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3" >
                    <?php foreach ($all['data'] as $post){ ?>
                    <img src="<?php echo $post['images']['thumbnail']['url'] ?>" class="col-md-offset-3" alt="" /><br />
                    <?php }  ?>
                    <!--<a  href="https://api.instagram.com/oauth/authorize/?client_id=8dcfc9cf4d684b5baeaf00a053f28785&redirect_uri=http://www.lifein.com.br&response_type=code" class="btn btn-success btn-lg">Logar No instagram</a>-->
                </div>
            </div>
        </div>
    </body>
</html>