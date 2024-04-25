<?php
include('tmdt_class.php');
class quantri extends tmdt
{
	public function choncongty($sql, $idchon)
	{
		$link = $this->connect_db();
		$ketqua = mysql_query($sql,$link);
		$i = mysql_num_rows($ketqua);
		if($i>0)
		{
			echo '<select name="txtchon" id="txtchon">
			 <option>Mời chọn nhà sản xuất nè há</option>';
			while($row=mysql_fetch_array($ketqua))
			{
				$idcty = $row['idcty'];
				$tencty = $row['tencty'];
				if($idcty == $idchon )
				{
					echo '<option value="'.$idcty.'"selected>'.$tencty.'</option>';
				}
				else
				{
					echo '<option value="'.$idcty.'">'.$tencty.'</option>';
				}
				
		
			}
			echo '</select>';
		}
		else
		{
			echo 'Không có dữ liệu';
		}
	}
	public function danhsachsanpham($sql)
	{
		$link = $this->connect_db();
		$ketqua = mysql_query($sql,$link);
		$i = mysql_num_rows($ketqua);
		if($i>0)
		{
			echo '<table width="740" height="85" border="1" align="center" cellpadding="0" cellspacing="0">
				  <tbody>
					<tr>
					  <td width="73" align="center" valign="middle">STT</td>
					  <td width="143" align="center" valign="middle">Tên sản phẩm</td>
					  <td width="250" align="center" valign="middle">Mô tả</td>
					  <td width="89" align="center" valign="middle">Giá</td>
					  <td width="87" align="center" valign="middle">Giảm giá</td>
					</tr>';
			$dem=1;
			while($row=mysql_fetch_array($ketqua))
			{
				$idsp = $row['idsp'];
				$tensp = $row['ten'];
				$gia = $row['gia'];
				$mota = $row['mota'];
				$giamgia = $row['giamgia'];
				echo '<tr>
					  <td align="center" valign="middle"><a href=?id='.$idsp.'">'.$dem.'</a></td>
					  <td align="center" valign="middle"><a href=?id='.$idsp.'">'.$tensp.'</a></td>
					  <td align="center" valign="middle"><a href=?id='.$idsp.'">'.$mota.'</a></td>
					  <td align="center" valign="middle"><a href=?id='.$idsp.'">'.$gia.'</a></td>
					  <td align="center" valign="middle"><a href=?id='.$idsp.'">'.$giamgia.'</a></td>
					</tr>';
				$dem++;
			}
			
			echo '</table>
				</body>';
		}
		else
		{
			echo 'Không có dữ liệu';
		}
	}
}
?>