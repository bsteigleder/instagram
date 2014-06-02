<?php 

function post_to_url($url, $data) {
    
   $fields = '';
   
   foreach($data as $key => $value) { 
      $fields .= $key . '=' . $value . '&'; 
   }
   rtrim($fields, '&');

   $post = curl_init();
   
   curl_setopt($post, CURLOPT_URL, $url);
   curl_setopt($post, CURLOPT_POST, count($data));
   curl_setopt($post, CURLOPT_POSTFIELDS, $fields);
   curl_setopt($post, CURLOPT_RETURNTRANSFER, 1);

   $result = curl_exec($post);
   
   curl_close($post);
   return $result;
}
function likes($likes){
    return TRUE;
    // a api do instagram nao retorna todos os likes :(
    //printrx($_SESSION);
    foreach ($likes as $like){
        if($_SESSION['user']['id']==$like['id'])
            return TRUE;
        //printrx($like);
    }
    return false;
}

//error_reporting();
function newLocation($url) {
    
    $url = BASE . DS . $url;
    //echo '<script>window.location.replace(' . $url . ');</script>';
    
    header("Location: $url");
}
function  pegarPrimeiraPalavra($string){
    return current( str_word_count( $string , 2 ) );
}
function linkSite($url) {
    
    $url = BASE . DS . $url;
    //echo '<script>window.location.replace(' . $url . ');</script>';
    
    return $url;
}
function printr($arr) {
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
}

function printrx($arr) {
    printr($arr);
    die();
}

function hr() {
    echo "<br><hr style='clear:both;' ><br>";
}

function br($str) {
    echo "<br>";
    echo $str;
    echo "<br>";
}

function alert($str) {
    echo '<script>alert("' . $str . '")</script>';
}

function url($str) {
    echo "<script>window.location.replace('" . $str . "');</script>";
}

function array_order($arr, $index) {
    $final = array();
    foreach ($arr as $item) {
        $final[$item[$index]] = $item;
    }
    return $final;
}

function retornaExt($arquivo) {
    $ext = array('htaccess', 'htm', 'zip', 'sql', 'log', 'html', 'fhx', 'eps', 'msi', 'exe', 'pdf', 'xml', 'csv', 'doc', 'docx', 'dll', 'dat', 'cfg', 'cdi', 'cab', 'bin', 'bat', 'bak', 'bmp', 'avi', 'asp', 'asf', 'arj', 'rar', 'php', 'css', 'js', 'php', 'jpg', 'gif', 'png');
    $arquivo = substr($arquivo, -4);
    $temp = strrchr($arquivo, '.');
    if (empty($temp))
        return false;
    $temp = str_replace('.', '', $temp);
    if (in_array($temp, $ext)) {
        return TRUE;
    } else
        return false;
}

?>