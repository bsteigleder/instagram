<?php
header('Access-Control-Allow-Origin: *');
include 'functions.php';
session_start();



$data = array(
    'client_id' => '8dcfc9cf4d684b5baeaf00a053f28785',
    'client_secret' => 'b06d722dbe3042d6b8c1081ab7cf97df',
    'grant_type' => 'authorization_code',
    'redirect_uri' => 'http://www.lifein.com.br/instagram/feed.php',
);
if (isset($_GET['code'])) {
    $data['code'] = $_GET['code'];
}

if (!isset($_SESSION['access_token'])) {
    $ret = post_to_url("https://api.instagram.com/oauth/access_token", $data);
    $_SESSION = json_decode($ret, true);
    if (isset($_GET['code'])) {
        $_SESSION['code'] = $_GET['code'];
    }
    $token = $_SESSION['access_token'];
} else {
    $token = $_SESSION['access_token'];
}

//printrx($_SESSION);
//$json = file_get_contents("https://api.instagram.com/v1/users/self/feed?access_token=$token");
$json = file_get_contents('feed.json');
//print_r($json);die('oi');
$all = json_decode($json, true);
//printrx($all);
//die();
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/estilo.css">

        <!-- Optional theme -->
        <!--<link rel="stylesheet" href="css/bootstrap-theme.min.css">-->

        <!-- Latest compiled and minified JavaScript -->
        <script src="js/function.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row" ID="all" >

                <?php foreach ($all['data'] as $post) {
                   // $like =likes($post['likes']['data']);
                    //var_dump($like);
                    
                    ?>
                    <div class = "col-md-6 col-md-offset-3 box img-rounded" >
                    <!--<pre>--> 

                        <?php
//                        print_r($post);die();
                        ?>
                        <p ><?php echo utf8_decode($post['user']['full_name'] . " ( " . $post['user']['username'] . " )") ?>:</p>
                        <img id="<?php echo $post['id']; ?>" src="<?php echo $post['images']['thumbnail']['url'] ?>" class="img-rounded" alt="" /><br />
                        <p class="btn" onclick="newfoto('<?php echo $post['id'] ?>', '<?php echo $post['images']['thumbnail']['url'] ?>')" >Min</p>
                        <p class="btn" onclick="newfoto('<?php echo $post['id'] ?>', '<?php echo $post['images']['low_resolution']['url'] ?>')" >Med</p>
                        <p class="btn" onclick="newfoto('<?php echo $post['id'] ?>', '<?php echo $post['images']['standard_resolution']['url'] ?>')" >Max</p>
                        <br>
                        <br>
                        <p class="btn" id="like_<?php echo $post['id'] ?>" onclick="like('<?php echo $post['id'] ?>')" >S2</p>
                        <p ><b>Likes: </b><?php echo utf8_decode($post['likes']['count']) ?></p>

                        <p ><?php echo utf8_decode($post['caption']['text']) ?></p>

                        <p ><b>comments: </b><?php echo utf8_decode($post['comments']['count']) ?></p>
                        <?php if ($post['comments']['count'] > 0) {
                            ?>
                            <div class="comments img-rounded ">
                                <?php foreach ($post['comments']['data'] as $comment) { ?>
                                    <p ><?php echo utf8_decode($comment['from']['username']) ?>:<?php echo utf8_decode($comment['text']) ?></p>
                                <?php } ?>
                            </div>
                        <?php } ?>

                    </div>            

                <?php } ?>

            </div></div>
        
    </div>
    <p class="btn" style="width: 130px" onclick="pagination('<?php echo $all['pagination']['next_max_id'] ?>')" >Carregar mais</p>
</body>
</html>