<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Candy Tones - Online Food Store</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php

$action = isset($_POST['action']) ? $_POST['action'] : null;

      $nameErr = $emailErr = $phoneErr = $addressErr = $candyErr =$quantityErr= "";

      $name = $email = $phone =  $address = $candy = $quantity = "";
      $name2Err = $email2Err = $message2Err = "";

      $name2 = $email2 = $message2 = "";

switch($action){
    case 'contact':
      
      $validated_contact = true;

     if ($_SERVER["REQUEST_METHOD"] == "POST") {
          if (empty($_POST["name2"])) {
          $name2Err = "First Name is required";
          $validated_contact = false;
          } else {
            
          $name2 = test_input($_POST["name2"]);
          if (!preg_match("/^[a-zA-Z-' ]*$/",$name2)) {
              $name2Err = "Only letters and white space allowed";
              $validated_contact = false;
          }
          }
          
          
          if (empty($_POST["email2"])) {
          $email2Err = "Email is required";
          $validated_contact = false;
          } else {
            
          $email2 = test_input($_POST["email2"]);
          if (!filter_var($email2, FILTER_VALIDATE_EMAIL)) {
              $email2Err = "Invalid email format";
              $validated_contact = false;
          }
          }

          
          if (empty($_POST["message2"])) {
              $message2Err = "Message is required";
              $validated_contact = false;
          } else {
        
          $message2 = test_input($_POST["message2"]);
          }
          
          echo '<script type="text/javascript">
          window.location = "index.php#contact"
          </script>';
      
      }
      if($validated_contact){
        $host = "localhost";
        $username = "root";
        $password = "";
        $db = "db_candy";

        $conn = new mysqli($host,$username,$password,$db);
        if($conn->connect_error){
            echo "$conn->connect_error";
            echo '<script>alert("Error Occured...")</script>';
            echo '<script type="text/javascript">
            window.location = "index.php"
            </script>';
        } else {
            $stmt = $conn->prepare("insert into tbl_contact(name,email, message) values(?,?,?)");
            $stmt->bind_param("sss", $name2, $email2, $message2);
            $execval = $stmt->execute();
            echo '<script>alert("Thank you for contacting us..")</script>';
            echo '<script type="text/javascript">
            window.location = "index.php"
            </script>';
            $stmt->close();
            $conn->close();
    }
    }else{
        echo '<script type="text/javascript">
        window.location = "index.php#contact-form"
        </script>';
    }
        break;
    case 'order':
      
        $validated_order = true;

     if ($_SERVER["REQUEST_METHOD"] == "POST") {
          if (empty($_POST["name"])) {
          $nameErr = "First Name is required";
          $validated_order = false;
          } else {
          $name = test_input($_POST["name"]);
          if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
              $nameErr = "Only letters and white space allowed";
              $validated_order = false;
          }
          }
          
          if (empty($_POST["email"])) {
          $emailErr = "Email is required";
          $validated_order = false;
          } else {
          $email = test_input($_POST["email"]);
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $emailErr = "Invalid email format";
              $validated_order = false;
          }
          }

          if (empty($_POST["phone"])) {
              $phoneErr = "Phone Number is required";
              $validated_order = false;
          } else {
              $phone = test_input($_POST["phone"]);
              if (!preg_match('/^[0-9]*$/', $phone)) {
                  $phoneErr = "Invalid phone number";
                  $validated_order = false;
              }
          }
          
          if (empty($_POST["address"])) {
              $addressErr = "address is required";
              $validated_order = false;
          } else {
          $address = test_input($_POST["address"]);
          }
          if (empty($_POST["candy"])) {
              $candyErr = "candy is required";
              $validated_order = false;
          } else {
          $candy = test_input($_POST["candy"]);
          }
          if (empty($_POST["quantity"])) {
            $quantityErr = "Quantity is required";
            $validated_contact = false;
        } else {
      
        $quantity = test_input($_POST["quantity"]);
        }
          echo '<script type="text/javascript">
          window.location = "index.php#order"
          </script>';

          if($validated_order){
            $host = "localhost";
            $username = "root";
            $password = "";
            $db = "db_candy";
    
            $conn = new mysqli($host,$username,$password,$db);
            if($conn->connect_error){
                echo "$conn->connect_error";
                echo '<script>alert("Error Occured...")</script>';
                echo '<script type="text/javascript">
                window.location = "index.php"
                </script>';
            } else {
                $stmt = $conn->prepare("insert into tbl_order(name,email, phone,address,candy,quantity) values(?,?,?,?,?,?)");
                $stmt->bind_param("sssssi", $name, $email, $phone,$address,$candy,$quantity);
                $execval = $stmt->execute();
                echo '<script>alert("Thank you for ordering.")</script>';
                echo '<script type="text/javascript">
                window.location = "index.php"
                </script>';
                $stmt->close();
                $conn->close();
        }
        }else{
            echo '<script type="text/javascript">
            window.location = "index.php#order"
            </script>';
        }
      
      }
        break;
    default:
        //action not found
        break;
}
                function test_input($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }

                

               
                
        ?>
  <header>
    <img id="logo" src="images/logo.png" alt="Candy Tones Logo">
    <nav>
      <a href="#menu">Menu</a>
      <a href="#cart">Cart</a>
      <a href="#order">Order</a>
      <a href="#about">About Us</a>
      <a href="#ship">Shipping Policies</a>
      <a href="#contact">Contact Us</a>
    </nav>
    
  </header>

  <div class="additional-info">
    <p>This is some additional information about my projects and achievements.</p>
  </div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
  <main>
