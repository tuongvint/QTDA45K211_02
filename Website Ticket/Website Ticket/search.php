<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php include("config.php"); ?>
<?php
	$orderby="";
	if(isset($_GET['column']))
	{
		$orderby = "order by  ".$_GET['column']." ".$_GET['orderby'];
	}
	if(isset($_GET['tukhoa']))
	{
		$query = mysqli_query($con,"select * from sanpham where tensanpham like '%{$_GET['tukhoa']}%' {$orderby} ");
	}
	else
	{
	$query = mysqli_query($con,"select * from sanpham {$orderby}");
	}
	while($row = mysqli_fetch_array($query)){?>
			<div class="grid_1_of_4 images_1_of_4">
      <div class="products"><a href="chitietsanpham.php?id=<?php echo $row["masanpham"]  ?>"><img class="pd-img" src="<?php echo $row["url"] ?>" alt="" />
      <div class="pd-des"> <a href="chitietsanpham.php?id=<?php echo $row["masanpham"]; ?>">
        <br/>
          <div class="header789">
            <p class="header7897">» Tặng que chọc sim trị giá 50.000đ</p>
            <p class="header7897">» Tặng sim ghép trị giá 250.000đ</p>
            <p class="header7897">» Tặng quạt mini USB trị giá 100.000đ </p>
            <p class="header7897">» Dán màn hình trị giá 50.000 đ</p>
            <p class="header7897">» Hỗ trợ miễn phí fix tất cả các lỗi, dùng như máy quốc tế</p>
          </div>
          </a> </div>
        <h2><?php echo $row["tensanpham"]  ?></h2>
        <div class="conhang1"><?php   if($row['avaibiliti'] == 1) echo"Còn hàng"; else echo "Hết hàng"; ?></div>
        <div class="giasanpham"><?php echo number_format($row['gia']) ; ?></div>
        <div class="clear"></div>
      </div>
    </div>
	<?php }
?>
</body>
</html>