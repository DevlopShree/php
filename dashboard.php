<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}
?>

<?php
if(isset ($_POST['name'])){
    include 'db.php'; // Use the existing database connection

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $phone = trim($_POST['phone']);
        $age = trim($_POST['age']);
        $gender = trim($_POST['gender']);
    }

    $sql = "INSERT INTO `st_list` (`Name`, `Email`, `Phone`, `Age`, `Gender`, `Data`) VALUES (?, ?, ?, ?, ?, current_timestamp())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssis", $name, $email, $phone, $age, $gender);

    if($stmt->execute()){
        echo "Successfully inserted"; // Added success message
    }
    else{
        echo "ERROR: $sql <br> $conn->error"; 
    }

    $stmt->close();
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
        <p>Enter your data and submit to participate in the Web Design competition</p>
    </div>

    <form action="dashboard.php" method="post"> <!-- Corrected the form action -->
        <label for="name"> Name</label>
        <input type="text" name="name" id="name" placeholder="Enter your name" required> <!-- Added required attribute -->

        <label for="email">email</label>
        <input type="email" name="email" id="email" placeholder="Enter your email" required> <!-- Added required attribute -->

        <label for="phone">phone</label>
        <input type="tel" name="phone" id="phone" placeholder="Enter your phone" required> <!-- Added required attribute -->

        <label for="age">Age</label>
        <input type="number" name="age" id="age" placeholder="Enter your age" required> <!-- Added required attribute -->

        <label class="op" for="gender">Gender</label>
        <input type="text" name="gender" id="gender" placeholder="Enter your gender" required> <!-- Added required attribute -->

        <div class="submit">
            <button type="submit">Submit</button>
        </div>
    </form>
    <script src="script.js"></script>

</body>
</html>


