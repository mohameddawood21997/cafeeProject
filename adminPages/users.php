<?php include_once 'includes/header.php' ;?>

<?php  require '../include/function.php' ?>



<?php include_once 'includes/adminNav.php' ?>
    <div class="container m-3 mx-auto">
        <div class="row">
            <div class="col-12">
                <div class="data_table">
                    <table id="example" class="table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Room</th>
                                <th>Image</th>
                            
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                        <?php $users =getTableData('users');
                            foreach($users as $user):
                        ?>
                        <tr>
                        <td>#<?php  ?></td>
                        <td><?php echo $user['name']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['phone']; ?></td>
                        <td><?php echo $user['room']; ?></td>
                        <td> <img src="../images/user_images/<?php echo $user['image'] ?>" class="rounded-circle" alt=""  width="100" height="100" ></td>
                        
                        <td>
                            <a href="./edituser.php?user_id=<?php echo $user['id']?>" class="btn btn-success">edit</a>
                            <a href="../handler/deleteuser.php?user_id=<?php echo $user['id']?>" class="btn btn-danger">delete</a>
                            
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
    <?php include_once 'includes/footer.php' ?> 


