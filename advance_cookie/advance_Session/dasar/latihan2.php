<?php 
   
    //panggil cookie nya 
    echo $_COOKIE['nama'];
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
        <li><img src="<?php echo $_GET["foto"] ?>"></li>
        <li><?php echo $_GET["nama"] ?></li>
        <li><?php echo $_GET["umur"] ?></li>
    </ul>
    <a href="belajar.php">kembali</a>
</body>
</html>