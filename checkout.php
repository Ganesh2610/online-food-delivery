<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
include_once 'product-action.php';
error_reporting(0);
session_start();
if(empty($_SESSION["user_id"]))
{
	header('location:login.php');
}
else {  
    $user_id = $_SESSION["user_id"];
    $query = "SELECT f_name, l_name, phone, address FROM users WHERE u_id = $user_id";
    
    $result = mysqli_query($db, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $firstname = $row['f_name'];
        $lastname = $row['l_name'];
        $user = $firstname . ' ' . $lastname; // Concatenate firstname and lastname
        $phone = $row['phone'];
        $address = $row['address'];
    } else {
        // Handle if no user is found for the provided user_id
        // You can set default values or perform other actions as needed
        $user = "Unknown";
        $phone = "";
        $address = "";
    }


										  
												foreach ($_SESSION["cart_item"] as $item)
												{
											
												$item_total += ($item["price"]*$item["quantity"]);
                                                $name = "SELECT username FROM users WHERE user_id=" . $_SESSION["user_id"];
                                                
												
													if($_POST['submit'])
													{
						
													$SQL="insert into users_orders(u_id,title,quantity,price) values('".$_SESSION["user_id"]."','".$item["title"]."','".$item["quantity"]."','".$item["price"]."')";
						                            
														mysqli_query($db,$SQL);
														
														$success = "Thankyou! Your Order Placed successfully!";

														
														
													}
												}
?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Starter Template for Bootstrap</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet"> </head>
<body>
    
    <div class="site-wrapper">
        <!--header starts-->
        <header id="header" class="header-scroll top-header headrom">
            <!-- .navbar -->
            <nav class="navbar navbar-dark">
                <div class="container">
                    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                   
                    <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                        <ul class="nav navbar-nav">
                            <li class="nav-item"> <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a> </li>
                            <li class="nav-item"> <a class="nav-link active" href="restaurants.php">Restaurants <span class="sr-only"></span></a> </li>
                            
							<?php
						if(empty($_SESSION["user_id"]))
							{
								echo '<li class="nav-item"><a href="login.php" class="nav-link active">login</a> </li>
							  <li class="nav-item"><a href="registration.php" class="nav-link active">signup</a> </li>';
							}
						else
							{
									
									
										echo  '<li class="nav-item"><a href="your_orders.php" class="nav-link active">your orders</a> </li>';
									echo  '<li class="nav-item"><a href="logout.php" class="nav-link active">logout</a> </li>';
							}

						?>
							 
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- /.navbar -->
        </header>
        <div class="page-wrapper">
            <div class="top-links">
                <div class="container">
                    <ul class="row links">
                      
                        <li class="col-xs-12 col-sm-4 link-item"><span>1</span><a href="restaurants.php">Choose Restaurant</a></li>
                        <li class="col-xs-12 col-sm-4 link-item "><span>2</span><a href="#">Pick Your favorite food</a></li>
                        <li class="col-xs-12 col-sm-4 link-item active" ><span>3</span><a href="checkout.php">Order and Pay online</a></li>
                    </ul>
                </div>
            </div>
			
                <div class="container">
                 
					   <span style="color:green;">
								<?php echo $success; ?>
										</span>
					
                </div>
            
			
                            </div>
                       
                    </div>
                </div>
				 </form>
            </div>
           
    
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
</body>

</html>

<?php
}
?>

<div class="container contact-form">
    <div class="contact-image">
        <img src="http://localhost/online-food-delivery/images/icon.png" alt="rocket_contact"/>
    </div>

    <form action="#" method="post" id="paymentForm">
    <h3 style="text-align:center">Your Order Summary</h3>
    <p style="color:orange">Free Shipping</p>

    <div class="form-group row">
        <label class="col-md-3" for="name">Name</label>
        <div class="col-md-9">
            <input type="text" name="name" class="form-control" required placeholder="Your Name *" value="<?php echo $user; ?>" readonly />
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3" for="email">Contact Number</label>
        <div class="col-md-9">
            <input type="text" name="email" class="form-control" required placeholder="Your Phone" value="<?php echo $phone?>" readonly />
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3" for="dish">Ordered Dish</label>
        <div class="col-md-9">
            <input type="text" name="dish" class="form-control" required placeholder="Dish" value="Ordered Dish: <?php echo $item['title']; ?>" readonly />
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3" for="amount">Total Bill Amount</label>
        <div class="col-md-9">
            <input type="text" name="amount" class="form-control" required placeholder="Total Amount *" value="<?php echo $item_total; ?>" readonly />
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3" for="address">Address</label>
        <div class="col-md-9">
            <input type="text" name="address" class="form-control" required placeholder="Enter your address" value="<?php echo $address; ?>" />
        </div>
    </div>

    <div class="form-group row">
    <div class="col-md-6">
            <input type="submit" onclick="return confirm('Are you sure?');" name="submit" class="btn btn-outline-success btn-block" value="Order now on Cash on Delivery">
        </div>
        <div class="col-md-6">
            <button  type="button" class="btnContact btn-outline-success btn-block" name="submit" id="payButton">Order Now Pay Online</button>
        </div>
     </div>
    
    
</form>

</div>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    // Function to open Razorpay payment on button click
    document.getElementById('payButton').addEventListener('click', function () {
        var name = document.getElementsByName('name')[0].value;
        var email = document.getElementsByName('email')[0].value;
        var amount = document.getElementsByName('amount')[0].value;

        var options = {
            key: 'rzp_test_pdgw8LKU6TomTL', // Replace with your Razorpay API key
            amount: amount * 100, // Amount in paise
            currency: 'INR',
            name: 'Foodie', // Replace with your company name
            description: 'Purchase description',
            image: 'http://localhost/online-food-delivery/images/icon.png', // Replace with your company logo URL
            handler: function (response) {
                alert('Payment successful: ' + response.razorpay_payment_id);
                // Add code to handle successful payment response
            },  theme: {
                color: '#ff0000', // Solid color for the payment window
                display: 'block',
                background: 'linear-gradient(to bottom, #ffcc00, #ff6699)'
    }
        };
        var rzp = new Razorpay(options);
        rzp.open();
    });
</script>
