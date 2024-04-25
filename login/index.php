<?php 
include ("../MyClass/clslogin.php");
$p = new login();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<form id='form1' method="post">
<table width="502" height="150" border="1" align="center">
  <tbody>
    <tr>
      <td colspan="2" align="center">ĐĂNG NHẬP</td>
    </tr>
    <tr>
      <td width="213" align="center">USERNAME</td>
      <td width="273" align="center"><input type="text" name="txt_username" id="txt_username"></td>
    </tr>
    <tr>
      <td height="39" align="center">PASSWORD</td>
      <td align="center"><input type="password" name="txt_password" id="txt_password"></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Submit">
      <input type="reset" name="reset" id="reset" value="Reset"></td>
    </tr>
  </tbody>
</table>

<div align="center">
<?php
switch($_POST['submit'])
{
	case 'Submit':
	{
		$username = $_REQUEST['txt_username'];
		$password = $_REQUEST['txt_password'];
		if($username!='' && $password != '')
		{
			if($p->myLogin($username,$password) == 0)
			{
				echo 'Sai tên đăng nhập hoặc mật khẩu';
			}
		}
		else
		{
			echo 'Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu';
		}
		break;
	}
}
?>
</div>
</form>
</body>
</html>