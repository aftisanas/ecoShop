<?php
session_start();

if (!isset($_SESSION['adr8tw9qux'])) {
    if (empty($_SESSION['adr8tw9qux'])) {
        header("Location: ../admin/showProduct.php");
    }
}



include("../config/commands.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register - EcoShop</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
</head>
<body>

    <div class="container d-flex" style=" justify-content: start-end">
        <div class="row">
            <div class="col-md-10">
                <form method="post">
                    <div class="mb-3">
                        <label for="full-name" class="form-label">full name</label>
                        <input type="text" id="full-name" name="fullName" class="form-control" style="width: 350%;" >
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">user name</label>
                        <input type="text" id="username" name="username" class="form-control" style="width: 350%;" >
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" style="width: 350%;" >
                    </div>
                    <div class="mb-3">
                        <label for="pass" class="form-label">password</label>
                        <input type="password" id="pass" name="password" class="form-control" style="width: 350%;">
                    </div>
                    <br>
                    <input type="submit" name="send" class="btn btn-info" value="valid">
                </form>

            </div>
            <div class="col-md-12 my-5 mx-3">
                Are already have an account <a href="login.php" class="text-danger">Log IN</a>
            </div>
        </div>
    </div>  
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="/docs/5.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>



<!-- php part -->
<?php 
// extract($_POST);
if (isset($_POST['send'])) {
    if (!empty($_POST['fullName']) AND !empty($_POST['username']) AND !empty($_POST['email']) AND !empty($_POST['password'])) {
        $fullName= htmlspecialchars($_POST['fullName']);
        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        $user = addUser($fullName, $username, $email, $password);

        if ($user) {
            // $_SESSION['adr8tw9qux'] = $user;
            $_SESSION['userType'] = 'user';
            header("Location: ../index.php");
        }else {
            echo('Something is wrong !!');
        }
    }
}






?>