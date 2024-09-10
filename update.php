<?php
include 'DatabaseFormValid.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (
        isset(
        $_POST['id'],
        $_POST['firstname'],
        $_POST['lastname'],
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
        $id = $_POST['id']; 
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $dob = $_POST['dob'];
        $age = $_POST['age'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $degree = $_POST['degree'];
        $departments = $_POST['departments'];


        $sql = "UPDATE form SET 
                    firstname='$firstname', 
                    lastname='$lastname', 
                    gender='$gender', 
                    email='$email', 
                    dob='$dob', 
                    age='$age', 
                    address='$address', 
                    phone='$phone', 
                    degree='$degree', 
                    departments='$departments' 
                WHERE id='$id'"; // 

        if (mysqli_query($conn, $sql)) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }
}
mysqli_close($conn);
?>