<?php
error_reporting(0);
session_start();
if(isset($_SESSION['iduser']) && isset($_SESSION['username']) && isset($_SESSION['password']) && isset($_SESSION['phanquyen']))
{
	include ("../MyClass/clslogin.php");
	$q = new login();
	$q->confirmLogin($_SESSION['iduser'],$_SESSION['username'],$_SESSION['password'],$_SESSION['phanquyen']);
}
else
{
	header('location:../login/');
}
?>
<?php
	include("../MyClass/clsquantri.php");
	$p= new quantri();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title></title>
<meta charset="utf-8">
</head>
	
<body>
	<?php 
		$myid= $_REQUEST['id'];
		$laytensp= $p->laycot("select ten from sanpham where idsp= '$myid' limit 1");
		$laymota= $p->laycot("select mota from sanpham where idsp= '$myid' limit 1");
		$laygia= $p->laycot("select gia from sanpham where idsp= '$myid' limit 1");
		$laygiamgia= $p->laycot("select giamgia from sanpham where idsp= '$myid' limit 1");
	?>
	<form action="" method="post" enctype="multipart/form-data" name="form1">
		<table width="743" height="266" border="1" align="center" cellpadding="0" cellspacing="0">
		<tbody>
		  <tr>
			<td colspan="2" align="center" valign="middle"><h1>Quản Lý Sản Phẩm</h1></td>
		  </tr>
		  <tr>
			<td width="244" align="left" valign="middle">Nhà sản xuất</td>
			<td width="493" align="left" valign="middle">
				<?php
				$layidcty= $p->laycot("select idcty from sanpham where idsp= '$myid' limit 1");
				$p ->choncongty("select*from congty", $layidcty);
				?>
			<input type="hidden" name="txtmyid" id="txtmyid" value="<?php echo $myid;?>"></td>
		  </tr>
		  <tr>
			<td align="left" valign="middle">Tên sản phẩm</td>
			<td align="left" valign="middle"><input type="text" name="txtten" id="txtten" value="<?php echo $laytensp;?>"></td>
		  </tr>
		  <tr>
			<td align="left" valign="middle">Giá</td>
			<td align="left" valign="middle"><input name="txtgia" type="text" id="txtgia" value="<?php echo $laygia;?>"></td>
		  </tr>
		  <tr>
			<td align="left" valign="middle">Mô tả</td>
			<td align="left" valign="middle"><textarea name="txtmota" id="txtmota" cols="45" rows="5"><?php echo $laymota;?></textarea></td>
		  </tr>
		  <tr>
			<td align="left" valign="middle">Giảm giá</td>
			<td align="left" valign="middle"><input name="txtgiamgia" type="text" id="txtgiamgia" value="<?php echo $laygiamgia;?>"></td>
		  </tr>
		  <tr>
			<td align="left" valign="middle">Hình sản phẩm</td>
			<td align="left" valign="middle"><input type="file" name="myfile" id="myfile"></td>
		  </tr>
		  <tr>
			<td colspan="2" align="center" valign="middle"><input type="submit" name="nut" id="nut" value="Thêm sản phẩm">
			<input type="submit" name="nut" id="nut" value="Sửa sản phẩm">
			<input type="submit" name="nut" id="nut" value="Xóa sản phẩm"></td>
		  </tr>
		</tbody>
		</table>
		<div align="center">
		<?php
			switch($_POST['nut'])
			{
				case 'Thêm sản phẩm':
					{
						$name= $_FILES['myfile']['name'];
						$tmp_name= $_FILES['myfile']['tmp_name'];
						$id_cty= $_REQUEST['txtchon'];
						$ten= $_REQUEST['txtten'];
						$gia= $_REQUEST['txtgia'];
						$mota= $_REQUEST['txtmota'];
						$giamgia= $_REQUEST['txtgiamgia'];
						if($name!='')
						{
							$name= time()."_".$name;
							if($p->uploadfile($name,$tmp_name, "../hinh")==1)
							{
								if($p->themxoasua("INSERT INTO sanpham(`ten` ,`gia` ,`mota` ,`hinh` ,`giamgia` ,`idcty`) VALUES ('$ten', '$gia', '$mota','$name', '$giamgia', '$id_cty')")==1)
								{
									echo '<script language="javascript">
									alert("Thêm sản phẩm thành công");
									</script>';
								}
								else
								{
									echo '<script language="javascript">
									alert("Sai");
									</script>';
								}
							}
							else
							{
								echo '<script language="javascript">
									alert("Upload hình không thành công");
									</script>';
							}
						}
						else
						{
							echo '<script language="javascript">
									alert("Vui lòng nhập đầy đủ thông tin");
									</script>';
						}
						echo '<script language="javascript">
									window.location("../admin/admin.php");
									</script>';
						break;
					}
				case 'Xóa sản phẩm':
					{
						$idsp= $_REQUEST['txtmyid'];
						if($idsp>0)
						{
							if($p->themxoasua("delete from sanpham where idsp= '$idsp' limit 1")==1)
							{
								echo '<script language="javascript">
									alert("Xóa sản phẩm thành công");
									</script>;';
							}
							else
							{
								echo '<script language="javascript">
									alert("Xóa sản phẩm không thành công");
									</script>;';
							}
						}
						echo '<script language="javascript">
									window.location("../admin/admin.php");
									</script>';
						break;
					}
					case 'Sửa sản phẩm':
					{
						$idsp= $_REQUEST['txtmyid'];
						$id_cty= $_REQUEST['txtchon'];
						$ten= $_REQUEST['txtten'];
						$gia= $_REQUEST['txtgia'];
						$mota= $_REQUEST['txtmota'];
						$giamgia= $_REQUEST['txtgiamgia'];

						if($idsp>0)
						{
							if($p->themxoasua("UPDATE sanpham SET ten = '$ten', gia = '$gia', mota = '$mota',giamgia = '$giamgia' WHERE idsp = '$idsp' LIMIT 1")==1)
							{
								echo '<script language="javascript">
								alert("Sửa sản phẩm thành công");
								</script>';
							}
							else
							{
								echo '<script language="javascript">
								alert("Sai");
								</script>';
							}

						}
						else
						{
							echo '<script language="javascript">
									alert("Không có dữ liệu để sửa");
									</script>';
						}
						echo '<script language="javascript">
									window.location("../admin/admin.php");
									</script>';
						break;
					}
			}
		?>
			</div>
				<hr>
				<?php
					$p->danhsachsanpham("select*from sanpham order by idsp");
				?>
		</form>
</body>
</html>
