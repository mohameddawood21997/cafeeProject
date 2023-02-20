
<?php include_once 'includes/header.php' ;?>

<?php  require '../include/function.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Data Table </title>
    <meta content="" name="description">
    <meta content="Author" name="MJ Maraz">
    <link href="assets/images/favicon.png" rel="icon">
    <link href="assets/images/favicon.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../assets2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets2/css/datatables.min.css">
    <link rel="stylesheet" href="../assets2/css/style.css">

</head>
<!-- =============== Design & Develop By = MJ MARAZ   ====================== -->

<body>
<?php include_once 'includes/adminNav.php' ?>
    <!-- =======  Data-Table  = Start  ========================== -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="data_table">
                    <table id="example" class="table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>name</th>
                                <th>price</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            <?php $products =getTableData('products');
                            foreach($products as $product):
                           ?>
                            <tr>
                                <td>#<?php  ?></td>
                                <td><?php echo $product['name']; ?></td>
                                <td><?php echo $product['price']; ?></td>
                                <td> <img src="../images/products/<?php echo $product['image'] ?>" alt="" width="100">
                                </td>
                                <td><?php echo $product['status']; ?></td>
                                <td>
                                    <a href="./editProducts.php?product_id=<?php echo $product['product_id']?>"
                                        class="btn btn-success">edit</a>

                                    <button data-id=<?php echo $product['product_id']  ?>
                                        class="btn btn-danger delete-btn">Delete</button>
                                </td>


                            </tr>
                            <?php endforeach; ?>



                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- =======  Data-Table  = End  ===================== -->
    <!-- ============ Java Script Files  ================== -->


    <script src="../assets2/js/bootstrap.bundle.min.js"></script>
    <script src="../assets2/js/jquery-3.6.0.min.js"></script>
    <script src="../assets2/js/datatables.min.js"></script>
    <script src="../assets2/js/pdfmake.min.js"></script>
    <script src="../assets2/js/vfs_fonts.js"></script>
    <script src="../assets2/js/custom.js"></script>


    <script>
    $(document).ready(function() {
        $(".delete-btn").click(function(event) {


            event.preventDefault();
            if (confirm("do you realy want to delete this record")) {


                var product_id = $(this).data("id");
                var element = this;

                $.ajax({
                    url: "../handler/ajaxdeleteProduct.php",
                    type: 'post',
                    data: {
                        product_id: $(this).data("id")
                    },
                    success: function(data) {

                        if (data) {
                            console.log(data);
                            $(element).closest("tr").fadeOut();
                        } else {
                            alert("cant not delete record");
                        }
                    }

                })
            }
        })


    });
    </script>

</body>

</html>