<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operations</title>
    <link rel="stylesheet" href="assets/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>


    <h1 class="container mt-5 text-center text-white">Welcome to Login Page</h1>
    <h6 class="container mt-5 text-center text-white">You are about to login as Super Admin!</h6>

    <div class="container mt-4" id="form-container">
        <form action="dashboard.php" method="POST">
             <label for="email" class="form-label">Email</label>
             <input class="form-control" type="email" name="email" id="email" required>

             <label for="password" class="form-label mt-2">Password</label>
             <input class="form-control" type="password" name="password" id="password" required>
             
             <button class="mt-3" id="send-btn">Submit</button>
        </form>
    </div>

    <p class="container mt-5 text-center text-white">Page was Designed by Sriram</p>

<script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>    
</body>
</html>