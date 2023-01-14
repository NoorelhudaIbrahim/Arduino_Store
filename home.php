<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['addTOcart'])){
   $product_id = $_POST['product_id'];
   $product_name = $_POST['name'];
   $product_price = $_POST['price'];
   $product_image = $_POST['image'];
   $product_quantity = $_POST['quantity'];

   $send_to_cart = $conn->prepare("INSERT INTO `cart` (user_id , pid , name , price , image , quantity) VALUES (? , ? , ? , ?, ? , ?)"); 
   $send_to_cart->execute([$user_id , $product_id , $product_name , $product_price, $product_image, $product_quantity]);

}

// include 'components/wishlist_cart.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   
   <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Seymour+One&display=swap" rel="stylesheet">
   
   <style>
      .home-bg{
         background-image:none;  
      }

      .swiper-slide{
         background-image:url('project images/Untitled__8_-removebg-preview.png');
         background-repeat: no-repeat;
         background-size: 70%;
         /* height:50em; */


         height:35em;

         height:50em;
 

      }

      .swiper-slide img {
         width:100% !important;
         height:50% !important;
      
      }
     
      .swiper-slide h3 {
         background-color: #117693;
         color: white !important;

         display: block;
         width: 100%;
         margin-top: 15rem;
         border-radius: 0.5rem;
         padding: 1rem 3rem;
         font-size: 1.7rem;
         text-transform: capitalize;
         color: var(--white);
         cursor: pointer;
         text-align: center;

      }

      .swiper-slide h3,.swiper-slide img,a:hover{
         background-color: none !important;
      }

      .swiper-slide h3:hover{
         background-color: white;
         color: #117693 !important;
         border: 1px #117693 solid;
      }

      
      .imge_hoda_noor{
         background-image:url('images/bg33.jpg') !important;   
         background-size: 100%;
         background-repeat: no-repeat;
         height: 30% !important;
      }
      .img1{
         background-image:url('images/Untitled\ design\ \(1\).png') !important;
         background-size: 100%;
         background-repeat: no-repeat;
         height: 150% !important;

      }
      .img2{
         background-image:url('images/Untitled\ design\ \(1\).png') !important;
         background-size: 100%;
         background-repeat: no-repeat;
         height: 150% !important;

      }
      .img3{
         background-image:url('images/33.jpeg') !important;
         background-size: 130%;
         background-repeat: no-repeat;
         height: 150% !important;

      }
      .sale {
         margin-left :20px;
         padding:230px 100px 30px 20px;
      }

      .sale2{
         padding:50px 0px 30px 200px;
      }

    
      .swiper-pagination-bullet{
         background-color:white;
      }

      .btn{
        
         background-color:#117693;
      }

      .video{
         height:100%;
         width:100%;
      }
    
  
   </style>

</head>
<body>

<?php include 'components/user_header.php'; ?>

<div class="home-bg">

   <div class="home">
   <div> 
      <video src="https://www.datocms-assets.com/76605/1668676208-banner-handbrake.webm"  muted autoplay loop class="video"></video>
   </div>
      
      <!-- <div class="swiper home-slider"> 
      
         <div class="swiper-wrapper">

            <div class="swiper-slide slide imge_hoda_noor">
               <div class="content sale">
                  <span>up to 50% off</span>
                  <h3>Discover <br>the power of AI</h3>
                  <a href="shop.php" class="btn">shop now</a>
               </div>
            </div> --> 

             <!-- <div class="swiper-slide slide img1">
                <div class="image">
                  <img src="images/1.png" alt="">
               </div> 
               <div class="content sale2" style="margin-left:41%; margin-top:10%;">
                  <span>up to 50% off</span>
                  <h3>Discover <br>the power of AI</h3>
                  <a href="shop.php" class="btn">shop now</a>
               </div>
            </div> -->

            <!-- <div class="swiper-slide slide img2"> 
                <div class="image">
                  <img src="images/from-human.png" alt="0">
               </div> 
               <div class="content sale2" style="margin-left:-13rem; ">
                  <span>up to 50% off</span>
                  <h3>Discover <br>the power of AI</h3>
                  <a href="shop.php" class="btn">shop now</a>
               </div>
            </div> -->

            <!-- <div class="swiper-slide slide img3"> 
               <div class="image">
                  <img src="images/to-machine.png" alt="">
               </div> 
               <div class="content sale2" style="margin-left:-13rem;">

                   <span>up to 50% off</span>
                  <h3>Discover <br>the power of AI</h3>
                  <a href="shop.php" class="btn">shop now</a>
               </div>
            </div>
         </div>
         <div class="swiper-pagination"></div>
      </div>  -->
 
</div>

<div>

            <!-- Add section Discount -->
                         
   <section class="category" >

