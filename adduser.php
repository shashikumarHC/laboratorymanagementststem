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
        <form action="" method="post">
        <div class="Bnum">
        <label for="uname">User Name</label>
        <input type="text" placeholder="enter user name" name="uname">
    </div>
    <div class="but">
        <button type="submit">Add User</button>
    </div>
    <?php 
    $uname='';
        $mysql=new mysqli("localhost","root","","acharya") or die(mysqli_error($mysql));
        if($_SERVER['REQUEST_METHOD']=="POST")
        {
            $uname=$_POST['uname'];
            $mysql->query("INSERT INTO uname (fname) values('$uname')") or die(mysqli_error($mysql));
            $mysql->query("DELETE  FROM  askadmin WHERE name LIKE '%$uname%' ") or die(mysqli_error($mysql));
        }
        
    ?>
     <table bordercolor="black">
            <tr bordercolor="black">
                <th>Users Name</th>
            </tr>
    <?php
             $result=$mysql->query("SELECT * FROM uname") or die(mysqli_error($mysql));
                if($result-> num_rows> 0)
                {
                    while($row = $result->fetch_assoc())
                    {
                        echo "<tr><td>".$row["fname"]."</td></tr>";
                    }
                    echo "</table>";
                }
             
             ?>
    <table bordercolor="black">
            <tr bordercolor="black">
                <th>User Request</th>
            </tr>
    <?php
        $result=$mysql->query("SELECT * FROM askadmin") or die(mysqli_error($mysql));
        if($result-> num_rows> 0)
        {
            while($row = $result->fetch_assoc())
            {
                echo "<tr><td>".$row["name"]."</td></tr>";
            }
            echo "</table>";
        }
        ?>
        </form>
    </div>
</body>
</html>