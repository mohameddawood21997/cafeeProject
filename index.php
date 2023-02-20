<?php include_once 'userPages/header.php'; ?>
<?php
require 'include/function.php';
require 'include/db.php';
?>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container">
    <a class="navbar-brand" href="#"><img width="140" src="images/logo (1).png" alt=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="userPages/Order-user.php">My order</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="userPages/cart.php">My Cart</a>
        </li>
      </ul>
      <div class="d-flex profile">
        <div class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img width="60" src="images/profile.jfif" alt="">
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="handler/logout.php">logout</a></li>
            <li><a class="dropdown-item" href="userPages/Order-user.php">order</a></li>
            </li>
          </ul>
        </div>
      </div>
</nav>
<div class="slider">
  <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="10000">
        <div class="item1 item">
          <h1>Coffee Shop</h1>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure, nam?</p>
          <button class="btn btn-primary"> Show More</button>
        </div>
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <div class="item2 item">
          <h1>Coffee Shop</h1>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure, nam?</p>
          <button class="btn btn-primary"> Show More</button>
        </div>
      </div>
      <div class="carousel-item">
        <div class="item3 item">
          <h1>Coffee Shop</h1>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure, nam?</p>
          <button class="btn btn-primary"> Show More</button>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>

<!-- start our menu  -->
<div class="ourMenu">
  <div class="container">
    <h1>Our Menu </h1>
    <div class="row">
      <?php $products = getAvailableProducts();
      foreach ($products as $product) :
      ?>
        <div class="  col-sm-6 co1-md-6 col-lg-4">
          <div class="card" style="width: 18rem;">
            <form action="handler/addToCart.php" method="post">

              <img src="images/products/<?php echo $product['image'] ?>" class="card-img-top" alt="...">
              <div class="card-body">
                <h4 class="card-title" name="name"><?php echo $product['name'] ?? "americano"; ?></h4>
                <P class="price" name="name"><?php echo $product['price'] ?? "15"; ?>$</P>
                <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                <input type="hidden" name="pro_id" value="<?php echo $product['product_id'] ?? 0; ?>">
                <?php
                $productsId = compareProducInCart($user_id);
                // var_dump($productsId);
                // var_dump($productsId);
                $products = array_column($productsId, 'product_id');
                if (in_array($product['product_id'], $products)) : ?>

                  <input type="submit" name="submit" class="btn btn-success" value="Add To Card" disabled>
                <?php else : ?>
                  <button type="submit" name="submit" class=" ">Add To Card</button>
                <?php endif; ?>


              </div>
            </form>
          </div>
        </div>
      <?php endforeach ?>


    </div>
  </div>
</div>
</div>

<?php include_once 'userPages/about.php'; ?>

</div>
</div>
<!-- Footer -->
<footer class="text-center text-lg-start bg-light text-muted " style="margin-top: 150px;">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between  border-bottom">

  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start ">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <img src="./images/logo (1).png" alt="">
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3"></i>
          </h6>
          <p>
            Here you can use rows and columns to organize your footer content. Lorem ipsum
            dolor sit amet, consectetur adipisicing elit.
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Products
          </h6>
          <p>
            <a href="#!" class="text-reset">Hot Drinks</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Cold Drinks</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Ice</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Cofee</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Useful links
          </h6>
          <p>
            <a href="#!" class="text-reset">Pricing</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Settings</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Orders</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Help</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
          <p><i class="fas fa-home me-3"></i> Egypt,Sohag , ITI</p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            Cofee_ITI@Gmail.com
          </p>
          <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
          <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2023 Copyright:Dead Team
    <a class="text-reset fw-bold" href="https://mdbootstrap.com/">Cofee_ITI.com</a>
  </div>
  <!-- Copyright -->
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>