
<?php include_once 'includes/header.php' ?> 
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
                        <div class="bg-success col-8 offset-2 mt-5 p-3 "><?php echo  $_SESSION['success']?></div> 
                        <?php elseif(isset($_SESSION['error'])): ?>
                            <div class="bg-danger col-8 offset-2 mt-5 p-3"><?php  echo  $_SESSION['error']?></div>
                        <?php
                    endif;?>
                    <?php session_unset(); ?>
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