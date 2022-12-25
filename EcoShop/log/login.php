<?php
session_start();

if (isset($_SESSION['adr8tw9qux'])) {
    if (!empty($_SESSION['adr8tw9qux'])) {
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

    <title>Login - EcoShop</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
</head>
<body>
    
    <div class="container-fluid my-5">
        <div class="row">
            <div class="col-md-3 mx-auto">
                <h3 class="text-secondary my-3">Login</h3>
            </div>
        <div class="row">
            <div class="col-md-6 mx-auto">
                <form method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="example@gmail.com"/>
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="your password" />
                    </div>
                    <input type="submit" class="btn btn-danger" name="submit" value="Submit"/>
                </form>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-md-2 mx-auto text-center">
                You don't have an account <a href="register.php" class="text-primary">Register</a>
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
if (isset($_POST['submit'])) {
    if (!empty($_POST['email']) AND !empty($_POST['password'])) {
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        $admin = getAdmin($email, $password);

        if ($admin) {
            $_SESSION['adr8tw9qux'] = $admin;
            $_SESSION['userType'] = 'admin';
            header("Location: ../admin/addProduct.php");
        }elseif (!$admin) {
            $user = getUser($email, $password);
            header("Location: ../index.php");

        }else {
            echo('Something is wrong !!');
        }
    }
}






?>