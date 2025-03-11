<?php
if(isset ($_POST['name'])){
    // Database Connection
    $servername = "localhost";
    $username = "root";
    $password = "";

    $conn = mysqli_connect($servername, $username, $password);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // echo "Connected successfully";

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $age = $_POST['age'];
        $gender = $_POST['gander'];

    }

    $sql = "INSERT INTO `wd participant`.`web_competition` (`Name`, `Email`, `Phone`, `Age`, `Gender`, `Data`) VALUES ('$name', '$email', '$phone', '$phone', '$gender', current_timestamp());";

    // echo $sql;

    if($conn->query($sql) == true){
        // echo "Successfully inserted";
    }
    else{
        echo "ERROR: $sql <br> $conn->error"; 
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project 1</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h3>Welcome to my Data Base</h3>
        <p>Enter your data and submit to participate Wev Design competition</p>
    </div>

    
    <form action="index.php" method="post">
        <label for="name"> Name</label>
        <input type="text" name="name" id="name" placeholder="Enter your name">

        <label for="email">email</label>
        <input type="email" name="email" id="email" placeholder="Enter your email">

        <label for="phone">phone</label>
        <input type="tel" name="phone" id="phone" placeholder="Enter your phone">

        <label for="age">Age</label>
        <input type="number" name="age" id="age" placeholder="Enter your age">

        <label class="op" for="gander">Gander</label>
        <input type="text" name="gander" id="gander" placeholder="Enter your gander">

        <div class="submit">
            <button type="submit">Submit</button>
        </div>
    </form>
    <script src="script.js"></script>

</body>
</html>


