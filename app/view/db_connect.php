<?php

try {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=images', $user = 'homestead', $pass = 'secret');

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}