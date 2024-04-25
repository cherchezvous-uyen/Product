<?php
class login
{
	public function connectLogin()
	{
		$con = mysql_connect('localhost','uyen','uyen185');
		if(!$con)
		{
			echo 'Kết nối cơ sở dữ liệu không thành công';
			exit();
		}
		else
		{
			mysql_select_db('tmdt_db');
			mysql_query('SET NAMES UTF8');
			return $con;
		}
	}
	public function myLogin($username,$password)
	{
		$password = md5($password);
		$sql = "select iduser, username, password, phanquyen from taikhoan where username='$username' and password='$password' limit 1";
		$link = $this->connectLogin();
		$ketqua = mysql_query($sql,$link);
		$i = mysql_num_rows($ketqua);
		if($i==1)
		{
			while($row = mysql_fetch_array($ketqua))
			{
				$iduser = $row['iduser'];
				$username = $row['username'];
				$password = $row['password'];
				$phanquyen = $row['phanquyen'];
				
				session_start();
				$_SESSION['iduser'] = $iduser;
				$_SESSION['username'] = $username;
				$_SESSION['password'] = $password;
				$_SESSION['phanquyen'] = $phanquyen;
				header('location:../admin/admin.php');
			}
		}
		else
		{
			return 0;
		}
	}
	
	public function confirmLogin($iduser,$username,$password,$phanquyen)
	{
		$sql = "select iduser from taikhoan where iduser='$iduser' and username = '$username' and password = '$password' and phanquyen = '$phanquyen' limit 1";
		$link = $this->connectLogin();
		$ketqua = mysql_query($sql,$link);
		$i = mysql_num_rows($ketqua);
		if($i!=1)
		{
			header('location:../login/');
		}
	} 
}
?>