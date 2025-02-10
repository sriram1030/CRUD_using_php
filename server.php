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
        <h2 class="text-center">User Details</h2>
         <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Email Id</th>
                    <th>Password</th>
                </tr>

            </thead>
                
            <tbody>
            <tr>
                    <td>
                        <?php
                            $email_id= $_REQUEST['email'];
                            echo $email_id;
                        ?>
                    </td>

                    <td>
                        <?php
                            $password= $_REQUEST['password'];
                            echo $password;
                        ?>
                    </td>
                </tr>
            </tbody>
         </table>
    </div>




<script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>        
</body>
</html>

<?php
$servername="localhost";
$username="root";
$password="";
$database="users";

$conn=new mysqli($servername,$username,$password,$database);

if(!$conn)
{
    die("Error");
}
else{
    echo "connection successfull";
}
$sql="SELECT*FROM userslist";
$result =mysqli_query($conn,$sql);



echo "<table border='1' cellpadding='10' cellspacing='0'>";
echo "<tr><th>Email</th><th>Password</th></tr>";

echo "<tbody>";

while($row= mysqli_fetch_assoc($result))
{
    "<tr>";
     echo "<td>Email".$row['email']."</td>";
     echo "<td>Password".$row['password']."</td>";
    "</tr>";
}
echo "</tbody>";
echo "</table>";
?>