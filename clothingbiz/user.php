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
    <title>User Management | Gnarly! Clothing Shop</title>
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
    <!-- main header -->
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-light" style="background-color: black;">
            <div class="container">
                <!-- left items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="index.php" role="button">
                            <img src="images/g.png" alt="logo" class="card-title card-img-top"
                                style="width: 50px; height: 50px;">
                        </a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block mt-3">
                        <a href="index.php" class="nav-link" style="color: #fedd01;">Home</a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block mt-3">
                        <a href="user.php" class="nav-link" style="color: #fedd01;">View Users</a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block mt-3">
                        <a href="#" class="nav-link" style="color: #fedd01;">About us</a>
                    </li>
                </ul>

                <!-- right side-->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-circle fa-lg" style="color: #fedd01;"></i>
                            <?php if (isset($_SESSION['username'])) { ?>
                                <span
                                    style="color: #fedd01; margin-left: 5px;"><?php echo ($_SESSION['username']); ?></span>
                            <?php } ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">

                            <?php if (isset($_SESSION['username'])) { ?>
                                <a class="dropdown-item" href="core/handleForms.php?logoutAUser=1"><i
                                        class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Sign out</a>
                            <?php } else {
                                echo "<h1>No user logged in</h1>";
                            } ?>
                        </div>
                    </li>

                </ul>

            </div>
        </nav>
    </div>

    <?php
    if (isset($_SESSION['message'])) {
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Nice!',
            text: '" . $_SESSION['message'] . "',
            confirmButtonColor: 'black',
            confirmButtonText: 'OK',
        });
    </script>";
        unset($_SESSION['message']);
    }
    ?>

    <div class="col-md-8 card mx-auto mt-5">
        <div class="card-header" style="background-color: black; color: #fedd01;">
            <h2 class="text-center">User Management</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">User ID</th>
                        <th class="text-center">Username</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Date Added</th>
                        <th class="text-center">Last Modified</th>
                        <th class="text-center">Author</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php $getAllUsers = getAllUsers($pdo); ?>
                    <?php foreach ($getAllUsers as $row) { ?>
                        <tr>
                            <td class="text-center"><a
                                    href="viewuser.php?user_id=<?php echo $row['user_id']; ?>"><?php echo $row['user_id']; ?>
                            </td>
                            <td class="text-center"><?php echo ($row['username']); ?></td>
                            <td class="text-center"><?php echo ($row['email']); ?></td>
                            <td class="text-center"><?php echo ($row['date_added']); ?></td>
                            <td class="text-center"><?php echo ($row['last_modified']); ?></td>
                            <td class="text-center"><?php echo ($row['author']); ?></td>
                            <td class="text-center">
                                <a href="edituser.php?user_id=<?php echo $row['user_id']; ?>" class="btn btn-sm"
                                    style="background-color: black; color: #fedd01;">Edit</a>
                                <a href="deleteuser.php?user_id=<?php echo $row['user_id']; ?>" class="btn btn-sm"
                                    style="background-color: black; color: #fedd01;">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>







</body>

</html>