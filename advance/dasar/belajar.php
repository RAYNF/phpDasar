<?php 
if(isset($_POST["submit"])){
    if($_POST["username"]=="admin"&& $_POST["password"]=="123"){
        header("Location: latihan2.php");
        exit;
    }
    else{
        $error = true;
    }
}
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
    <form action="" method="post">
        <li>
            <label for="username">nama</label>
            <input type="text" name="username" id="username">
        </li>
        <li>
            <label for="password">password</label>
            <input type="password" name="password" id="password">
        </li>
        <li>
            <button name="submit" type="submit">kirim</button>
        </li>
        
    </form>
    </ul>

    <?php if(isset($error)): ?>
    <p style="color: red;">username dan password salah</p>
    <?php endif?>
    
</body>
</html>