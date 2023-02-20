<?php session_start();

if (!isset($_SESSION['user_id'])) {
    header("location:../index.php");
}  ?>

<?php require '../include/function.php';
$user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- important only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />

    <!-- Icone only -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>My Orders</title>
</head>
<style>
    body {
        background-image: url("../images/p.jpg");
        background-repeat: no-repeat;
        background-origin: content-box;
        background-position: center;
        background-size: cover;
        min-height: 100vh;
    }

    h1 {
        color: #7b3826;

    }
</style>

<body>
    <!-- Navbar -->
    <?php include 'userNav.php'; ?>


    <div id="accordion">
        <div class="container py-5">
            <div class="table-responsive">
                <div class="mb-5">
                    <h1>My Orders</h1>
                </div>

                <table class="table accordion text-center table-bordered col-10">
                    <thead>

                        <tr>
                        <tr style="color:#fff;">
                            <th scope="col">Order Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Action</th>
                        </tr>
                        <!-- HTML for the link and accordion -->


                    </thead>
                    <!-- target="#r1" -->
                    <tbody class="table ">
                        <?php
                        $orders = getOrderDataById($user_id);

                        foreach ($orders as $order) :


                        ?>
                            <tr class="" data-id="<?php echo $order['order_id'] ?>" style="background-color:#7b3826; color: #fff;">
                                <td data-bs-toggle="collapse" data-bs-target="#r<?php echo $order['order_id'] ?>"><?php echo $order['created_at'] ?></td>
                                <td data-bs-toggle="collapse" data-bs-target="#r<?php echo $order['order_id'] ?>"><?php echo $order['status'] ?></td>
                                <td data-bs-toggle="collapse" data-bs-target="#r<?php echo $order['order_id'] ?>"><?php echo $order['totalPrice'] ?></td>

                                <td> <?php
                                        if ($order['status'] == 'proccessing') : ?>
                                        <a href="../handler/cancelOrder.php?order_id=<?php echo $order['order_id'] ?>">
                                            cancel</a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php
                            $order_id = $order['order_id'];
                            //  echo $order['order_id'];

                            ?>
                    </tbody>
                    <tbody>
                        <?php



                        ?>

                        </thead>
                    <tbody>
                        <!-- id="r11"-->



                        <tr class="collapse accordion-collapse w-100" id="r<?php echo $order['order_id'] ?>" data-bs-parent=".table" style="background-color: #7b3826ce; color: #fff;">
                            <td id="f" colspan="5">
                                <div class="d-flex justify-content-evenly ">
                                    <?php

                                    $details = getOrderDetails($user_id, $order_id);

                                    foreach ($details as $detail) :
                                    ?>

                                        <div style="color:white" class="pt-5  justify-content-evenly  ">
                                            <span><img src="../images/products/<?php echo $detail['image']; ?>" height="150px" width="150px" alt="">
                                                <p><?php echo $detail['name']; ?></p>
                                                <p><?php echo $detail['price']; ?></p>
                                                <p><?php echo $detail['quantity']; ?></p>

                                            </span>
                                        </div>

                                    <?php endforeach; ?>



                                </div>
                                <span style="font-size: 30PX;">
                                    <p>TotalPrice : <?php echo $order['totalPrice']; ?></p>
                                </span>
                            </td>

                        </tr>
                        <tr></tr>

                    <?php endforeach; ?>

                    </tbody>


                    <!-- ////////////////////2////////////////// -->

                </table>


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
                            <img src="../images/logo (1).png">
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

        <!-- Java Script only -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>