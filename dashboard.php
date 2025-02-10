<?php
include "db.php";

// Handle form submission for adding a new user
if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST['edit_user'])) {
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

// Handle form submission for editing a user
if (isset($_POST['edit_user'])) {
    $Id = $_POST['Id'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];

    // Update user in database
    $sql_update = "UPDATE users SET email='$email', phone_number='$phone_number' WHERE Id='$Id'";

    if (mysqli_query($conn, $sql_update)) {
        header("Location: ".$_SERVER['PHP_SELF']);  // Refresh to see updated data
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Handle deletion of a user
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    // Delete user from database
    $sql_delete = "DELETE FROM users WHERE id='$delete_id'";

    if (mysqli_query($conn, $sql_delete)) {
        // Reset AUTO_INCREMENT to 1 after deleting all records
        $sql_reset_auto_increment = "ALTER TABLE users AUTO_INCREMENT = 1";
        mysqli_query($conn, $sql_reset_auto_increment);

        header("Location: ".$_SERVER['PHP_SELF']);  // Refresh to see updated data
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}


$sql_display_query = "SELECT * FROM users";
$sql_display_result = mysqli_query($conn, $sql_display_query);
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

    <!-- Modal FOR ADD -->
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

    <!-- Modal FOR EDIT -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit User</h5>
                    <button type="button" class="close ms-4" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form method="POST" action="">
                        <input type="hidden" name="Id" id="edit-id">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control" type="text" name="email" id="edit-email" required>

                        <label class="form-label" for="phone_number">Phone Number</label>
                        <input class="form-control" type="tel" name="phone_number" id="edit-phone_number" required>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="edit_user">Save changes</button>
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
                <th>Actions</th>
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
                echo "<td>
                <button class='btn btn-primary me-2' data-toggle='modal' data-target='#editModal' 
                data-id='".$row['Id']."' data-email='".$row['email']."' data-phone='".$row['phone_number']."'>Edit</button>
                <a href='?delete_id=".$row['Id']."' class='btn btn-danger'>Delete</a>
              </td>";
                echo "</tr>";
            }
        }
        ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Populate the edit modal with the user data
    $('#editModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var userId = button.data('id');
        var userEmail = button.data('email');
        var userPhone = button.data('phone');

        var modal = $(this);
        modal.find('#edit-id').val(userId);
        modal.find('#edit-email').val(userEmail);
        modal.find('#edit-phone_number').val(userPhone);
    });
</script>

</body>
</html>
