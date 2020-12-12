<?php
include 'db_connect.php';
//счетчик просмотров
$stmt = $pdo->query('SELECT views FROM images');
$count = $stmt->fetch();
$count = $count['views'];

if(!empty($_SERVER['REQUEST_URI'])) {
    $count++;
    $sql = "UPDATE images SET views=?";
    $pdo->prepare($sql)->execute([$count]);
  }