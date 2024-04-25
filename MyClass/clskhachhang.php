<?php
include("tmdt_class.php");
class khachhang extends tmdt
{
	public function xuatsp($sql)
	{
		$link= $this->connect_db();
		$ketqua= mysql_query($sql, $link);
		$i= mysql_num_rows($ketqua);
		if($i>0)
		{
			while($row= mysql_fetch_array($ketqua))
			{
				$idsp= $row['idsp'];
				$ten= $row['ten'];
				$hinh= $row['hinh'];
				$gia= $row['gia'];
				echo'<div id="sanpham">
				<div id="sanpham_ten">'.$ten.'</div>
				<div id="sanpham_hinh"> <img src="hinh/'.$hinh.'" width="150" height="170" alt=""></div>
				<div id="sanpham_gia">'.$gia.'</div>
			</div>';
			}
		}
		else
		{
			echo "Đang cập nhật sản phẩm";
		}
	}
	public function xuatdscty($sql)
	{
		$link= $this->connect_db();
		//$ketqua= mysql_query($sql, $link);
		$ketqua = mysql_query ($sql, $link) or die(mysql_error());
		$i= mysql_num_rows($ketqua);
		if($i>0)
		{
			while($row= mysql_fetch_array($ketqua))
			{
				$idcty= $row['idcty'];
				$tencty= $row['tencty'];
				echo '<a href="?id='.$idcty.'">'.$tencty.'</a>';
				echo "<br>";
				
			}
		}
		else
		{
			echo "Đang cập nhật công ty";
		}
	}
}
?>