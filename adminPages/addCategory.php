<?php include_once 'includes/header.php' ?> 

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

<body style="padding:0;">
<?php include_once 'includes/adminNav.php' ?>
    <!-- Addproduct -->
    <main class="container p-4">
        <div class="row d-flex justify-content-center pt-5">

            <div class="col-md-5">

                <div class="card card-body ">
                <?php if(isset($_SESSION['success'])):?>
                    <div class="bg-success col-8 offset-2 mt-5 p-3 "><?php echo  $_SESSION['success']?></div> 
                    <?php elseif(isset($_SESSION['error'])): ?>
                        <div class="bg-primary col-8 offset-2 mt-5 mb-5 p-3"><?php  echo  $_SESSION['error']?></div>
                    <?php
                endif;?>
                <?php session_unset(); ?>
                    <form  action="../handler/insertCat.php" method="post" >

                        <div class="title form-group  text-center h1">
                            <h1> Add Category </h1>
                        </div>
                        <!-- Category input -->
                        <div class="mb-3 mt-3">
                            <label for="form-label " class="form-label h4">Category Name</label>
                            <input type="form-control" name="name"  class="form-control" id="newcategory" placeholder="Enter Category Name"
                                name="newcategory">
                        </div>
                        <!-- Submit button -->
                        <div class="text-center mb-3 ">
                            <button type="submit" class="btn btn-block" name="submit">Add Category</button>
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