<section id="header" class="fade-in">
 <h1>CANDY TONES...</h1>
 <h3>BEST THINGS IN LIFE ARE SWEET!!</h3>
</section>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="slider" id="image-slider">
  <img src="images/is1.jpg" class="slider-image">
  <img src="images/is2.jpg" class="slider-image">
  <img src="images/is3.jpg" class="slider-image">
  
  
</div>


<br>
<br>
<br>


              <section id="menu">
  <h2>~Menu~</h2>
  <br>
  <h3>Sri Lankan Candies</h3>
  <ul>
    <li>
      <h4><u>Kiri Pani</u></h4>
      <img src="images/kiri.jpg" alt="Kiri Pani">
      <p>A delicious coconut and jaggery-based candy with a creamy texture.</p>
      <p><strong>$2.49</strong></p>
      <button class="add-to-cart" data-name="Kiri Pani" data-price="2.49">Add to Cart</button>
    </li>
    <li>
      <h4><u>Kokis</u></h4>
      <img src="images/kokis.jpg" alt="Kokis">
      <p>A crispy and intricately shaped deep-fried sweet made with rice flour and coconut milk.</p>
      <p><strong>$1.99</strong></p>
      <button class="add-to-cart" data-name="Kokis" data-price="1.99">Add to Cart</button>
    </li>
    <li>
      <h4><u>Kewum</u></h4>
      <img src="images/kewum.jpg" alt="Kewum">
      <p>A sticky and chewy candy made from rice flour, jaggery, and coconut.</p>
      <p><strong>$2.19</strong></p>
      <button class="add-to-cart" data-name="Kewum" data-price="2.19">Add to Cart</button>
    </li>
    <li>
      <h4><u>Asmi</u></h4>
      <img src="images/asmi.jpg" alt="Asmi">
      <p>A deep-fried, crispy snack made from a batter consisting of wheat flour, coconut milk, sugar, and various spices</p>
      <p><strong>$2.29</strong></p>
      <button class="add-to-cart" data-name="Asmi" data-price="2.29">Add to Cart</button>
    </li>
    <li>
      <h4><u>Aluwa</u></h4>
      <img src="images/aluwa.jpg" alt="Aluwa">
      <p>A traditional Sri Lankan sweet made from rice flour, jaggery, and various spices.</p>
      <p><strong>$1.99</strong></p>
      <button class="add-to-cart" data-name="Aluwa" data-price="1.99">Add to Cart</button>
    </li>
    <li>
      <h4><u>Puhul Dosi</u></h4>
      <img src="images/puhuldosi.jpg" alt="Puhul Dosi">
      <p>A delightful combination of jaggery, peanuts, sesame seeds, and cardamom.</p>
      <p><strong>$1.99</strong></p>
      <button class="add-to-cart" data-name="Puhul Dosi" data-price="1.99">Add to Cart</button>
    </li>
  </ul>
