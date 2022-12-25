<?php 
session_start();

if (!isset($_SESSION['userType'])) {
    header("Location: login.php");
}
if (empty($_SESSION['userType'])) {
    header("Location: login.php");
}


require('config/commands.php');
$products = displayAllProducts();

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>home page - EcoShop</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/album/">


    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <link href="/docs/5.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.2/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.2/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.2/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
    <link rel="icon" href="/docs/5.2/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#712cf9">
    
    
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }
        
        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
        
        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }
        
        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }
        
        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }
        
        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }
        
        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
        
        .card-img {
            width: 15rem;
            height: 300px;
        }
        </style>


</head>

<body>
    
    <header>
        <div class="collapse bg-dark" id="navbarHeader">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-md-7 py-4">
                        <h4 class="text-white">EcoShop</h4>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe cumque cum, ab soluta culpa suscipit debitis qui dolor? Nesciunt, ipsum?</p>
                    </div>
                    <div class="col-sm-4 offset-md-1 py-4">
                        <?php if (isset($_SESSION['adr8tw9qux'])) {
                            if (!empty($_SESSION['adr8tw9qux'])) { ?>
                                <?php if ($_SESSION['userType'] == 'admin') {
                                    ?>
                                        <h4 class="text-white">Product Info</h4>
                                        <ul class="list-unstyled">
                                            <li><a href="admin/showProduct.php" class="text-white">Show Product</a></li>
                                            <li><a href="admin/addProduct.php" class="text-white">Add Product</a></li>
                                            <li><a href="admin/deleteProduct.php" class="text-white">Delete Product</a></li>
                                            <li><a href="./log/logout.php" class="text-white">logout</a></li>
                                        </ul>
                                    <?php } elseif ($_SESSION['userType'] == 'user') { ?>
                                        <h4 class="text-white">Authentication</h4>
                                        <ul class="list-unstyled">
                                            <li><a href="./log/logout.php" class="text-white">logout</a></li>
                                        </ul>
                                    <?php } }else { ?>
                                        <h4 class="text-white">Authentication</h4>
                                        <ul class="list-unstyled">
                                            <li><a href="./log/login.php" class="text-white">Login</a></li>
                                            <li><a href="./log/register.php" class="text-white">Register</a></li>
                                        </ul>
                            <?php }} ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a href="#" class="navbar-brand d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24">
                        <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z" />
                        <circle cx="12" cy="13" r="4" />
                    </svg>
                    <strong>EcoShop</strong>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </header>
    
    <main>
        
        <section class="py-5 text-center container">
            <div class="row py-lg-5 ">
                <div class="col-lg-9 col-md-9 mx-auto">
                    <h1 class="fw-light">Shop your favorite product</h1>
                    <p class="lead text-muted my-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem, quisquam? Tempore dicta culpa quisquam, doloremque ipsa id blanditiis illo temporibus, vitae minima qui? Facere cumque id officiis reiciendis accusantium, voluptatum animi.</p>
                    <p>
                        <a href="#products" class="btn btn-primary my-2">Main call to action</a>
                        <a href="#" class="btn btn-secondary my-2">Secondary action</a>
                    </p>
                </div>
            </div>
        </section>
        
        <div class="album py-5 bg-light">
            <div class="container" id="products">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <?php foreach($products as $product): ?>
                        <div class="col">
                            <div class="card shadow-sm">
                                <img src="<?= $product->image ?>" class="card-img-top card-img mx-auto" />
                                
                                <div class="card-body">
                                    <h5 class="card-title"><?= $product->prod_name ?></h5>
                                    <p class="card-text"><?= $product->description ?></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">buy</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Add to cart</button>
                                    </div>
                                    <big class="text-muted"><?= $product->price?> $</big>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </main>

    <footer class="text-muted py-5">
        <div class="container">
            <p class="float-end mb-1">
                <a href="#">Back to top</a>
            </p>
            <p class="mb-1">MonoShop is &copy; example of e-commerce web site. </p>
            <p class="mb-0">you want to more about us : <a href="/">Visit the istagram</a> or our <a href="#">facebook</a> account.</p>
        </div>
    </footer>
    
    
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="/docs/5.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
    
</body>

</html>