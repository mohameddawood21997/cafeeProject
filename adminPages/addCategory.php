<?php include_once 'includes/header.php' ?> 
  <?php include_once 'includes/adminNav.php' ?>
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

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-light ">
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