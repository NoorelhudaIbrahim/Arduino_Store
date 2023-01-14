<?php

require_once('./connectdb.php');
require_once('./sidebar.php');

// session_start();

// $admin_id = $_SESSION['admin_id'];

// if(!isset($admin_id)){
//    header('location:admin_login.php');
// };

 
 if(isset($_GET['delete'])){
 
    $delete_id = $_GET['delete'];
    $delete_product_image = $conn->prepare("SELECT * FROM `products` WHERE id = ?");
    $delete_product_image->execute([$delete_id]);
    $fetch_delete_image = $delete_product_image->fetch(PDO::FETCH_ASSOC);
    unlink('../uploaded_img/'.$fetch_delete_image['image_01']);
    unlink('../uploaded_img/'.$fetch_delete_image['image_02']);
    unlink('../uploaded_img/'.$fetch_delete_image['image_03']);
    $delete_product = $conn->prepare("DELETE FROM `products` WHERE id = ?");
    $delete_product->execute([$delete_id]);
    $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE pid = ?");
    $delete_cart->execute([$delete_id]);
    $delete_wishlist = $conn->prepare("DELETE FROM `wishlist` WHERE pid = ?");
    $delete_wishlist->execute([$delete_id]);
    header('location:product.php');
 }


?>

<div class="page-container">
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 pb-4">
                        <a href="add_product.php" class="btn btn-success btn-md">Add New Product</a>
                    </div>
                    <div class="col-md-12">
                        <div class="table-responsive m-b-40">
                            <table class="table table-borderless table-data3 table-earning">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">NAME</th>
                                        <th class="text-center">PRICE</th>
                                        <th class="text-center">NEW PRICE</th>
                                        <th class="text-center">CATEGORY</th>
                                        <th class="text-center">IMAGE</th>
                                        <th class="text-center">doing</th>
                                        <!-- <th>DESCRIPTION</th> -->
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $select_products = $conn->prepare("SELECT * FROM `products`"); 
                                        $select_products->execute();
                                        if($select_products->rowCount() > 0){
                                            while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){ 
                                    ?>
                                    <tr class="tr-shadow">
                                        <td class="align-middle text-center"><?= $fetch_products['id']; ?></td>
                                        <td class="align-middle text-center"><?= $fetch_products['name']; ?></td>
                                        <td class="align-middle text-center"><?= $fetch_products['price']; ?></td>
                                        <td class="align-middle text-center text-danger"><?= $fetch_products['price']; ?></td>
                                        <td class="align-middle text-center"><?= $fetch_products['category_name']; ?></td>
                                        <td class="align-middle text-center">
                                            <img src="../uploaded_img/<?= $fetch_products['image_01']; ?>" alt="" width="80px">
                                        </td>
                                        <td class="align-middle text-center">
                                            <div class="table-data-feature">
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <a href="update_product.php?update=<?= $fetch_products['id']; ?>" class="zmdi zmdi-edit text-dark"></a>
                                                    <i class=""></i>
                                                </button>
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                <a href="./product.php?delete=<?= $fetch_products['id']; ?>" class="zmdi zmdi-delete text-dark" onclick="return confirm('delete this product?');">
                                                </a>
                                                </button>
                                            </div>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <?php
                                        }
                                    }else{
                                        echo '<p class="empty">no products added yet!</p>';
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

<?php include('./footer.php'); ?>