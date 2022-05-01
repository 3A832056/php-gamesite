<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>Product example · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/product/">

    

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
	  .p1{
		  text-align:left;
	  }
	  .price{
		  color:red;
		  margin-top:50px;

	  }
			  .qty {
		  width: 40px;
		  height: 35px;
		  text-align: center;
		  border: 0;
		  border-top: 1px solid #aaa;
		  border-bottom: 1px solid #aaa;
		}


		input.qtyplus {
		  width: 25px;
		  height: 35px;
		  border: 1px solid #aaa;
		  background: #f8f8f8;
		}

		input.qtyminus {
		  width: 25px;
		  height: 35px;
		  border: 1px solid #aaa;
		  background: #f8f8f8;
		}
		.total{
			 margin-top:30px;
			margin-left:350px;
		}
		.delete{
			 margin-top:20px;
			margin-left:380px;
		}
    </style>

    
    <!-- Custom styles for this template -->
    <link href="product.css" rel="stylesheet">
  </head>
  <body>
    
<header class="site-header sticky-top py-1">
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-info">
    <div class="container-fluid">	
     <a class="navbar-brand" href="home.php">
      <img src="../images/1.png" width="50" height="50" class="d-inline-block align-top" alt="">
    </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#"><font color="white" size="4">商品</font></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><font color="white" size="4">PS5</font></a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="#"><font color="white" size="4">PS4</font></a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="#"><font color="white" size="4">NS</font></a>
          </li>
        </ul>
        <!--<form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>-->
		<a class="navbar-brand test" href="home.php">
			<img src="../images/cart.png" width="30" height="30" class="d-inline-block align-top-1" alt="">
		</a>
		<a class="navbar-brand test" href="sign.php">
			<img src="../images/user.png" width="30" height="30" class="d-inline-block align-top-1" alt="">
		</a>
			<?php
			session_start(); 
			if($_SESSION['success']!="")
			{
				echo'<div class="btn-group">
				<button type="button" class="btn btn-white dropdown-toggle" data-toggle="dropdown"><font  size="3">'.$_SESSION['success'].'</font></button>
				<ul class="dropdown-menu">
					<li><a href="home.php?lgout=1">登出</a></li>
				</ul>';
			}	
			if($_GET['lgout']==1)
				{
					unset($_SESSION['success']);
					echo"<script>alert('登出成功')</script>";
					echo"<script>window.location.href='home.php'</script>";
				}				
			?>  
      </div>
    </div>
  </nav>
</header>
<body>
	<?php
	session_start();
	$hn="localhost";
$db="game";
$un="test";
$pw="123";
$db_link = @mysqli_connect($hn,$un,$pw,$db);
					$check="SELECT * FROM `book` where user='".$_SESSION['success']."'";
					$result = mysqli_query($db_link, $check);
					$rows=$result->num_rows;
						for($j=0;$j<$rows;$j++)
						{
							$row=$result->fetch_array(MYSQLI_ASSOC);
							 echo'
							<div class="d-md-flex flex-md-equal w-200 my-md-3 ps-md-3">
								<div class=" me-md-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
								  <div class="my-3 py-3">
									<img class="bd-placeholder-img rounded-square" width="250" height="250"  src="'.$row['images'].'" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"></img>
								  </div>
								  </div>
								<div class=" me-md-3 pt-md-5 px-md-5  text-black ">
								  <div class="my-3 p-3">
									<h5 class="1">'.$row['product'].'</h5>
								  
								  </div>
								  <h6 class="price">NT$'.$row['price'].'</h6>
									訂購數量:'.$row['quantity'].'
									<form action="" method="POST" name="delete">
									<p><button class="btn btn-primary delete" type="submit" name="delete" value="刪除訂單">刪除訂單</button></p>
									</form>
									<h6 class="total"><font color="black">總金額:NT$'.$row['total'].'</font></h6>
								</div>
							</div>';
							if($_POST['delete']=="刪除訂單")
							{
								$sql="DELETE FROM `book` WHERE product='".$row['product']."'";
								$result=mysqli_query($db_link,$sql);
								echo"<script>window.location.href='cart.php'</script>";
							}
						}
	?>
	
	
</body>