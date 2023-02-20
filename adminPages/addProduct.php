
<?php include_once 'includes/header.php' ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="../assets2/images/favicon.png" rel="icon">
    <link href="../assets2/images/favicon.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Icone only -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>
  <?php include_once 'includes/adminNav.php' ?>
<?php
  require '../include/function.php';
?>

<style>
    body {
        background-image: url("./slider3.jpg");
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

<body style="padding: 0;">
    <!-- Navbar -->

    <!-- Addproduct -->
    <main class="container p-4">
        <div class="row d-flex justify-content-center">

            <div class="col-md-5">

                <div class="card card-body">
                <form action="../handler/insertproduct.php" method="POST" enctype="multipart/form-data">
                        <?php if(isset($_SESSION['success'])):?>
                        <div class="bg-success col-8 offset-2 mt-5 mb-2 p-2 text-light"><?php echo  $_SESSION['success']?></div> 
                        <?php elseif(isset($_SESSION['error'])): ?>
                            <div class="bg-danger col-8 offset-2 mt-5 mb-2 p-2 text-light"><?php  echo  $_SESSION['error']?></div>
                        <?php
                    endif;?>
                    <?php unset($_SESSION['success']);
                      unset($_SESSION['error']); 
                    ?>
                        <div class="title form-group  text-center h1">
                            <h1> Add Product </h1>
                        </div>
                        <!-- Product input -->
                        <div class="mb-3 mt-3">
                            <label for="form-label " class="form-label h4">Product Name</label>
                            <input type="form-control" class="form-control" id="producttype" placeholder="Enter Product Name"
                            name="name">
                        </div>
                        <!-- Price input -->
                        <div class="mb-3 mt-3">
                            <label for="form-label" class="form-label h4">Product Price</label>
                            <input type="form-control" class="form-control" id="productprice"
                                placeholder="Enter Product Price " name="price" >
                        </div>
                        <!-- Category input -->
                      

                        <div class="mb-3 ">
                            <label class="form-label h4" for="form1Example2">Category</label>
                            <select class="form-select"  name="category">
                            <?php  
                             $categories=getTableData('categories');
                            foreach($categories as $category): ?>
                             <?php // var_dump($category); ?>
                              <option class="" value="<?php  echo $category['category_id'] ?>"><?php echo $category['name'] ?></option>
                              <?php  endforeach; ?>
                            </select>
                        </div>
                        <!-- img file input -->
                        <div class="mb-3">
                            <label class="form-label h4" for="form1Example2">Product image</label>
                            <input class="form-control " type="file" id="productimage" name="file">
                        </div>
                        <div class="row mb-4">
                            <div class="col d-flex justify-content-center">
                            </div>
                        </div>
                        <!-- Submit button -->
                        <div class="text-center mb-3 ">
                            <button type="submit" class="btn btn-block w-100"  name="submit">Add Product </button>
                            
                        </div>
                        <a class="btn btn-block w-100" href="./addCategory.php">Add New Category</a>
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