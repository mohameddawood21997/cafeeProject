<?php include_once 'includes/header.php'; ?>
<?php
require '../include/db.php';

$query = "SELECT o.order_id,o.totalPrice,u.name, u.phone,u.room,o.created_at FROM users u INNER JOIN orders o ON u.id=o.user_id WHERE
 o.status = 'proccessing' OR o.status ='out to deliver'";

$sql = $con->prepare($query);

$sql->execute();

$data = $sql->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <title>Admin Orders</title>
</head>
<style>
    body {
        background-attachment: fixed;
        background-image: url("../images/p.jpg");
        object-fit: cover;
        background-repeat: no-repeat;
        background-origin: content-box;
        background-position: center;
        background-size: cover;
        min-height: 100vh;
    }

    h1 {
        margin-top: 20px;
        color: #866a62;

    }

    table {
        margin: 0px 0px 0px 220px;
        text-align: center;
        border: 1px solid white;
        font-size: 20px;
        background-attachment: scroll;
    }

    p {
        color: white;
        font-size: 18px;
    }
</style>

<body>
    <!-- Navbar -->
    <?php require 'includes/adminNav.php'; ?>
    <!-- Update Product -->
    <div id="main-container">
        <div id="table-container row d-flex justify-content-center " style="width: 100%;height: 100%;">

            <!-- </table> -->
            <center>
                <h1>ORDERS</h1>
            </center>
            <table>
                <table class="table table-borderless  table-sm mt-3 " style="color: white;height: 10vw;width: 70vw;">
                    <thead>
                        <tr style="background: #552e07ce;top: 0; position: sticky;">
                            <th scope="col">Order Date</th>
                            <th scope="col">Name</th>
                            <th scope="col">Room</th>
                            <th scope="col">Phone</th>
                            <th scope="col">status</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $element) : ?>
                            <tr class="border bg-secondary bg-gradient">
                                <td><?php echo $element['created_at']; ?></td>
                                <td><?php echo $element['name']; ?></td>
                                <td><?php echo $element['room']; ?></td>
                                <td><?php echo $element['phone']; ?></td>
                                <td><a href="../handler/out_for_delivery.php?id=<?php echo $element['order_id']; ?>" class="btn btn-light">out for delivery</a>
                                    <a href="../handler/delivered.php?id=<?php echo $element['order_id']; ?>" class="btn btn-light">delivered</a>
                                </td>
                            </tr>
                            <?php $elementId = $element['order_id']; ?>
                            <td id="f" colspan="5">
                                <div style="background:#552e07ce;width:100%">

                                    <div style="color:aliceblue;" class="pt-5  d-flex justify-content-evenly ">


                                        <?php
                                        $query1 = "SELECT o.order_id,o.status,po.product_id,po.quantity,po.price 
                                                AS totalUnit,p.name,p.image,p.price
                                                FROM orders o INNER JOIN products_orders po ON o.order_id=po.order_id 
                                                INNER JOIN products p ON po.product_id=p.product_id 
                                                WHERE o.order_id = :order_id";

                                        $sql1 = $con->prepare($query1);
                                        $order_id = $elementId;
                                        $sql1->bindParam('order_id', $order_id);
                                        $sql1->execute();
                                        $order_data1 = $sql1->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                                        <?php foreach ($order_data1 as $ele) : ?>
                                            <span>
                                                <img src="../images/products/<?php echo $ele['image']; ?>" height="150px" width="160px" alt="">
                                                <p><?php echo $ele['name']; ?></p>
                                                <p>Price: <?php echo $ele['price']; ?></p>
                                                <p>quan: <?php echo $ele['quantity']; ?></p>
                                                <p>Total:<?php echo $ele['price'] * $ele['quantity']; ?></p>
                                            </span>
                                        <?php endforeach; ?>
                                    </div>
                                    <span>
                                        <p style="font-size:25px;">Total Price: <?php echo $element['totalPrice']; ?></p>
                                    </span>
                                </div>
                            </td>
                        <?php endforeach; ?>
                    </tbody>
                </table>
        </div>
    </div>
    </div>

    </main>
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
                        <img src="./images/logo (1).png" alt="" <h6 class="text-uppercase fw-bold mb-4">
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
</body>

</html>