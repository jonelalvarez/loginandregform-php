<?php
require_once 'core/models.php';
require_once 'core/handleForms.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User | Gnarly! Clothing Shop</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootsrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <!-- for sweetalert2 and js -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php $getUserByID = getUserByID($pdo, $_GET['user_id']); ?>
    <div class="home-page container mt-5">

        <div class="main-card card col-md-8 mx-auto mt-4">
            <div class="card-header" style="background-color: black; color: #fedd01;">

                <h5><i class="fas fa-user-edit"></i>&nbsp;Edit User</h5>


            </div>
            <div class="card-body">
                <form
                    action="core/handleForms.php?user_id=<?php echo $_GET['user_id']; ?>&user_id=<?php echo $_GET['user_id']; ?>"
                    method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username"
                            value="<?php echo ($getUserByID['username']); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email"
                            value="<?php echo ($getUserByID['email']); ?>">
                    </div>

                    <div class="addButton mt-4 d-grid">
                        <input type="submit" class="btn" style="background-color:black; color: #fedd01"
                            name="editUserBtn" value="Update">
                    </div>
                </form>
            </div>
        </div>
</body>

</html>