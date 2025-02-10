<?php
include "db.php";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];

    $sql_insert = "INSERT INTO users (email, phone_number) VALUES ('$email', '$phone_number')";

    if (mysqli_query($conn, $sql_insert)) {
        header("Location: ".$_SERVER['PHP_SELF']); // Refresh the page to show updated data
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

$sql_display_query= "SELECT * FROM users";
$sql_display_result= mysqli_query($conn, $sql_display_query);
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
    <h2 class="text-center text-white">User Details</h2>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Add User Data
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                    <button type="button" class="close ms-4" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <!-- Form with Submit Button Inside -->
                    <form method="POST" action="">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control" type="text" name="email" id="email" required>

                        <label class="form-label" for="phone_number">Phone Number</label>
                        <input class="form-control" type="tel" name="phone_number" id="phone_number" required>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <table class="table table-bordered table-striped mt-4">
        <thead class="table-dark">
            <tr>
                <th>Id</th>
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
                echo "<td>".$row['Id']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "<td>".$row['phone_number']."</td>";
                echo "</tr>";
            }
        }
        ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>      

</body>
</html>
