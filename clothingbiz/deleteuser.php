<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User | Gnarly! Clothing Shop</title>
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
    <div class="delete-page col-md-8 mx-auto">
        <div class="info-card card mt-4 mb-3" style="width: 100%;">
            <div class="card-body">
                <h3>Are you sure you want to delete this user?</h3>

                <h2>User: <?php echo $getUserByID['username']; ?></h2>
                <h2>Email: <?php echo $getUserByID['email']; ?></h2>
                <h2>Date Added: <?php echo $getUserByID['date_added'] ?></h2>


                <form action="core/handleForms.php?user_id=<?php echo $_GET['user_id']; ?>" method="POST">
                    <input class="btn btn-sm"
                        style="background-color:black; color: #fedd01; float: right; margin-right: 10px;" type="submit"
                        name="deleteUserBtn" value="Delete">
                </form>
            </div>
        </div>
    </div>
    </div>


</body>

</html>