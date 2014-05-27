
<?php
//$json=file_get_contents('https://api.instagram.com/v1/users/self/feed?access_token=17674007.f59def8.6697be07923145c4a1008764ec939012');
$json = file_get_contents('feed.json');

$all = json_decode($json, true);
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

                <?php foreach ($all['data'] as $post) { ?>
                    <div class = "col-md-6 col-md-offset-3 box img-rounded" >
                    <!--<pre>--> 

                        <?php
//                        print_r($post);die();
                        ?>
                        <p ><?php echo utf8_decode($post['caption']['from']['username']) ?>:</p>
                        <img src="<?php echo $post['images']['thumbnail']['url'] ?>" class="img-rounded" alt="" /><br />
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
</body>
</html>