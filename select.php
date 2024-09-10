    <?php 
    include 'DatabaseFormValid.php';

    $sql = "SELECT id,firstname,lastname,gender,email,dob,age,address,phone,degree,departments FROM form";
    $result = $conn->query($sql);

    if($result && $result->num_rows>0){
        while($row = $result->fetch_assoc()){
            echo "<tr>";
            echo "<td>".$row["id"]."</td>";
            echo "<td>".$row["firstname"]."</td>";
            echo "<td>".$row["lastname"]."</td>";
            echo "<td>".$row["gender"]."</td>";
            echo "<td>".$row["email"]."</td>";
            echo "<td>".$row["dob"]."</td>";
            echo "<td>".$row["age"]."</td>";
            echo "<td>".$row["address"]."</td>";
            echo "<td>".$row["phone"]."</td>";
            echo "<td>".$row["degree"]."</td>";
            echo "<td>".$row["departments"]."</td>";
            echo "<td><button id='edit' class='btn btn-success'>Edit</button></td>";
            echo "<td><button id='delete' class='btn btn-danger'>Delete</button></td>";
            echo "</tr>";
        }
    } else {
        echo "Does not set";
    }

    ?>