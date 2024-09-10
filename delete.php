<?php
include 'DatabaseFormValid.php';


if (isset($_POST['email'])) {
    $id = $_POST['email'];
        $sql = "DELETE FROM form WHERE email='" . $_POST["email"] . "'";
        if (mysqli_query($conn, $sql)) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
        mysqli_close($conn);
}
?>