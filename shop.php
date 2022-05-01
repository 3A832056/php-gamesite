<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<!--以IE瀏覽器相容模式來顯示，預設為微軟最新的edge瀏覽模式來顯示-->
	<meta name="viewport" content="width-device-width, initial-scale-1">
	<!--網頁寬度設定為行動裝置的螢幕寬度且縮放比例為1:1-->
	<title>登入</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!--bootstrap核心 CSS 檔案-->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
	<!--bootstrap佈景主題 CSS 檔案-->
	<script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
	<!--jquery核心檔案-->
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!--jquery核心 js 檔案-->
	
	<style>
		.panel-body{
			position:absolute;
			left:50%;
			top:50%;
			border-radius:10px;
			width:300px;
			height:450px;
			margin-left:-150px;
			margin-top:-200px;
			background-color:white;
		}
		  .btn{
  margin:3px !important;
}
.game-search{
			margin-top:6px;
		}
		.container{
			margin-top:100px;
			
		}
		 .price{
		  color:red;
		  margin-top:50px;
		margin-right:475px;
	  }
	  .qty{
		  margin-top:10px;
		  margin-right:475px;
		 
	  }
	  .btn-group{
		  margin-left:570px;
	  }
	  	.total{

			margin-left:845px;
		}
		.OKOK{
			margin-left:930px;
		}
		.total2{

			margin-left:880px;
		}
		.total3{
			margin-top:200px;
		}
		.menu{

   position:fixed;
   right:0;
   top:90%;
   width:4em;
  }
  .navbar-brand{
			margin-top:-6px;
		}
	</style>
</head>
<body>
<header>
		<nav class="navbar navbar-inverse navbar-fixed-top bg-dark" >
			<div class="container-fluid">
				<div class="navbar-header">
					<a href="homepage.php" class="navbar-brand"><img src="../images/1.png" alt="" width="40" height="35"></a>
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
						<span class="sr-only">導覽按鈕</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav" >
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								商品<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="list.php?list=PS5">PS5</a></li>
								<li><a href="list.php?list=PS4">PS4</a></li>
								<li><a href="list.php?list=NS">NS</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								選單<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="rank.php?down=down">價格高到低</a></li>
									<li><a href="rank.php?add=add">價格低到高</a></li>
							</ul>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right" >
						<li class="game-search">
							<form method="POST">
								<input type="search" name="game" id="game" class="form-control" placeholder="搜尋遊戲">
								<span class="glyphicon glyphicon-search form-control-feedback"></span><!--查詢-->
							</form>
						</li>			
						<li><a href="shop.php"><span class="glyphicon glyphicon-shopping-cart"></span></a></li>	<!--購物車-->
						<?php
			session_start(); 
			if($_SESSION['success']!="")
			{
				echo "<li class='dropdown'>";
       echo "<a href='homepage.php' class='dropdown-toggle' data-toggle='dropdown'>";
       //顯示名稱                        
        echo "<font color='white'>".$_SESSION["success"]."</font>";                                 
       echo  "<span class='caret'></span>";
       echo "</a>";
       echo "<ul class='dropdown-menu'>";
       echo "<li><a href=homepage.php?lgout=1>登出</a></li>";
       echo "<li><a href=history.php?check=1>訂單查詢</a></li>";	
       echo "</ul>";
       echo "</li>";
			}	
			else {
							echo'<li><a href="signin.php"><span class="glyphicon glyphicon-user"></span></a></li>';			
						}
			if($_GET['lgout']==1)
				{
					unset($_SESSION['success']);
					echo"<script>alert('登出成功')</script>";
					echo"<script>window.location.href='homepage.php'</script>";
				}				
			?> 
					</ul>	
				
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


			$sql="SELECT * FROM `book` where user='".$_SESSION['success']."'";
				$result = mysqli_query($db_link, $sql);
				$U=mysqli_num_rows($result);
				ECHO $U;
			if(mysqli_num_rows($result)>0)
				{
					$check="SELECT * FROM `book` where user='".$_SESSION['success']."'";
					$result = mysqli_query($db_link, $check);
					$rows=$result->num_rows;
						for($j=0;$j<$rows;$j++)
						{
							$row=$result->fetch_array(MYSQLI_ASSOC);
							$sum2=$row['quantity']*$row['price'];
							 echo'
							<div class="container">
								<img  class="image" src="'.$row['images'].'" alt="" width="300" height="300" style="float:left">
								
								
								
									<h3>'.$row['product'].'</h3>
								  
								  
								  <h4 class="price">NT$'.$row['price'].'</h4>
								  <h4 class="price"><font color="black">訂購數量:'.$row['quantity'].'</font></h4>
								
							<p></p>
							<p></p>
							<form action="" method="POST">
							<div class="btn-group" role="group" >
							<a class=" btn btn-primary" href="update.php?oid='.$row['oid'].'" role="button">修改數量</a></form>
							<div class="cart">
							<p><button class="btn btn-primary" style="float:right;" type="submit" name="kill" value="刪除訂單">刪除訂單</button></p>
							<input type="hidden" name="delete" value="'.$row['oid'].'">
							</div>
							</div>
							</form>
							<h4 class="total"><font color="red">金額:NT$'.$sum2.'</font></h4>
							</div>
						    <hr>';
							$sum=$sum+$sum2;
						}
						echo'<form action="" method="POST">	
						<h4 class="total2"><font color="red">總金額:NT$'.$sum.'</font></h4>
						<div class="OKOK"><p><button class="btn btn-primary" " type="submit" name="送出訂單" value="送出訂單">送出訂單</button></p></div></form>';
						if($_POST['送出訂單']=="送出訂單")
						{
							$check="SELECT * FROM `book`where user='".$_SESSION['success']."'";
							$result = mysqli_query($db_link, $check);
							$rows=$result->num_rows;
							for($j=0;$j<$rows;$j++)
							{
								$row=$result->fetch_array(MYSQLI_ASSOC);
								$insert="INSERT INTO `history`(`user`,`product`, `quantity`, `price`, `total`, `images`,`situation`) VALUES ('".$_SESSION['success']."','".$row['product']."',".$row['quantity'].",'".$row['price']."','".$sum."','".$row['images']."','訂單未完成')";
								$result2=mysqli_query($db_link,$insert);
							}
							$sql="DELETE FROM `book` WHERE user='".$_SESSION['success']."'";
								$result=mysqli_query($db_link,$sql);
							echo"<script>alert('下訂成功')</script>";
							echo"<script>window.location.href='homepage.php'</script>";
						}
						if($_POST['kill']=="刪除訂單")
							{
								$sql="DELETE FROM `book` WHERE oid='".$_POST['delete']."'";
								$result=mysqli_query($db_link,$sql);
							
                               echo"<script>window.location.href='shop.php'</script>";
							}
						
				}
				else
				{
					echo"<center><h1 class='total3'><font color='#B766AD' face='標楷體'>購物車是空的</font></h1></center>";
			ECHO $U;
				}

	


					
	?>
	
	<footer class="menu">
    <p class="float-end"><a href="#">回到上面</a></p>
  </footer>
</body>
