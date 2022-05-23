<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	include('config.php');
	@session_start();
?>
<?php
	if(isset($_POST['login']))
	{
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		if(empty($user) && empty($pass))
		{
			echo "<script>alert('Vui lòng nhập đầy đủ thông tin.');window.location.href='login.php'</script>";
			#echo 'window.location.href = "index.php";';
			#echo <a href='login.php'  style='	text-decoration:none;'>Ấn đây</a>";
			
    		#echo '<script type="text/javascript">';
    		#echo 'setTimeout(function () { swal("WOW!","Message!","success");';
   			#echo '}, 1000);'
    		#echo 'window.location.href = "index.php";';
    		#echo '</script>';

		}else
		{
			$query = mysqli_query($con,"select id from taikhoan1 where idstudent = '{$user}' && password = '{$pass}'");
			$result = mysqli_fetch_array($query);
			if($result)			
			{   
				echo "<script>alert('Đăng nhập thành công !');window.location.href='index.php'</script>";
				#echo "<script>alert('Đăng nhập thành công !.');</script>";
				#echo "Đăng nhập thành công !. <a href='index.php'  style='	text-decoration:none;'>Ấn đây để quay về trang chủ</a>";
				$_SESSION['login'] = $result['id'];
			}
			else
			{
				echo "<script>alert('Vui lòng kiểm tra mã sinh viên và mật khẩu !');window.location.href='login.php'</script>";
				#echo "Vui lòng kiểm tra USER or PASS !. <a href='login.php' style='	text-decoration:none;'> &lsaquo;&lsaquo; Quay trở lại</a>";
			}
		}
	}
?>