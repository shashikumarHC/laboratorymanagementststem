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
    <div class="box3">
                <form action="" method="post">
                <div class="Bnum">
                    <h2>delete book</h2>
            <label for="Bnum">Book number</label>
            <input type="text" placeholder="enter book number" name="Bnum">
        </div>
        <div class="but">
            <button type="submit">Delete permnently</button>
        </div>
        <?php
      $mysql=new mysqli("localhost","root","","acharya") or die(mysqli_error($mysql));
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $booknum=$_POST['Bnum'];
        $mysql->query("DELETE FROM user WHERE booknum LIKE '%$booknum%' ") or die(mysqli_error($mysql));
        $mysql->query("DELETE FROM rent WHERE booknum LIKE '%$booknum%' ") or die(mysqli_error($mysql));
    }

    ?>    
     <h1>all book</h1>
    <table bordercolor="black">
            <tr bordercolor="black">
                <th>book num</th>
                <th>book name</th>
            </tr>
    <?php
             $mysql=new mysqli("localhost","root","","acharya") or die(mysqli_error($mysql));
             $result=$mysql->query("SELECT * FROM user") or die(mysqli_error($mysql));
                if($result-> num_rows> 0)
                {
                    while($row = $result->fetch_assoc())
                    {
                        echo "<tr><td>".$row["booknum"]."</td><td>".$row["bookname"]."</td></tr>";
                    }
                    echo "</table>";
                }
             ?> 
             <table bordercolor="black">
            <tr bordercolor="black">
                <th>rent book num</th>
                <th>date</th>
            </tr>
            <?php
             $mysql=new mysqli("localhost","root","","acharya") or die(mysqli_error($mysql));
             $rent=$mysql->query("SELECT * FROM rent") or die(mysqli_error($mysql));
                if($rent-> num_rows> 0)
                {
                    while($row = $rent->fetch_assoc())
                    {
                        echo "<tr><td>".$row["booknum"]."</td><td>".$row["dates"]."</td><td>";
                    }
                    echo "</table>";
                }
                ?> 
             </form>
    </div>
</body>
</html>