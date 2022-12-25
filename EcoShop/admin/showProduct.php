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


    <title>show product page - EcoShop</title>


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
                                <a class="nav-link" href="addProduct.php">Add a product</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="showProduct.php">Add a product</a>
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
                    <h3 class="text-body text-center my-5 ">All product</h3>
                </div>
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                            <th>#</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $product): ?>
                                <tr>
                                    <td><?= $product->id; ?></td>
                                    <td><?= $product->prod_name; ?></td>
                                    <td class="text-success"><?= $product->price; ?> $</td>
                                    <td><?=substr($product->description, 0, 100); ?></td>
                                    <td>
                                        <img src="<?= $product->image; ?>" class="w-50" alt="product_image">
                                    </td>
                                    <td>
                                        <a href="edit.php?pdt=<?= $product->id; ?>" class="btn btn-warning">Edit</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</body>
</html>
