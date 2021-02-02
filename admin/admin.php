<?php

include_once '../db/connect.php';
$obj = new Connection();
$connection = $obj->Connect();

$query = "SELECT id, product_order, total FROM product_order";
$result = $connection->prepare($query);
$result->execute();
$data = $result->fetchAll(PDO::FETCH_ASSOC);
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
    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <!-- Custom css -->
    <link rel="stylesheet" href="../css/index.css">
    <title>Ecommerce</title>
</head>

<body >
<header id="header">
    <nav class="navbar navbar-expand-md navbar-dark text-white" style="background:   #2E826E;">
        <a class="text-white navbar-brand ms-2  animate__animated animate__slideInDown" href="../index.html">
            <i class="fab fa-pagelines"></i> Organic Store
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarNav">
            <ul class="navbar-nav me-auto ms-3">
                <li class="nav-item active">
                    <a href="#" class="nav-link">Home</a>
                </li>
            </ul>
            <form class="form-inline mt-2 mt-md-0">
                <a style="cursor: pointer;" class="text-white nav-link" href="../index.html">
                    EXIT
                </a>
            </form>
        </div>
    </nav>
</header>

<main role="main">
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-12">
                <button data-bs-toggle="modal" id="newBtn" type="button" class="mt-4 btn btn-success">
                    New Order
                </button>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="tableorders" class="table table-striped table-bordered table-condensed" style="width: 100%;">
                        <thead class="text-center">
                            <tr>
                                <th>ID</th>
                                <th>Order</th>
                                <th>Total</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($data as $dat){
                            ?>
                            <tr>
                                <td><?php  echo $dat['id'];?></td>
                                <td><?php  echo $dat['product_order'];?></td>
                                <td><?php  echo $dat['total'];?></td>
                                <td></td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- MODAL -->
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">

                </h5>
                <button type="button" class="btn-close btn-light" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formOrders">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="order" class="col-form-label">
                            Order:
                        </label>
                        <input type="text" class="form-control" id="order">
                    </div>
                    <div class="form-group">
                        <label for="total" class="col-form-label">
                            Total:
                        </label>
                        <input type="text" class="form-control" id="total">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" id="btnSaveOrder" class="btn btn-success">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>




<footer id="footer" class="bg-secondary text-white py-5" style="margin-top: 40rem;">
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
<!-- JAVASCRIPT -->
<!-- jquery -->
<script
        src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous"></script>
<!-- bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<!-- sweet alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert"></script>
<!-- wow -->
<script src="../js/wow.js"></script>
<!-- datatables -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<!-- custom js -->
<script src="../js/cart.js"></script>
<script src="admin.js"></script>
</body>

</html>
