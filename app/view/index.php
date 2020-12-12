<?php 
include 'db_connect.php';
include 'views.php';

$result = $pdo->query('SELECT * FROM images');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Document</title>
    <style>
    form {
        margin-top: 200px;
        text-align: center;
    }

    .card {
      margin-top: 100px;
      margin-left: auto;
      margin-right: auto;
    }
    </style>
</head>
<body>

<form action="image.php" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleFormControlFile1">Example file input</label>
    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
    <input type="submit" name="upload" value="Загрузить">
  </div>
</form>
<?php foreach ($result as $row) { ?>
<div class="card" style="width: 18rem;">
  <img src="<?=$row['path']?>" class="card-img-top" alt="Изображение">
  <div class="card-body">
    <p class="card-text">Изображение №<?=$row['id']?></p>
    <p class="card-text">Просмотры:<?=$row['views']?></p>
  </div>
</div>
<?php } ?>
</body>
</html>