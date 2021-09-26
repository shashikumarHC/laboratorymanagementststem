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
            <button class="but"><a href="lib.php">Back</a></button>
        </div>
    </header>
 
    <div class="box2">
    <form action="" method="post" class="ab">
            <div class="Bname">
                <label for="Bname">Book Name</label>
                <input type="text"name="Bname">
            </div>
            <div class="Bnum">
                <label for="Bnum">Book number</label>
                <input type="text" name="Bnum">
            </div>
            <div class="but">
                <button type="submit">Add</button>
            </div>
     
            
    
    <?php
    $bookname='';
    $booknum='';
    $mysql=new mysqli("localhost","root","","acharya") or die(mysqli_error($mysql));
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $bookname=$_POST['Bname'];
        $booknum=$_POST['Bnum'];
        $mysql->query("INSERT INTO user (booknum,bookname) values('$booknum','$bookname')") or die(mysqli_error($mysql));
    }
    ?>
    </form>
    </div>
</body>
</html>