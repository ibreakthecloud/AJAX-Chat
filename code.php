<?php
session_start();

$code = $_GET['code'];
$url = 'https://github.com/login/oauth/access_token';
$client_id = '8f74c6a9b5f13e9b3b01';
$client_secret = '22384f334f4cefa95f5d67338075e5d5e8894f84';
// echo $code;

$postdata = http_build_query(
    array(
        'client_id' => $client_id,
        'client_secret' => $client_secret,
        'code' => $code
    )
);

$opts = array('http' =>
    array(
        'method'  => 'POST',
        'header'  => 'Content-type: application/x-www-form-urlencoded',
        'content' => $postdata
    )
);

$context = stream_context_create($opts);

$result = file_get_contents($url, false, $context);

$json_url = 'https://api.github.com/user?'.$result;

$options  = array('http' => array('user_agent'=> $_SERVER['HTTP_USER_AGENT']));
$context  = stream_context_create($options);
$response = file_get_contents($json_url, false, $context);
$response = json_decode($response);
if(isset($response->name))
{
    $_SESSION['name'] = $response->name;
    $_SESSION['imgURL'] = $response->avatar_url;
    $_SESSION['username'] = $response->login;
    $_SESSION['logged_in'] = '1';

    //opening db connection and Pushing Users
    $mysqli = new mysqli("localhost:3306","root","sudo","ajax-chat-db");
    if($mysqli->connect_error)
    {
        $_SESSION['name'] = $mysqli->connect_error;
    }

    //checking if user exists
    $sql_user_check = "SELECT * FROM ajax_chat_db_users WHERE username='".$_SESSION['username']."'";
    $usercheck = $mysqli->query($sql_user_check);
    // $_SESSION['name'] = $usercheck->num_rows;
    if ($usercheck->num_rows == 0) 
    {
    
    
    $sql_insert = "INSERT INTO ajax_chat_db_users (username, name, imgurl) VALUES ('".$_SESSION['username']."', '".$_SESSION['name']."', '".$_SESSION['imgURL']."')";   
        // $mysqli->query($sql_insert);
        if($mysqli->query($sql_insert) === true){
            // echo "Records inserted successfully.";
        } else{
            // echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
            $_SESSION['name'] = $mysqli->error;
        }
        $mysqli->close();
    }
        header('location:chat.php');
}
else
{
    header('location:index.php');
}







?>

