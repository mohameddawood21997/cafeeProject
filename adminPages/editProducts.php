<?php 
session_start();
if(!isset($_SESSION['admin_id'])){
    header('Location:../login.php');
}

if(!isset($_SESSION['product_id'])){
    header('Location:products.php');
}

?>
<?php 
require '../include/function.php';
$id = $_GET['product_id'];
$product=getProductById($id);
// var_dump($product)?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <title>UpdateProduct</title>
</head>
<style>
    body {
        background-image: url("../images/slider3.jpg");
        background-repeat: no-repeat;
        background-origin: content-box;
        background-position: center;
        background-size: cover;
        min-height: 100vh;
    }

    h1 {
        color: #7b3826;

    }

    .btn {
        color: white;
        background-color: #7b3826;

    }
    
    .btn:hover{
        color: white;
        background-color: #7b3826; 
    }

    .card {
        margin-top: 30px;
        background-color: #fff;
        border-radius: 20px;
    }

    .form-label {
        color: #333333
    }

    ;
</style>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand" href="#"><img width="140" src="./logo (1).png" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Manual Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Checks</a>
                    </li>
                </ul>
                <div class="d-flex profile">
                    <div class="nav-item dropdown">
                        <!-- <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> -->
                        <img width="60" class="rounded-circle" src="./profile.jfif" alt="">
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">logout</a></li>
                            <li><a class="dropdown-item" href="#">order</a></li>
                            </li>
                        </ul>
                    </div>
                </div>
    </nav>
    <!-- Update Product -->
    <main class="container p-4">
        <div class="row d-flex justify-content-center">

            <div class="col-md-5">

                <div class="card card-body">
                <?php if(isset($_SESSION['success'])):?>
                        <div class="bg-success col-8 offset-2 mt-5 p-3 "><?php echo  $_SESSION['success']?></div> 
                        <?php elseif(isset($_SESSION['error'])): ?>
                            <div class="bg-danger col-8 offset-2 mt-5 p-3"><?php  echo  $_SESSION['error']?></div>
                        <?php
                    endif;?>
                    <?php session_unset(); ?>
                <form  action="../handler/updateProducts.php" method="post" enctype="multipart/form-data">


                        <div class="title form-group mb-3 text-center h1">
                            <h1> Update Product </h1>
                        </div>
                        <!-- Product input -->
                        <div class="mb-3 mt-3">
                            <label for="form-label" class="form-label h4">Product Name</label>
                            <input type="form-control" class="form-control" id="updatetype" placeholder="Enter Product Name"
                            name="name" value="<?php echo $product['name']?>">
                        </div>
                        <!-- Price input -->
                        <div class="mb-3 mt-3">
                            <label for="form-label" class="form-label h4">Product Price</label>
                            <input type="form-control" class="form-control" id="updateprice" value="<?php echo $product['price']?>"
                                placeholder="Enter Product Price "  name="price">
                        </div>
                   
                        <!-- img file input -->
                        <div class="mb-3">
                            <label class="form-label h4" for="form1Example2">Product image</label>
                            <input class="form-control " type="file" id="updateproductimage" name="file" value=" <?php echo $product['image']?>"> 
                            <input type="hidden" name="old_img" value="<?php echo $product['image']; ?>" readonly >
                        </div>
                        <div class="row mb-4">
                            <div class="col d-flex justify-content-center">
                            </div>
                        </div>
                        <div class="mb-3 mt-3">
                        <select class="form-select"  name="status"> 
                             
                              <option class=""  value="un available" <?php echo ($product['status']=='un available')? 'selected' :'' ?>>un available</option> 
                              <option class=""  value="available" <?php echo  ($product['status']=='available')? 'selected' :'' ?>>available</option>   
                            </select>
                            <input type="text" class="form-control" id="updatetype"  name="product_id" value="<?php echo $product['product_id']; ?>"readonly>
                        </div>
                        <!-- Submit button -->
                        <div class="text-center mb-3 ">
                            <!-- <input type="submit" value="Update Product"> -->
                            <button type="submit" class="btn btn-block" name="update">Update Product </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>

        </div>
    </main>




    <script>
        src =
            "https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js";
        integrity =
            "sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4";
        crossorigin = "anonymous";

    </script>
</body>

</html>