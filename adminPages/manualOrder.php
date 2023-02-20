<?include_once 'includes/header.php' ;?>
<?php
require '../include/db.php';

$query="SELECT o.order_id,o.totalPrice,u.name, u.phone,u.room,o.created_at FROM users u INNER JOIN orders o ON u.id=o.user_id WHERE
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
    }
   
</style>

<body>
    <!-- Navbar -->
<?php require 'includes/adminNav.php';?>
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
                        <tr >
                            <th scope="col">Order Date</th>
                            <th scope="col">Name</th>
                            <th scope="col">Room</th>
                            <th scope="col">Phone</th>
                            <th scope="col">status</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $element) : ?>
                            <tr class="border bg-secondary bg-gradient" >
                                <td><?php echo $element['created_at']; ?></td>
                                <td><?php echo $element['name']; ?></td>
                                <td><?php echo $element['room']; ?></td>
                                <td><?php echo $element['phone']; ?></td>
                                <td><a href="../handler/out_for_delivery.php?id=<?php echo $element['order_id']; ?>" class="btn btn-light">out for delivery</a>
                                <a href="../handler/delivered.php?id=<?php echo $element['order_id']; ?>" class="btn btn-light">delivered</a></td>
                            </tr>
                            <?php  $elementId=$element['order_id'];?>
                            <td id="f" colspan="5">
                                <div style="background:#552e07ce;width:100%">

                                    <div style="color:aliceblue;" class="pt-5  d-flex justify-content-evenly ">
                                        
                                        
                                            <?php
                                                $query1 = "SELECT o.order_id,o.status,po.product_id,po.quantity,po.price 
                                                AS totalUnit,p.name,p.image,p.price
                                                FROM orders o INNER JOIN products_orders po ON o.order_id=po.order_id 
                                                INNER JOIN products p ON po.product_id=p.product_id 
                                                WHERE o.order_id = :order_id";
                                        
                                                $sql1= $con->prepare($query1);
                                                $order_id=$elementId;
                                                $sql1->bindParam('order_id', $order_id);
                                                $sql1->execute();
                                                $order_data1= $sql1->fetchAll(PDO::FETCH_ASSOC);
                                            ?>
                                            <?php  foreach ($order_data1 as $ele) : ?>
                                            <span>
                                        <img src="../images/products/<?php echo $ele['image']; ?>" height="150px" width="120px" alt="">
                                            <p><?php echo $ele['name']; ?></p>
                                            <p>Price: <?php echo $ele['price']; ?></p>
                                            <p>quan: <?php echo $ele['quantity']; ?></p>
                                            <p>Total:<?php echo $ele['price'] * $ele['quantity']; ?></p>
                                        </span>
                                        <?php endforeach; ?>
                                    </div>
                                    <span style="font-size: 30PX;">
                                        <p>Total Price: <?php echo $element['totalPrice']; ?></p>
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

</body>

</html>