<?php
require_once 'core/models.php';
require_once 'core/handleForms.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <title>Login | Gnarly! Clothing</title>
    <!-- <style>
   
    table, th, td {
        border:1px solid black;
    }
    .card {
        margin-top: 150px;
        border-radius: 36px;
        border: 5px solid black;
        height: 470px;
        max-width: 450px;
    }
    .card-footer {
        background-color: black;
        margin-top: 30px;
        border-bottom-left-radius: 29px !important; 
        border-bottom-right-radius: 29px !important;
    }   
    p{
        color: white;
        font-weight: bold;
    }
    a{
        color: #fedd01;
        font-weight: bolder;
    }
    .form-control{
        border: 2px solid black;
    }
    .btn{
        margin-bottom: -11px;
        margin-top: 12px;
    }
    label{
        padding-right: 100%;
        font-weight: bolder;
    }
    .btn {
        background-color: black;
        color:#fedd01
    }
    .btn:hover
    {
        background-color: #fedd01;
        color: black;
    }
    </style> -->
</head>

<body>
    <?php
    if (isset($_SESSION['message'])) {
        echo "<script>
        Swal.fire({
            icon: 'info',
            title: 'Notice!',
            text: '" . $_SESSION['message'] . "',
            confirmButtonColor: 'black',
            confirmButtonText: 'OK',
        });
    </script>";
        unset($_SESSION['message']);
    }
    ?>
    <div class="login-page">
        <div class="card text-center col-md-4 mx-auto">
            <!-- <div class="card-header">
        Fill in the input fields below
        </div> -->
            <div class="card-body">
                <h5 class="card-title" name="header">Welcome! Login first <span style="color: #fedd01;">G!</span></h5>

                <img src="images/userIcon.png" alt="user" class="card-title card-img-top mt-3"
                    style="width: 70px; height: 70px;">
                <form action="core/handleForms.php" method="POST">

                    <div class="col-md-12 mx-auto mt-3">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Enter username">
                    </div>

                    <div class="col-md-12 mx-auto mt-3">
                        <label for="username">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter password">
                    </div>
                    <div class="col-md-12 mt-3">
                        <input type="submit" class="btn w-50" name="loginUserBtn" value="Login">
                    </div>


            </div>
            <div class="card-footer col-md-12 mx-auto">
                <p>Don't have an account? Register <a href="register.php">here</a> G!</p>
            </div>
            </form>
        </div>
    </div>


    <!-- <h1>Login Now!</h1>
    
        <p>
            
            <input type="text" name="username">
        </p>
        <p>
            
            <input type="password" name="password">
            <input type="submit" name="loginUserBtn">
        </p>
    </form> -->
</body>

</html>