<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>首頁</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<!--以IE瀏覽器相容模式來顯示，預設為微軟最新的edge瀏覽模式來顯示-->
	<meta name="viewport" content="width-device-width, initial-scale-1">
	<!--網頁寬度設定為行動裝置的螢幕寬度且縮放比例為1:1-->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!--bootstrap核心 CSS 檔案-->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
	<!--bootstrap佈景主題 CSS 檔案-->
	<script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
	<!--jquery核心檔案-->
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!--jquery核心 js 檔案-->
	<style>
		.navbar-brand{
			margin-top:-5px;
		}
	
	.menu{

   position:fixed;
   right:0;
   top:90%;
   width:4em;
  }

		.detail{
	margin-left:220px;
}
#myCarousel  .carousel-inner > .item > img {

    display: block;
    width:100%;
    height:100%;

}
.float-end{
	text-align:right;
}
.logout{
	margin-top:10px;
}
.col-lg-4{
	margin-top:80px;
}
	</style>
</head>
<body>
	<!--導覽列-->

	<header>
		<nav class="navbar navbar-inverse navbar-fixed-top bg-dark" >
			<div class="container-fluid">
				<div class="navbar-header">
					<a href="admin.php" class="navbar-brand"><img src="../images/1.png" alt="" width="40" height="35"></a>
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
						<span class="sr-only">導覽按鈕</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav" >
						<!--<li class="dropdown">
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
								<li><a href="rank.php?sale=salehigh">熱銷高到低</a></li>
							</ul>
						</li>-->
						<li><a href="insert.php">新增產品</a></li>
						<li><a href="mge.php">訂單管理</a></li>
					<li><a href="mebmge.php">查詢會員</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right" >
						<li class="logout">
						
							<?php
						
							echo "<li class='dropdown'>";
							echo "<a href='homepage.php' class='dropdown-toggle' data-toggle='dropdown'>";
							   //顯示名稱                        
						    echo "<font color='white'>admin</font>";                                 
							echo  "<span class='caret'></span>";
							echo "</a>";
							echo "<ul class='dropdown-menu'>";
							echo "<li><a href=admin.php?lgout=1>登出</a></li>";	
							echo "</ul>";
							echo "</li>";	
						if($_GET['lgout'])
						{
							echo"<script>alert('登出成功')</script>";
								echo"<script>window.location.href='homepage.php'</script>";
						}
						
						?>
						</li>			
											
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
								$game="SELECT * FROM product where product like '%".$_POST["game"]."%'";
								$result = mysqli_query($db_link, $game);
								$rows=$result->num_rows;
								for($j=0;$j<$rows;$j++)
								{
								  $row=$result->fetch_array(MYSQLI_ASSOC);
								  echo'
								       <div class="col-lg-4">
										<div class="thumbnail">
										<img class="bd-placeholder-img rounded-square" width="250" height="250" src="'.$row['images'].'" role="img" </img>
										<div class="caption">
										<p><center>'.$row['product'].'</center></p>
										<font id="price" color="red">NT$'.$row['price'].'</font>
									    </div>
										</div>
										</div>';
								}
								?>
						    
	<footer class="menu">
    <p class="float-end"><a href="#">回到上面</a></p>
  </footer>
</body>
</html>