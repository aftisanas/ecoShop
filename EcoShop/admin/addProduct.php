<?php 
session_start();

if (!isset($_SESSION['adr8tw9qux'])) {
    header("Location: ../login.php");
}
if (empty($_SESSION['adr8tw9qux'])) {
    header("Location: ../login.php");
}

require('../config/commands.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Add product page - EcoShop</title>


    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</head>
<body class="bg-light">
    <div class="container-fluid">
        <header>
            <div class="row">
                <div class="col-md-12">
                <nav class="navbar navbar-expand-lg bg-light">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                            <a class="navbar-brand" href="../index.php">MonoShop</a>
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="../index.php">Home</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link active" href="addProduct.php">Add a product</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="showProduct.php">show product</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="deleteProduct.php">Delete a product</a>
                                </li>
                            </ul>
                            <a href="../log/logout.php" class="btn btn-outline-warning d-flex">Log out</a>
                        </div>
                    </div>
                    </nav>
                </div>
            </div>
        </header>
        <section>
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-secondary text-center my-5">Add a new product</h3>
                </div>
                <div class="col-md-8 mx-auto">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="#" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="product-title" placeholder="sneaker" name="productName" required/>
                                            <label for="product-title">Product Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="product-img" placeholder="https::example.co" name="productImg" required/>
                                            <label for="product-img">Product image link</label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="product-price" placeholder="0000" name="productPrice" required/>
                                            <label for="product-price">Product Price</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <textarea type="file" class="form-control" id="product-desc" name="productDesc" required></textarea>
                                            <label for="product-desc">Product description</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="submit" value="Submit" name="valid" class="btn btn-success" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

</body>
</html>

<?php 

if (isset($_POST['valid'])) {
    if (isset($_POST['productName']) AND isset($_POST['productImg']) AND isset($_POST['productPrice']) AND isset($_POST['productDesc'])) {
        if (!empty($_POST['productName']) AND !empty($_POST['productImg']) AND !empty($_POST['productPrice']) AND !empty($_POST['productDesc'])) {
            
            $name = htmlspecialchars($_POST['productName']);
            $image = htmlspecialchars($_POST['productImg']);
            $price = htmlspecialchars($_POST['productPrice']);
            $description = htmlspecialchars($_POST['productDesc']);

            try {   
                AddProduct($name, $image, $price, $description);
            } catch (Exception $e) {
                $e->getMessage();
            }
        }
    }
}




?>