</section>

<section id="cart">
  <h2>~Cart~</h2>
  <div id="cart-items">

  </div>

  <div id="cart-total">
    <h3>Cart Total:</h3>
    <span id="total-amount">$0.00</span>
  </div>

  <div id="cart-buttons">
    <button id="clear-cart">Clear Cart</button>
    <button id="checkout">Checkout</button>
  </div>
</section>



<br>
<br>

    <section id="order">
  <h2>~Order~</h2>
  <h3>Place Your Candy Order</h3>
  <p>To satisfy your sweet cravings, simply fill out the form below and place your candy order. Our team will process your order and ensure a delightful candy experience delivered right to your doorstep.</p>
  
  <form id="order-form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>
    <span class="error"><?php echo $nameErr;?></span>
    
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <span class="error"><?php echo $emailErr;?></span>

    <label for="phone">Phone:</label>
    <input type="tel" id="phone" name="phone" required>
    <span class="error"><?php echo $phoneErr;?></span>
    
    <label for="address">Delivery Address:</label>
    <textarea id="address" name="address" required></textarea>
    <span class="error"><?php echo $addressErr;?></span>
    
    <label for="candy">Candy Selection:</label>
    <select id="candy" name="candy" required>
      <option value="">Select Candy</option>
      <option value="kiri-pani">Kiri Pani</option>
      <option value="kokis">Kokis</option>
      <option value="asmi">Asmi</option>
      <option value="kewum">Kewum</option>
	  <option value="Aluwa">Aluwa</option>
	  <option value="puhul dosi">Puhul Dosi</option>
    </select>
    <span class="error"><?php echo $candyErr;?></span>
    
    
    <label for="quantity">Quantity:</label>
    <input type="number" id="quantity" name="quantity" min="1" max="100" required>
    <span class="error"><?php echo $quantityErr;?></span>

    <input type="hidden" name="action" value="order">
    
    <button type="submit">Place Order</button>
  </form>
</section>
<br>
<br>

    <section id="about">
  <h2>~About Us~</h2>
  
  <h3>Welcome to Candy Tones!</h3>
  <p>Established in 2020, Candy Tones has been delighting customers with a wide range of delectable candies and sweet treats for over 3 years. With our passion for quality and innovation, we have become a beloved name in the confectionery industry.</p>
  
  <h3>Our Vision:</h3>
  <p>At Candy Tones, our vision is to bring joy and sweetness to people's lives through our delightful range of candies. We strive to create memorable experiences and satisfy the sweet cravings of our valued customers.</p>
  
  <h3>Multiple Branches:</h3>
  <p>With our commitment to expanding our reach, Candy Tones proudly boasts four branches located in key cities across Sri Lanka. You can find our stores in Kurunegala, Wattala, Ja-Ela, and Kegalle. Each branch offers a vibrant and inviting atmosphere where candy lovers can indulge in a world of sweetness.</p>
  
  <h3>Exquisite Candy Selection:</h3>
  <p>At Candy Tones, we curate an exquisite selection of candies sourced from the finest ingredients. Our candies are handcrafted with love and attention to detail, ensuring exceptional taste and quality. Whether you have a penchant for traditional Sri Lankan sweets or crave international flavors, our diverse range of candies is sure to satisfy your sweet tooth.</p>
  
  <h3>Customer Satisfaction:</h3>
  <p>We value our customers and strive for their utmost satisfaction. Our dedicated and friendly team is always ready to assist you in finding the perfect candy for any occasion. We prioritize quality, freshness, and exceptional customer service, making your visit to Candy Tones a delightful experience.</p>
</section>

<br>
<br>

