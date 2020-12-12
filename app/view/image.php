<?php
include 'db_connect.php';

if (isset($_POST['upload']) && isset($_FILES['image'])) {

    $imgName = $_FILES['image']['name'];
    $imgSize = $_FILES['image']['size'];
    $tmpName = $_FILES['image']['tmp_name'];

    if ($imgSize > 155000) {
        $error = 'Файл слишком большой';
        header("Location: index.php/$error");
    } 
    //получаем расширение
    $ext = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
    $allExt = ['png', 'jpg', 'jpeg'];

    if (!in_array($ext, $allExt)) {
        $error = 'Этот тип файла не поддерживается';
        header("Location: index.php/$error");
    }

    $imgName = uniqid("image-", true).'.'.$imgName;
    $path = 'images/'.$imgName;
    move_uploaded_file($tmpName, $path);
    //добавляем изображение в бд
    $sql = "INSERT INTO images (path) VALUES (?)";
    $pdo->prepare($sql)->execute([$path]);
    header("Location: index.php");

} 