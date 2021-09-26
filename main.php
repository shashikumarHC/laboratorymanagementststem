<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main">
        <div class="left">
            <h1>My Library</h1>
        </div>
        <form action="" method="post">
        <div class="right">
            <h1>Login</h1>
            <div class="name" >
                <label for="name">Name</label>
                <input type="text" name="name">
            </div>
            <div class="password">
                <label for="password">password</label>
                <input type="password" name="password">
            </div>
            <div class="but">
                <button type="submit">submit</button>
            </div>
        </div>
<?php
$mysql=new mysqli("localhost","root","","acharya") or die(mysqli_error($mysql));
$name="";
$password="";
$host="";
$a="";
            if($_SERVER['REQUEST_METHOD']=="POST")
            
            {
                $name=$_POST['name'];
                $password=$_POST['password'];
            }
            $result=$mysql->query("SELECT * FROM uname WHERE fname LIKE '%$name%'") or "NULL";
            if(!empty($name)) {
            if($result-> num_rows> 0)
                {
                    while($row = $result->fetch_assoc())
                    {
                        $a=$row["fname"];
                    }
                }
            if($name=='shashi'&& $password==1234)
            {
                    header('Location:lib.php');
                    $host="admin";
            }
            elseif($a==$name && $password==1234)
            {
                header('Location:lab.php');
                $host="user";
            }
            elseif($a!=$name || $password!=1234){
                header('Location:askadmin.php');
            }
session_start();
$_SESSION['host']=$host;
            
?>
<?php } ?>

        </form>
    </div>
</body>
</html>