<div >
<!-- -----------------------------------category---------------------------------------------------- -->
<section class="category">


   <h1 class="heading">shop by category</h1>


   <div class="swiper category-slider" >

   <div class="swiper-wrapper">



   <a href="category.php?category=Kits" class="swiper-slide slide">
      <img src="uploaded_img/Arduino starter-kit.jpg" alt="">
      <h3>Kits</h3>
   </a>

   <a href="category.php?category=Nano Family" class="swiper-slide slide">
      <img src="uploaded_img/Arduino nano-33-ble.jpg" alt="">
      <h3>Nano Family</h3>
   </a>

   <a href="category.php?category=MKR Family" class="swiper-slide slide">
      <img src="uploaded_img/Arduino-mkr_1000_wifi.jpg" alt="">
      <h3>MKR Family</h3>
   </a>

   <a href="category.php?category=Classic Family" class="swiper-slide slide">
      <img src="uploaded_img/Arduino-leonardo.jpg" alt="">
      <h3>Classic Family</h3>
   </a>

   </div>
       <div class="swiper-pagination"></div>
   </div>



</section>

</section>

<!-- -------------------------------------------------------------------------------- -->


<!-- ---------------------sales product----------------------------------- -->
<section class="home-products">

   <h1 class="heading">Sales Product</h1>

   <div class="swiper products-slider">

   <div class="swiper-wrapper">

   <?php

     $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6 "); 

     $select_products = $conn->prepare("SELECT * FROM `products` WHERE on_sale='1'"); 

     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
         $i=0;
   ?>
   <form action="" method="post" class="swiper-slide slide" style="height:430px">
      <input type="hidden" name="product_id" value="<?= $fetch_product['id']; ?>">
      <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>">
      <?php 
      if ($fetch_product['on_sale'] == 1){
         ?>
         <input type="hidden" name="price" value="<?=$fetch_product['new_price'];?>">
         <?php
      } else {
         ?>
         <input type="hidden" name="price" value="<?=$fetch_product['price'];?>">
         <?php
      }
      ?>
      <input type="hidden" name="image" value="<?= $fetch_product['image_01']; ?>">
      <a href="quick_view.php?pid=<?= $fetch_product['id']; ?>" class="fas fa-eye"></a>
      <img src="uploaded_img/<?= $fetch_product['image_01']; ?>" alt="">
      <div class="name"><?= $fetch_product['name']; ?></div>
      <?php $product_category = $conn->prepare("SELECT * FROM products INNER JOIN category ON products.category_name = category.category_id");
                  $product_category->execute();
                  if($product_category->rowCount() > 0){
                     while($fetch_product_category = $product_category->fetch(PDO::FETCH_ASSOC)){ 
                        if($i==0 && $fetch_product['category_name'] == $fetch_product_category['category_id'] ){
                        $i++;
            ?>
                  <?= $fetch_product_category['category_id']; ?>
            <?php 
                        }
                     }
                  }
            ?>
      <div class="flex">

         <?php if ($fetch_product['on_sale'] == 1){ ?>

            <div class="price"><span><del style="text-decoration:line-through; color:silver">$<?= $fetch_product['price']; ?></del><ins style="color:#67022f; padding:20px 0px"> $<?=$fetch_product['new_price'];?></ins> </span></div>

         <?php } else { ?>

            <div class="name" style="color:green;">$<?= $fetch_product['price']; ?></div> <?php } ?>

         <?php if ($fetch_product['category_name'] != 'Nano Family'){?>


            <input type="number" name="quantity" class="qty" min="1" max="99" value="1">

         <?php } else { ?>
            <input type="hidden" name="quantity" value="1">
         <?php } ?> 

      </div>
      <button type="submit" class="btn" name="addTOcart">Add To Cart</button>
   </form>

   <?php
      }
   }else{
      echo '<p class="empty">no products added yet!</p>';
   }
   ?>

   </div>

   <div class="swiper-pagination"></div>

   </div>

</section>





<!-- -----------------advantages--------------------------------------- -->

<section >

<div class="noor">
   <span><i class="fa-solid fa-user-shield"></i></span>
  
   <span><i class="fa-solid fa-truck-fast"></i></span>
   
   <span><i class="fa-solid fa-screwdriver-wrench"></i></span>
   
   
</div>
<div class="noor1">
   <span class="huda1">Secure payments</span>
   <span class="huda1"> worldwide delivery</span>
   <span class="huda1">Excellent service</span>
</div>

</section>



<?php include 'components/footer.php'; ?>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".home-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
    },
});

 var swiper = new Swiper(".category-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
         slidesPerView: 2,
       },
      650: {
        slidesPerView: 3,
      },
      768: {
        slidesPerView: 4,
      },
      
   },
});

var swiper = new Swiper(".products-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      550: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
   },
});

</script>

</body>
</html>