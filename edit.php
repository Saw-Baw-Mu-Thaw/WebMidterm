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
    <title>Edit</title>
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

        <div class="row">
            <div class="col-12 p-3">
                <form method="post" action=""> <!-- send to edit.php -->
                    <span class="d-flex justify-content-start">
                        <input class="border-0 h2 form-control" type="text" name="title" id="title"
                            placeholder="Ur Mom's Jimbob" />
                        <button class="btn btn-success justify-self-end" type="button"><i
                                class="far fa-save"></i></button>
                    </span>

                    <hr />
                    <div class="form-group">
                        <textarea class="form-control border-0" name="content" id="content" rows="13"></textarea>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>