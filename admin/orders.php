<style>
    .navbar-sidebar .navbar__list li.active3 > a {
        color: #258687;
        font-weight: 700;
    }
</style>
<?php require_once('./connectdb.php');
require_once('./sidebar.php');



if(isset($_POST['update_payment'])){
   $order_id = $_POST['order_id'];
   $payment_status = $_POST['payment_status'];
   $payment_status = filter_var($payment_status, FILTER_SANITIZE_STRING);
   $update_payment = $conn->prepare("UPDATE `orders` SET payment_status = ? WHERE id = ?");
   $update_payment->execute([$payment_status, $order_id]);
   $message[] = 'payment status updated!';
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_order = $conn->prepare("DELETE FROM `orders` WHERE id = ?");
   $delete_order->execute([$delete_id]);
   header('location:orders.php');
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<body>
<div class="page-container">
    <div  id="container-hide">
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <!-- <div class="col-md-12 pb-4">
                        <button type="submit" value="add product" class="btn btn-success btn-md" onclick="showadd()">Add New Product</button>
                    </div> -->
                    <div class="col-md-12">
                        <div class="table-responsive m-b-40">
                            <table class="table table-borderless table-data3 table-earning">
                                <thead>
                                    <tr>
                                        
                                        <th class="text-center">NAME</th>
                                        <th class="text-center">PHONE NO.</th>
                                        <th class="text-center">EMAIL</th>
                                        <th class="text-center">ADDRESS</th>
                                        <th class="text-center">TOTAL PRODUCTS</th>
                                        <th class="text-center">TOTAL PRICE</th>
                                        <th class="text-center">PAYMENT METHOD</th>
                                        <th class="text-center">STATUS</th>
                                        <th class="text-center">DELETE</th>
                                        <th class="text-center">PLACED ON</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $select_orders = $conn->prepare("SELECT * FROM `orders`"); 
                                        $select_orders->execute();
                                        if($select_orders->rowCount() > 0){
                                            while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){ 
                                    ?>
                                    <tr class="tr-shadow">
                                       
                                        <td class="align-middle text-center"><?= $fetch_orders['name']; ?></td>
                                        <td class="align-middle text-center"><?= $fetch_orders['number']; ?></td>
                                        <td class="align-middle text-center"><?= $fetch_orders['email']; ?></td>
                                         <td class="align-middle text-center"><?= $fetch_orders['address']; ?></td>
                                        <td class="align-middle text-center "><?= $fetch_orders['total_products']; ?></td>
                                        <td class="align-middle text-center "><?= $fetch_orders['total_price']; ?></td>
                                        <td class="align-middle text-center "><?= $fetch_orders['method']; ?></td>
                                        <td class="align-middle text-center">
                                            <form action="" method="post">
                                                <input type="hidden" name="order_id" value="<?= $fetch_orders['id']; ?>">
                                                <select name="payment_status" class="select">
                                                    <option selected disabled><?= $fetch_orders['payment_status']; ?></option>
                                                    <option value="pending">pending</option>
                                                    <option value="completed">completed</option>
                                                </select>
                                                <input type="submit" value="update" class="option-btn" name="update_payment" style="background-color: green; width:60px; color:white; font-size:12px; padding:3px;border-radius: .2rem;">
                                            </form>
                                        </td>
                                        <td>
                                            <div class="flex-btn">
                                                <a href="./orders.php?delete=<?= $fetch_orders['id']; ?>" class="delete-btn" onclick="return confirm('delete this order?');" style="background-color: red; width:60px; color:white; font-size:12px; padding:3px;border-radius: .2rem;text-align:center">delete</a>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center"><?= $fetch_orders['placed_on']; ?></td>
                                        <td class="align-middle text-center">
                                            
                                        
                                    </tr>
                                    <?php
                                        }
                                    }else{
                                        echo '<p class="empty">no orders added yet!</p>';
                                    }?>
                                </tbody>
                            </table>
                        </div>
                        <!-- END DATA TABLE -->
                    </div>
                </div>
             </div>
        </div>
    </div>
</div>
                                

<script>
    showadd = () => {
        console.log('test')
        document.getElementById('container-hide').style.display = "block"
    }

    hideadd = () => {
        console.log('test')
        window.location.reload('product.php')
    }
</script>

<?php include('./footer.php'); ?>
    
       <!-- Jquery JS-->
       <script src="vendor/jquery-3.2.1.min.js"></script>
       <!-- Bootstrap JS-->
       <script src="vendor/bootstrap-4.1/popper.min.js"></script>
       <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
       <!-- Vendor JS       -->
       <script src="vendor/slick/slick.min.js">
       </script>
       <script src="vendor/wow/wow.min.js"></script>
       <script src="vendor/animsition/animsition.min.js"></script>
       <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
       </script>
       <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
       <script src="vendor/counter-up/jquery.counterup.min.js">
       </script>
       <script src="vendor/circle-progress/circle-progress.min.js"></script>
       <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
       <script src="vendor/chartjs/Chart.bundle.min.js"></script>
       <script src="vendor/select2/select2.min.js">
       </script>
   
       <!-- Main JS-->
       <script src="js/main.js"></script>
     
  
   </body>
   
   </html>
   <!-- end document-->
   