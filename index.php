<?php 
include("MyClass/clskhachhang.php");	
$p= new khachhang();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" href="css/style.css">
</head>
<div id="container">
	<div id="banner"></div>
	<div id="main">
		<div id="left"><?php 
			$p-> xuatdscty("select*from congty ");
			?></div>
		<div id="right">
			<?php 
			$idcty= $_REQUEST['id'];
			if($idcty>0)
			{
				$p->xuatsp("select*from sanpham where idcty= '$idcty'");
			}
			else{
				$p-> xuatsp("select*from sanpham ");
			}
			
			?>
<!--
			<div id="sanpham">
				<div id="sanpham_ten">Iphone 13</div>
				<div id="sanpham_hinh"> <img src="../THWEB/hinh/apple.jpg" width="150" height="170" alt=""></div>
				<div id="sanpham_gia">20USD</div>
			</div>
-->
		</div>
	</div>
	<div id="footer"></div>
</div>
<body>
</body>
</html>