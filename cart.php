<?php

    include_once './db/connect.php';
    $obj = new Connection();
    $connection = $obj->Connect();


?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" 
    integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <!-- Animate -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <!-- Custom css -->
    <link rel="stylesheet" href="css/index.css">
    <title>Ecommerce</title>
</head>

<body onload="render()">
    <header id="header">
        <nav class="navbar navbar-expand-md navbar-dark text-white" style="background:   #2E826E;">
            <a class="text-white navbar-brand ms-2  animate__animated animate__slideInDown" href="index.html">
                <i class="fab fa-pagelines"></i> Organic Store
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
            <div class="navbar-collapse collapse" id="navbarNav">
                <ul class="navbar-nav me-auto ms-3">
                    <li class="nav-item active">
                        <a href="index.html" class="nav-link">Home</a>
                    </li>
                </ul>
                <form style="cursor: pointer;" class="form-inline mt-2 mt-md-0">
                    <a class="text-white nav-link" href="cart.php">
                        <i class="text-warning fas fa-shopping-cart">
                            </i> Shopping Cart
                        <i style="color: yellow;" id="cart_n"></i>
                    </a>
                </form>
            </div>
        </nav>
    </header>

    <main role="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="table-responsive-sm">
                        <table class="table table-hover caption-top">
                            <caption>
                                <h1 class="animate__animated animate__fadeInUp">Shopping Cart</h1>
                            </caption>
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product</th>
                                <th scope="col">Description</th>
                                <th scope="col">Quntity</th>
                                <th scope="col">Price</th>
                            </tr>
                            </thead>
                            <tbody id="table"></tbody>
                        </table>
                    </div>
                </div>
            </div>
            <hr class="feat-div">
        </div>
    </main>

    <footer id="footer" class="bg-secondary text-white py-5" style="margin-top: 201px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-12">
                    <h4 class="font-rubik font-size-20">Organic Store</h4>
                    <p class="font-size-14 font-raleway text-white-50">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis, nihil!</p>
                </div>
                <div class="col-lg-4 col-12">
                    <h4 class="font-rubik font-size-20">Newsletter</h4>
                    <form class="row">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Email *">
                        </div>
                        <div class="col">
                            <button type="submit" class="btn mb-2 border-light" style="background: #2E826E; color: white;">Zasubskrybuj</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-2 col-12">
                    <h4 class="font-rubik font-size-20">Informacje</h4>
                    <div class="d-flex flex-column flex-wrap">
                        <a href="" class="font-raleway font-size-14 text-white-50 pb-1 text-decoration-none">O nas</a>
                        <a href="" class="font-raleway font-size-14 text-white-50 pb-1 text-decoration-none">Informacje o dostawie</a>
                        <a href="" class="font-raleway font-size-14 text-white-50 pb-1 text-decoration-none">Polityka Prywatności</a>
                        <a href="" class="font-raleway font-size-14 text-white-50 pb-1 text-decoration-none">Regulamin sklepu</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- jquery -->
    <script
            src="https://code.jquery.com/jquery-3.5.1.js"
            integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
            crossorigin="anonymous"></script>
    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- wow -->
    <script src="./js/wow.js"></script>
    <!-- custom js -->
    <script src="js/cart.js"></script>
</body>

</html>