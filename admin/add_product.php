<?php
require_once('./sidebar.php');
require_once('./connectdb.php');

// session_start();

// $admin_id = $_SESSION['admin_id'];

// if(!isset($admin_id)){
//    header('location:admin_login.php');
// };

if(isset($_POST['add_product'])){

    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $price = $_POST['price'];
    $price = filter_var($price, FILTER_SANITIZE_STRING);
    $details = $_POST['details'];
    $details = filter_var($details, FILTER_SANITIZE_STRING);
    $cat = $_POST['category'];
    $cat = filter_var($cat, FILTER_SANITIZE_STRING);
 
    $image_01 = $_FILES['image_01']['name'];
    $image_01 = filter_var($image_01, FILTER_SANITIZE_STRING);
    $image_size_01 = $_FILES['image_01']['size'];
    $image_tmp_name_01 = $_FILES['image_01']['tmp_name'];
    $image_folder_01 = '../uploaded_img/'.$image_01;
 
    $image_02 = $_FILES['image_02']['name'];
    $image_02 = filter_var($image_02, FILTER_SANITIZE_STRING);
    $image_size_02 = $_FILES['image_02']['size'];
    $image_tmp_name_02 = $_FILES['image_02']['tmp_name'];
    $image_folder_02 = '../uploaded_img/'.$image_02;
 
    $image_03 = $_FILES['image_03']['name'];
    $image_03 = filter_var($image_03, FILTER_SANITIZE_STRING);
    $image_size_03 = $_FILES['image_03']['size'];
    $image_tmp_name_03 = $_FILES['image_03']['tmp_name'];
    $image_folder_03 = '../uploaded_img/'.$image_03;
 
    $select_products = $conn->prepare("SELECT * FROM `products` WHERE id = ?");
    $select_products->execute([$name]);
 
    if($select_products->rowCount() > 0){
       $message[] = 'product name already exist!';
    }else{

        $insert_products = $conn->prepare("INSERT INTO `products`( name, details, price, image_01, image_02, image_03, category_name) VALUES(?,?,?,?,?,?,?)");
        $insert_products->execute([ $name, $details, $price, $image_01, $image_02, $image_03, $cat]);
  
        if($insert_products){
           if($image_size_01 > 2000000 OR $image_size_02 > 2000000 OR $image_size_03 > 2000000){
              $message[] = 'image size is too large!';
           }else{
              move_uploaded_file($image_tmp_name_01, $image_folder_01);
              move_uploaded_file($image_tmp_name_02, $image_folder_02);
              move_uploaded_file($image_tmp_name_03, $image_folder_03);
              $message[] = 'new product added!';
           }
  
        }
  
     }  
 
 };


?>

<div class="page-container">
    <div class="main-content ">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Add New </strong>Product
                            </div>
                            <div class="card-body card-block">
                                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">product name (required)</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="name" required placeholder="Text" class="form-control">
                                            <small class="form-text text-muted">add your products name</small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="number" class=" form-control-label">product price (required)</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="number" id="email-input" name="price" required placeholder="enter your product price" class="form-control" onkeypress="if(this.value.length == 10) return false;">
                                            <small class="help-block form-text">Please enter your product price</small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">Product Category</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select id="select" class="form-control" required name="category">
                                                <?php
                                                    $select_category = $conn->prepare("SELECT category_name FROM `category`");
                                                    $select_category->execute();
                                                    while ($row = $select_category->fetch(PDO::FETCH_ASSOC)) {
                                                        $array[] = $row['category_name'];
                                                    }
                                                    foreach ($array as $arr) { ?>
                                                                <option value = "<?php print($arr); ?>"> <?php print($arr); ?></option>
                                                        <?php 
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="textarea-input" class=" form-control-label">Product Description</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <textarea name="details" id="textarea-input" rows="9" required placeholder="Description..." class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="file-multiple-input" class=" form-control-label">Product image 1</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="file-multiple-input" required name="image_01" multiple="" class="form-control-file">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="file-multiple-input" class=" form-control-label">Product image 2</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="file-multiple-input" required name="image_02" multiple="" class="form-control-file">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="file-multiple-input" class=" form-control-label">Product image 3</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="file-multiple-input" required name="image_03" multiple="" class="form-control-file">
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <input type="submit" value="Submit" name="add_product" class="btn btn-success btn-md">
                                        <a href="product.php" class="btn btn-primary btn-md">go back</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('./footer.php'); ?>