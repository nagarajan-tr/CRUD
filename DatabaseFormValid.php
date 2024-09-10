<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "register";

$conn = mysqli_connect($server, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (
        isset(
        $_POST['fname'],
        $_POST['lname'],
        $_POST['gender'],
        $_POST['email'],
        $_POST['dob'],
        $_POST['age'],
        $_POST['address'],
        $_POST['phone'],
        $_POST['degree'],
        $_POST['departments']
    )
    ) {

        $firstname = $_POST['fname'];
        $lastname = $_POST['lname'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $dob = $_POST['dob'];
        $age = $_POST['age'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $degree = $_POST['degree'];
        $departments = $_POST['departments'];

        $sql = "INSERT INTO form (firstname,lastname,gender,email,dob,age,address,phone,degree,departments)
        VALUES ('$firstname','$lastname','$gender','$email','$dob','$age','$address','$phone','$degree','$departments')";

        if (mysqli_query($conn, $sql)) {
            // echo "New record created successfully !";
            header('Location: FormValidation.php');
        } else {
            echo "Error: " . $sql . " " . mysqli_error($conn);
        }
        mysqli_close($conn);
    } else {
        echo "Data is not set";
    }
}
?>