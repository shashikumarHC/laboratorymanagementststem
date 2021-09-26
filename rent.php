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
            <input placeholder="enter book number"  type="text" name="Bnum">
        </div>
        <div class="Bday">
            <label for="Bday">Num of days</label>
            <input type="date" name="Bday">
        </div>
        <div class="but">
            <button type="submit">Take rent</button>
        </div>
        <?php
    $bnum='';
    $date='';
    $mysql=new mysqli("localhost","root","","acharya") or die(mysqli_error($mysql));
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $bnum=$_POST['Bnum'];
        $date=$_POST['Bday'];
        $mysql->query("INSERT INTO rent (booknum,dates) values('$bnum','$date')") or die(mysqli_error($mysql));
    }
    ?>
        </form>
        </div>
</body>
</html>