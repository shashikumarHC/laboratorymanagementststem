<?php
    session_start();
    $host=$_SESSION['host'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
        <div class="head">
            <h1>
                MyLibrary
            </h1>
            <button class="but"><a href="<?php 
             if($host=="admin")
             {
                 ?> lib.php<?php ;
             }
             else{
                 ?>lab.php <?php ;
             }
            ?>">Back</a></button>
        </div>
    </header>
    <div class="box2">
        <form action="" method="post">
        <div class="Bnum">
            <label for="Bnum">Book number</label>
            <input type="text" placeholder="enter book number" name="Bnum">
        </div>
        <div class="but">
            <button type="submit">Return</button>
        </div>
        <?php
    $booknum='';
    $mysql=new mysqli("localhost","root","","acharya") or die(mysqli_error($mysql));
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $booknum=$_POST['Bnum'];
        $mysql->query("DELETE FROM rent WHERE booknum LIKE '%$booknum%' ") or die(mysqli_error($mysql));
    }
    ?>
        </form>
        </div>
</body>
</html>