<section id="ship">
  <h2>~Shipping Policies~</h2>
  <p>Deliveries are made to your doorstep. We have a delivery policy section that you should read and understand.</p>
  <p>Mainland Sri Lanka deliveries: Orders placed within Sri Lanka will be completed and delivered within 3 to 5 days of order placement.</p>
  <button id="see-more">See More</button>
  <button id="see-less" class="hidden">See Less</button>
  <p id="process-time" class="hidden">Time it takes to process: We will process your order within 1-3 business days. We will hand over your order to our delivery partners so that it can be delivered quickly and reliably. After 04.00 pm, orders will be counted as next day orders. It is not guaranteed that these times will be met. Dispatch and delivery times may take longer for certain products.</p>
  <p id="delivery-fees" class="hidden">Delivery fees: Only the locations and countries indicated on our website are eligible for delivery. For delivery within Sri Lanka, we charge a fee based on the distance traveled. For purchases shipped outside of the nation, shipping charges will be determined based on the final product package weight, shipment fee, taxes, and related expenses. Additional fees (customs clearance fee, VAT, import duty, etc.) must be paid by the buyer at the time of shipment. Shipment costs, taxes, packing fees, and import tariffs may vary by country. Orders are delivered by third-party delivery providers. We shall not be held liable if the delivery service/company fails to deliver the order for any reason beyond our control. We will not issue refunds in such cases. In the case of non-delivery due to circumstances beyond the Supplier's control (customer error), the customer will bear the whole cost. (Incorrect contact information, not being present at the time of delivery, and other similar conditions) Please enter proper delivery information (delivery address and contact information).</p>
  
</section>



	<br>
<br>
	<section id="contact">
  <h2>~Contact Us~</h2>
  
  <div id="contact-info">
    <h3>Get in Touch</h3>
    <p>Main Address: 123 Candy Tones, Kurunegala, Sri Lanka</p>
    <p>Email: candytones@gmail.com</p>
    <p>Facebook: <a href="https://www.facebook.com/candytones">Candy Tones</a></p>
    <p>Instagram: <a href="https://www.instagram.com/candytones" >@candytones</a></p>
    <p>Business WhatsApp: <a href="tel:+94764340049">+94764340049</a></p>
  </div>
  
  <div id="contact-form" >
    <h3>Send us a Message</h3>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name2" required>
      <span class="error"><?php echo $name2Err;?></span>
      
      <label for="email">Email:</label>
      <input type="email" id="email" name="email2" required>
      <span class="error"><?php echo $email2Err;?></span>
      
      <label for="message">Message:</label>
      <textarea id="message" name="message2" required></textarea>
      <span class="error"><?php echo $message2Err;?></span>
      <input type="hidden" name="action" value="contact">
      
      <button type="submit">Send</button>
    </form>
  </div>
  
  <div id="location-map">
    <a href="https://www.google.com/search?sxsrf=APwXEdcTxY4jglBaU0jWiOi_X4uVZSwH_A:1684592887457&q=candy+stores+in+sri+lanka&npsic=0&rflfq=1&rldoc=1&rllag=6907273,79851127,340&tbm=lcl&sxsrf=APwXEdcTxY4jglBaU0jWiOi_X4uVZSwH_A:1684592887457&sa=X&ved=2ahUKEwjolpfFjYT_AhVk-TgGHZ7CCSsQtgN6BAgOEAE">
        Explore Candy Stores in Sri Lanka
    </a>
</div>
</section>
  </main>
<br>
<br>

<aside id="sidebar">
  <ul>
    <li><a href="#menu"><img src="images/menus.png" alt="Menu" title="Menu"></a></li>
    <li><a href="#order"><img src="images/shopping-bag.png" alt="Order" title="Order"></a></li>
    <li><a href="#contact"><img src="images/operator.png" alt="Contact Us" title="Contact Us"></a></li>

  </ul>
  
</aside>

<br>
<br>
<br>

  <footer>
    <ul>
      <li><a href="https://www.facebook.com/candytones"><img src="images/fb.png" alt="Facebook Icon" title="Facebook"></a></li>
      <li><a href="https://www.instagram.com/candy_tones"><img src="images/insta.png" alt="Instagram Icon" title="Instagram"></a></li>
      <li><a href="https://wa.me/94764340049"><img src="images/whatsapp.png" alt="Whatsapp Icon" title="Whatsapp"></a></li>
    </ul>
    <p style="font-size: 15px; color: white;">&copy; 2023 Hashan Senarathne-Candy Tones. All rights reserved.</p>
  </footer>
  <script src="script_2.js"></script>

</body>
</html>
