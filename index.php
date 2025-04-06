<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Home</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-3 mr-auto p-3 text-center">
                <img class="img-fluid" src="Skeleton.png" alt="SkeleLogo" />
            </div>
            <div class="d-flex col-3 justify-content-end align-items-center">
                <form method="post" action=""> <!-- this will post to index.php and clear session -->
                    <button class="btn btn-secondary" name="logout" value="logout" type="button">Logout</button>
                </form>
            </div>
        </div>

        <div class="row border">
            <div class="col-8 p-3">
                <h3>Username's Notes</h3>
            </div>
            <div class="d-flex col-4 p-3 justify-content-end">
                <div class="btn-group pl-auto" role="group">
                    <button class="btn btn-success" type="button"><i class="fas fa-plus"></i></button>
                    <button class="btn btn-danger" type="button" disabled><i class="fas fa-trash"></i></button>
                </div>
            </div>
        </div>

        <div class="row m-3">
            <div class="col-lg-12 col-12">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th></th>
                            <th class="text-center">Title</th>
                            <th class="text-center">Last Modified</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td class="text-center"><a href="#">Ur Mom's Jimbob</a></td>
                            <!-- clicking on the link will lead you to the edit page -->
                            <td class="text-center">Some datetime here</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>


    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>