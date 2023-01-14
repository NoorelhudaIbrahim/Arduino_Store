<?php

   if(isset($message)){
      foreach($message as $message){
         echo '
         <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
?>



<!-- <style>
   .navbar a{
      /* justify-content: center; */
      padding:50px;
   
</style> -->

<header class="header">


   <section class="flex">

      <a href="home.php" class="logo"><span><img style="height:60px; width:70px;" src="images/logo.png"></span></a>

      <nav class="navbar">
         <a href="home.php">Home</a>
         <a href="about.php">About us</a>
         <a href="orders.php">Orders</a>
         <a href="shop.php">Shop</a>
         <a href="contact.php">Contacts</a>
      </nav>

      <div class="icons">
         <?php
            // $count_wishlist_items = $conn->prepare("SELECT * FROM `wishlist` WHERE user_id = ?");
            // $count_wishlist_items->execute([$user_id]);
            // $total_wishlist_counts = $count_wishlist_items->rowCount();

            $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $count_cart_items->execute([$user_id]);
            $total_cart_counts = $count_cart_items->rowCount();
         ?>
         
         <div id="menu-btn" class="fas fa-bars"></div>
         <!-- <a href="search_page.php"><i class="fa-brands fa-searchengin" style="color: white;font-size: 2.1rem; margin-right:10px;"></i></a> -->
         <a href="cart.php" style="margin-right:10px;"><i class="fa-solid fa-bag-shopping" style="color: white;font-size: 2rem; "></i><p style=" display:inline-block; color:white; ">(<?= $total_cart_counts; ?>)</p></a>
         <div id="user-btn" class="fa-solid fa-user-tie" style="color: white;font-size: 2rem;"></div>
      </div>

      <div class="profile">
         <?php          
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            
          ///////////////////////////////////////show  update profile / logout //////// -->

            if(isset($_SESSION['user_id'])){
            // if($select_profile->rowCount() > 0){
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <p><?= $fetch_profile["name"]; ?></p>
         <a href="update_user.php" class="btn">update profile</a>
         <!-- <div class="flex-btn">
            <a href="user_register.php" class="option-btn">register</a>
            <a href="user_login.php" class="option-btn">login</a>
         </div> -->  
         <a href="components/user_logout.php" class="delete-btn" onclick="return confirm('logout from the website?');">logout</a> 
         

         <!-- //////////////////////////////////////////show  register/ login//////// -->
         
         <?php
            }else{
         ?>
         <p>please login or register first!</p>
         <div class="flex-btn">
            <a href="user_register.php" class="option-btn">register</a>

            <a href="user_login.php" class="option-btn">login</a>
         </div>

         <?php
            }
         ?>      
         
         
      </div>

   </section>

</header>