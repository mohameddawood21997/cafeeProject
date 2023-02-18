<?php 
session_start();
if(!isset($_SESSION['admin_id'])){
    header('Location:../login.php');
}

?>
<?php require '../include/function.php'; ?>
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
    body {
        background-image: url("./");
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
                        <a class="nav-link " aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">My order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">My cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">My Orders</a>
                    </li>
                </ul>
                <div class="d-flex profile">
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
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
    <!-- Navbar -->


    <div id="accordion">
        <div class="container py-5">
            <div class="table-responsive">
                <div class="mb-5">
                    <h1>Checks</h1>
                </div>

                <table class="table accordion text-center table-bordered">
                    <thead> 
                        
                        <tr>
                            <th scope="col">User Name</th>
                            <th scope="col">Total Amount</th>
                        </tr>
                    </thead>
                    <!-- target="#r1" -->
                    <tbody class="table" style="background-color: #7b3826; color: #fff;">
                    <?php
                    //  var_dump();
                    $users=getUserWhoHasOrders();
                    // var_dump($users);
                    foreach($users as $user):
                        $orders=getOrderDataById($user['id']);
                    ?>
                        <tr data-bs-toggle="collapse" data-bs-target="#r<?php echo $user['id'] ?>" style="background-color: #7b3826; color: #fff;">
                            <td><?php echo $user['name'] ?></td>
                            <td><?php echo getTotalPrice($user['id']) ?> $</td>
                        </tr>
                       
                    </tbody>
                    <thead>
                    
                    </thead>
                    <tbody>
                  <?php  foreach ($orders as $order):?>
                        <!-- id="r1", target="#r11" -->
                        <tr class="collapse accordion-collapse" style="background-color: #7b3826ce; color: #fff;"
                            id="r<?php echo $user['id'] ?>" data-bs-toggle="collapse" data-bs-target="#r1<?php echo $order['order_id'] ?>">
                            <td><?php echo $order['created_at'] ?></td>
                            <td><?php echo $order['totalPrice'] ?></td>
                        </tr>
                        <tbody>
                        <!-- id="r11"-->
                        <tr class="collapse accordion-collapse w-100" id="r1<?php echo $order['order_id'] ?>" data-bs-parent=".table" style="background-color: #7b3826ce; color: #fff;">
                        <td id="f" colspan="5">
                        <div class="d-flex justify-content-evenly ">
                            <?php
                           
                            $details = getOrderDetails($user['id'],$order['order_id']); 
                          
                            foreach($details as $detail): 
                            ?>
                                
                                    <div style="color:black" class="pt-5  justify-content-evenly  ">
                                        <span><img src="../images/products/<?php echo $detail['image']; ?>" height="200px"width="150px"alt="">
                                        <p><?php echo $detail['name']; ?></p>
                                        <p><?php echo $detail['price']; ?></p>
                                        <p><?php echo $detail['quantity']; ?></p>
                                        
                                        </span>
                                    </div>
                                    
                                <?php endforeach;?>
                            <span style="font-size: 30PX;" class="d-block"> <p>TotalPrice : <?php echo $order['totalPrice']; ?></p></span>
                                
                               
                                </div>
                            </td>
                        </tr>
                    </tbody>
                  
                    </tbody>
                 
                    <tbody>
                        <!-- id="r111"-->
                        <!-- <tr class="collapse accordion-collapse" id="r111" data-bs-parent=".table"
                            style="background-color: #7b3826ce; color: #fff;">
                            <td id="f" colspan="5">
                                <div>
                                    <div style="color:black" class="pt-5  d-flex justify-content-evenly ">
                                        <span><img src="./logo (1).png" height="150px" width="120px" alt="">
                                            <p>Cofee</p>
                                            <p>Price:30LE</p>
                                            <p>QTY:1</p>
                                        </span>
                                      
                                    </div>
                                </div>
                            </td>
                        </tr> -->
                    </tbody>
                    <?php endforeach; ?>
                    <?php endforeach; ?>
                    
                </table>
            </div>
        </div>


        <!-- Java Script only -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
</body>

</html>