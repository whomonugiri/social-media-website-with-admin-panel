<?php
require_once 'assets/php/functions.php';

if(isset($_SESSION['Auth'])){
echo "user is logged in";
$userdata = $_SESSION['userdata'];
echo "<pre>";
print_r($userdata);
}elseif(isset($_GET['signup'])){
    showPage('header',['page_title'=>'Pictogram - SignUp']);
    showPage('signup');
}elseif(isset($_GET['login'])){
    showPage('header',['page_title'=>'Pictogram - Login']);
    showPage('login');
}else{
    showPage('header',['page_title'=>'Pictogram - Login']);
    showPage('login');
}


showPage('footer');
unset($_SESSION['error']);
unset($_SESSION['formdata']);



