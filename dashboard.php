<?php
include "db.php";

$sql_display_query= "SELECT*FROM users";

$sql_display_result= mysqli_query($conn,$sql_display_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <link rel="stylesheet" href="assets/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>


    <div class="container mt-5">
        <h2 class="text-center text-white" >User Details</h2>
         <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Email Id</th>
                    <th>Phone Number</th>
                </tr>

            </thead>
                
            <tbody>
              <?php
                if(mysqli_num_rows($sql_display_result) > 0)
                {
                    while($row=mysqli_fetch_assoc($sql_display_result))
                    {
                        echo "<tr>";
                        echo "<td>".$row['email']."</td>";
                        echo "<td>".$row['phone_number']."</td>";
                        echo "</tr>";
                    }
                }
              ?>
            </tbody>
         </table>
    </div>




<script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>        
</body>
</html>
