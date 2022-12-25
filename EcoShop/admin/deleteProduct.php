<?php 
session_start();

if (!isset($_SESSION['adr8tw9qux'])) {
    header("Location: ../log/login.php");
}
if (empty($_SESSION['adr8tw9qux'])) {
    header("Location: ../log/login.php");
}



require('../config/commands.php');
$products = displayAllProducts();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Delete product page - EcoShop</title>


    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</head>
<body  class="bg-light">
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
                                <a class="nav-link" href="addProduct.php">Add product</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="showProduct.php">show product</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link active" href="deleteProduct.php">Delete a product</a>
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
                    <h3 class="text-body text-center my-5">Remove product</h3>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            <form action="#" method="post">
                                <div class="row">
                                    <div class="col-md-12 my-3">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="product-id" placeholder="id" name="productId" required/>
                                            <label for="product-id">Product Number</label>
                                        </div>
                                        <input type="submit" value="Delete" name="valid" class="btn btn-danger" />
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-10 my-3 mx-auto">
                            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                                <?php foreach($products as $product): ?>
                                <div class="col-md-4">
                                    <div class="card" style="width: 18rem;">
                                        <img src="<?= $product->image ?>" class="card-img-top mx-auto"  style="width: 15rem;" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title"> product number is: <?= $product->id ?></h5>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                            <a href="#" class="btn btn-primary">Go somewhere</a>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach;?>
                            </div>
                            
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
    if (isset($_POST['productId'])) {
        if (!empty($_POST['productId']) AND is_numeric($_POST['productId'])) {
            
            $id = htmlspecialchars($_POST['productId']);

            try {   
                DeleteProduct($id);
            } catch (Exception $e) {
                $e->getMessage();
            }
        }
    }
}




?>