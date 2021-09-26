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
            <button class="but"><a href="main.php">Back</a></button>
        </div>
    </header>
    <div class="box2">
        <h2 style="color: white;font-size:40px;">Please enter valid user "name" or "password" or</h2> 
        <h2 style="color:white;font-size:40px; ">Enter your name below admin will add you soon</h2>
        <form action="" method="post">
        <div class="Bnum">
        <label for="uname">Name</label>
        <input type="text" placeholder="enter your name" name="uname">
    </div>
    <div class="but">
        <button type="submit">Ask admin</button>
    </div>
    <?php 
    $uname='';
        $mysql=new mysqli("localhost","root","","acharya") or die(mysqli_error($mysql));
        if($_SERVER['REQUEST_METHOD']=="POST")
        {
            $uname=$_POST['uname'];
            $mysql->query("INSERT INTO askadmin (name) values('$uname')") or die(mysqli_error($mysql));
        }
        
    ?>
        </form>
    </div>
</body>
</html>