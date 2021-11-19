<?php
require_once 'assets/php/functions.php';

if(isset($_GET['signup'])){
    showPage('header',['page_title'=>'Pictogram - SignUp']);
    showPage('signup');
}


showPage('footer');
unset($_SESSION['error']);
unset($_SESSION['formdata']);



