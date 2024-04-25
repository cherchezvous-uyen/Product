<?php
error_reporting(0);
class tmdt
{
	public function connect_db()
	{
		$con = mysql_connect("localhost","uyen","uyen185");
		if(!$con)
		{
			echo 'Kết nối database không thành công';
			exit();
		}
		else
		{
			mysql_select_db("tmdt_db");
			mysql_query("SET NAME UTF8");
			return $con;
		}
	}
	
	public function print_dscty($sql)
	{
		$link = $this->connect_db();
		$ketqua = mysql_query($sql,$link);
		$i = mysql_num_rows($ketqua);
		if($i>0)
		{
			echo '<table width="635" border="1" align="center" cellpadding="10">
					  <tbody>
						<tr>
						  <td width="100" style="text-align: center">STT</td>
						  <td width="350" style="text-align: center">TÊN CÔNG TY</td>
						  <td width="163" style="text-align: center">ĐỊA CHỈ</td>
						</tr>';
			$dem = 1;
			while($row=mysql_fetch_array($ketqua))
			{
				$idcty = $row['idcty'];
				$tencty = $row['tencty'];
				$diachi = $row['diachi'];
				echo '<tr>
						  <td style="text-align: center">'.$dem.'</td>
						  <td style="text-align: center">'.$tencty.'</td>
						  <td style="text-align: center">'.$diachi.'</td>
					  </tr>';
				$dem++;
			}
			echo '</tbody>
				</table>';
		}
		else
		{
			echo 'Không có dữ liệu';
		}
	}
	public function uploadfile($name, $tmp_name, $folder)
	{
		$newname= $folder."/".$name;
		if(move_uploaded_file($tmp_name, $newname))
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	public function themxoasua($sql)
	{
		$link= $this->connect_db();
		if($ketqua= mysql_query($sql,$link))
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
		public function laycot($sql)
	{
		$link = $this->connect_db();
		$ketqua = mysql_query($sql,$link);
		//$ketqua = mysql_query ($sql,$link) or die(mysql_error());
		$i = mysql_num_rows($ketqua);
		$giattri="";
		if($i>0)
		{
			
			while($row=mysql_fetch_array($ketqua))
			{
				$gt = $row[0];
				$giattri= $gt;
				
			}
		
		}
			return $giattri;
	}
}
?>