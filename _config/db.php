<?php
    
    $db = new PDO('mysql:host=localhost;dbname=webdev;charset=utf8', 'root', 'root');
    $mysqli = new mysqli("localhost", "root", "root", "webdev");
    $mysqli->set_charset("utf8");
?>