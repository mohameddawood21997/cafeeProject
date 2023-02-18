<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- important only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />

    <!-- Icone only -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<style>
i,
.order {
    color: #7b3826;
}

span {
    color: black;
}
</style>
<?php // include_once 'includes/adminNav.php' ?>




<body style="padding: 0;margin:0;">
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-light">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="/"
                        class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">
                            <img src="../images/logo (1).png" alt="hugenerd" width="150" height="40" class="">
                        </span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                        id="menu">
                        <li class="nav-item">
                            <a href="#" class="nav-link align-middle px-0">
                                <i class="fa-solid fa-house"></i><span class="ms-1 d-none d-sm-inline">Home</span>
                            </a>
                        </li>
                        <li>
                            <a href="products.php" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <i class="fa-solid fa-mug-hot"></i><span class="ms-1 d-none d-sm-inline">Products</span>
                            </a>
                            <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="products.php" class="nav-link px-0"><i class="fa-solid fa-eye"></i><span
                                            class="d-none d-sm-inline"> View All Products</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="addProduct.php" class="nav-link px-0"><i class="fa-solid fa-cart-plus"></i><span
                                            class="d-none d-sm-inline"> Add Product</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="editProducts.php" class="nav-link px-0"><i class="fa-solid fa-pen-to-square"></i><span
                                            class="d-none d-sm-inline"> Update Product</span>
                                    </a>
                                </li>
                                <!-- <li>
                                    <a href="#" class="nav-link px-0"><i class="fa-regular fa-eye"></i><span
                                            class="d-none d-sm-inline"> All Category</span>
                                    </a>
                                </li> -->
                                <li>
                                    <a href="addCategory.php" class="nav-link px-0"><i class="fa-solid fa-plus"></i><span
                                            class="d-none d-sm-inline"> Add Category</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                                <i class="fa-solid fa-user"></i><span class="ms-1 d-none d-sm-inline">Users</span></a>
                            <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="users.php" class="nav-link px-0"><i class="fa-solid fa-eye"></i><span
                                            class="d-none d-sm-inline"> View All Users</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="adduser.php" class="nav-link px-0"><i class="fa-solid fa-user-plus"></i><span
                                            class="d-none d-sm-inline"> Add User</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="manualOrder.php" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <i class="fa-solid fa-border-all"></i> <span class="ms-1 d-none d-sm-inline">Manual
                                    Orders</span> </a>
                            <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="#" class="nav-link px-0"><i class="fa-solid fa-eye"></i><span
                                            class="d-none d-sm-inline"> View All Orders</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="checks.php" class="nav-link px-0 align-middle">
                                <i class="fa-solid fa-clipboard-check"></i> <span
                                    class="ms-1 d-none d-sm-inline">checks</span>
                            </a>
                        </li>
                        
                    </ul>
                    <hr>
                    <div class="dropdown pb-4">
                        <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle"
                            id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="../images/profile.jfif" alt="hugenerd" width="30" height="30"
                                class="rounded-circle">
                            <span class="d-none d-sm-inline mx-1 text-dark">Admin</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <!-- <hr class="dropdown-divider"> -->
                            </li>
                            <li><a class="dropdown-item" href="../handler.php">Log out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col py-3 m-5">
                <div class="container">
                    <div class="ourMenu">

                        <h1 class="ml-5 order ">Our Menu </h1>
                        <div class="row">
                            <?php
     include '../include/function.php';
    $products = getAvailableProducts();
      foreach($products as $product):
    ?>
                            <div class="  col-sm-6 co1-md-6 col-lg-4 mt-5">
                                <div class="card" style="width: 18rem;">
                                    <form action="handler/addToCart.php" method="post" class="p-5 text-center">

                                        <img src="../images/products/<?php echo $product['image'] ?>"
                                            class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h4 class="card-title" name="name">
                                                <?php echo $product['name']??"americano"; ?></h4>
                                            <P class="price" name="name"><?php echo $product['price']??"15"; ?>$</P>
                                            <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                            <input type="hidden" name="pro_id"
                                                value="<?php echo $product['product_id']??0; ?>">


                                            <input type="submit" name="submit" class="btn btn-success"
                                                value="Add To Card" disabled>

                                        </div>
                                    </form>
                                </div>
                            </div>
                            <?php endforeach ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>