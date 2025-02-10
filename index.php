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


    <h1 class="container mt-5 text-center">Welcome to Login Page</h1>
    <h6 class="container mt-5 text-center">You are about to login as Super Admin!</h6>

    <div class="container mt-4" id="form-container">
        <form action="server.php" method="POST">
             <label for="email" class="form-label">Email</label>
             <input class="form-control" type="email" name="email" id="email" required>

             <label for="password" class="form-label">Password</label>
             <input class="form-control" type="password" name="password" id="password" required>
             
             <button class="mt-3" id="send-btn">Submit</button>
        </form>
    </div>

    <div class="container mt-3" id="info">
        <div class="row">

            <h4 class="text-center">System Info</h4>
            <div class="col mt-4 flex-wrap gap-3" id="details">
                <p class="border p-3">System Name:
                    <?php
                        echo php_uname();
                    ?>
                </p>

                <p class="border p-3">Php Version:
                    <?php
                        echo phpversion();
                    ?>
                </p>

                <p class="border p-3">Server Software:
                    <?php
                        echo $_SERVER['SERVER_SOFTWARE'];
                    ?>
                </p>

                <p class="border p-3">Server Name:
                    <?php
                        echo $_SERVER['SERVER_NAME'];
                    ?>
                </p>

                <p class="border p-3">Document Root
                    <?php
                        echo $_SERVER['DOCUMENT_ROOT'];
                    ?>
                </p>
            </div>
        </div>
    </div>






<script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>    
</body>
</html>