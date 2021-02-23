<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!DOCTYPE html>
<?php
	session_start();
	require_once "pages/dbconnect.php";
?>
<html lang="en">
<head>
  <title>E - Bookstore</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
  <style>
	table.catinfo{
      border: 2px solid black;
      border-collapse: collapse;
	}
	td.catinfo{
		border: 2px solid black;
		border-collapse: collapse;
		padding: 5px;
	}
	th.catinfo{
		border: 2px solid black;
		border-collapse: collapse;
		padding: 5px;
		text-align: center;
	}
    /* Remove the navbar's default margin-bottom and rounded borders */
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;}
    }
  </style>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
	//debugging
	console.log("TOPKEK");
	//pairno tis times apo tis metablites moy 
	//var cid = $(this).val(); //lathos
		$("#button").click(function() {
			var cid = $("#cid").val();
			$.post("./pages/do_percustomerordersajax.php", {
				cid:cid
		}, function(data,status) {
			$("#target").html(data);
			console.log(status);
		});
		});

	});
</script>

</head>

<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="?p=start">Bookstore</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      	<?php 
			if ( ! isset($_REQUEST['p'])){
				$_REQUEST['p']='start';
			}
			$p = $_REQUEST['p'];
			switch($p){
				case "start" : echo '<li class="active"><a href="index.php?p=start">Home Page</a></li>
        							 <li><a href="?p=shopinfo">About us</a></li>
        							 <li><a href="?p=products">Products</a></li>
        							 <li><a href="?p=cart">Shopping cart</a></li>
											 <li><a href="?p=contactus">Contact us</a></li>';
					break;
				case "shopinfo" : echo '<li><a href="index.php?p=start">Home Page</a></li>
        							 <li class="active"><a href="?p=shopinfo">About us</a></li>
        							 <li><a href="?p=products">Products</a></li>
        							 <li><a href="?p=cart">Shopping cart</a></li>
        							 <li><a href="?p=contactus">Contact us</a></li>';
					break;
				case "login" : echo '<li><a href="index.php?p=start">Home Page</a></li>
        							 <li><a href="?p=shopinfo">About us</a></li>
        							 <li><a href="?p=products">Products</a></li>
        							 <li><a href="?p=cart">Shopping cart</a></li>
        							 <li><a href="?p=contactus">Contact us</a></li>';
					break;
				case "do_login" : echo '<li><a href="index.php?p=start">Home Page</a></li>
        							 <li><a href="?p=shopinfo">About us</a></li>
        							 <li><a href="?p=products">Products</a></li>
        							 <li><a href="?p=cart">Shopping cart</a></li>
        							 <li><a href="?p=contactus">Contact us</a></li>';

					break;
				case "products" : echo '<li><a href="index.php?p=start">Home Page</a></li>
        							 <li><a href="?p=shopinfo">About us</a></li>
        							 <li class="active"><a href="?p=products">Products</a></li>
        							 <li><a href="?p=cart">Shopping cart</a></li>
        							 <li><a href="?p=contactus">Contact us</a></li>';
        			break;
        		case "cart" : echo '<li><a href="index.php?p=start">Home Page</a></li>
        							 <li><a href="?p=shopinfo">About us</a></li>
        							 <li><a href="?p=products">Products</a></li>
        							 <li class="active"><a href="?p=cart">Shopping cart</a></li>
        							 <li><a href="?p=contactus">Contact us</a></li>';
        			break;
				case "contactus" : echo '<li><a href="index.php?p=start">Home Page</a></li>
        							 <li><a href="?p=shopinfo">About us</a></li>
        							 <li><a href="?p=products">Products</a></li>
        							 <li><a href="?p=cart">Shopping cart</a></li>
        							 <li class="active"><a href="?p=contactus">Contact us</a></li>';

					break;
				case "logout" : echo '<li><a href="index.php?p=start">Home Page</a></li>
        							 <li><a href="?p=shopinfo">About us</a></li>
        							 <li><a href="?p=products">Products</a></li>
        							 <li><a href="?p=cart">Shopping cart</a></li>
        							 <li><a href="?p=contactus">Contact us</a></li>';

					break;
				default : echo '<li class="active"><a href="index.php?p=start">Home Page</a></li>
        							 <li><a href="?p=shopinfo">About us</a></li>
        							 <li><a href="?p=products">Products</a></li>
        							 <li><a href="?p=cart">Shopping cart</a></li>
        							 <li><a href="?p=contactus">Contact us</a></li>';
					break;
			}
		?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php 
        	if (!isset($_SESSION['username'])) 
        		echo '<li><a href="?p=login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>'; 
        	else
        		echo '<li><a href="?p=logout"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>';
        ?>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">
  <div class="row content">
    <div class="col-sm-2 sidenav">
		<?php 
			if (isset($_SESSION['username'])){
				if ($_SESSION['username']=='admin'){
					require('./pages/admin_menu.php');
				}else{
					print "<p> User -> $_SESSION[username]</p>";
					require('./pages/customermenu.php');
				}
			}else{
				print "Log in to see the menu";
			}
			if (isset($_REQUEST['p']) && $_REQUEST['p'] == "products" || $_REQUEST['p'] == "catinfo" || $_REQUEST['p'] == "productinfo"){
				require "./pages/menuleft.php";
			}
		?>
    </div>
    <div class="col-sm-8 text-left">
		<?php 
			if ( ! isset($_REQUEST['p'])){
				$_REQUEST['p']='start';
			}
			$p = $_REQUEST['p'];
			switch($p){
				case "start" : require "./pages/home.php";
					break;
				case "shopinfo" : require "./pages/shopinfo.php";
					break;
				case "login" : require "./pages/login.php";
					break;
				case "do_login" : require "./pages/do_login.php";
					break;
				case "contactus" : require "./pages/contactus.php";
					break;
				case "logout" : require "./pages/logout.php";
					break;
				case "catinfo" : require "./pages/catinfo.php";
					break;
				case "productinfo" : require "./pages/productinfo.php";
					break;
				case "cart" : require "./pages/cart.php";
					break;
				case "add2cart" : require "./pages/add2cart.php";
					break;
				case "products" : require "./pages/products.php";
					break;
				case "register" : require "./pages/register.php";
					break;
				case "do_register" : require "./pages/do_register.php";
					break;
				case "do_order" : require "./pages/do_order.php";
					break;
				case "orders" : require "./pages/orders.php";
					break;
				case "profile" : require "./pages/profile.php";
					break;
				case "do_delete" : require "./pages/do_delete.php";
					break;
				case "changepassword" : require "./pages/changepassword.php";
					break;
				case "do_changepassword" : require "./pages/do_changepassword.php";
					break;
				case "do_deletecart" : require "./pages/do_deletecart.php";
					break;
				case "customers" : require "./pages/customers.php";
					break;
				case "do_percustomerorders" : require "./pages/do_percustomerorders.php";
					break;
				case "do_select" : require "./pages/do_select.php";
					break;
				case "do_deleteitem" : require "./pages/do_deleteitem.php";
					break;
				default :
					echo "This site doesn't exist.";
					break;
			}
		?>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p><a href="?p=logout"><font color="black"><b><i><u>destroy session (debugging purposes)</u></i><b></font></a></p>
</footer>

</body>
</html>



