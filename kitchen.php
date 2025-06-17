<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>后厨</title>
	</head>
	<body>

		<?php
			// 连接数据库
			@$db = mysql_connect("127.0.0.1", "root", "") or die("连接数据库失败");
			echo "数据库标识".$db."<br>";

			// 选中数据库
			if (mysql_select_db("fooduser", $db))
				echo "数据库选中成功"."<br>";
			else
				echo "失败".mysql_error()."<br>";
			$query = mysql_query("SELECT * FROM user", $db);
			while($shuzu=mysql_fetch_array($query)){
				echo "<br>";
				echo "订单号: ".$shuzu[0]."<br>";
				echo "用户名: ".$shuzu[1]."<br>";
				echo "送餐电话: ".$shuzu[2]."<br>";
				echo "送餐地址: ".$shuzu[3]."<br>";
				echo "取餐地址: ".$shuzu[4]."<br>";
				echo "点餐内容: ".$shuzu[5]."<br>";
				echo "下单时间: ".$shuzu[6]."<br>";
				echo "<hr>";
			}
		?>

		
					

		<?php
			$kname=$_POST['kitchenname'];
			$paddress=$_POST['pickaddress'];
			if ($kname==NULL || $paddress==NULL) {
		?>
		<center>
			<h2>饭店操作页</h2>
			<form action="" method="post">
				用户名: <input type="text" name="kitchenname" id="" value="" required="required"/> <br>
				密码: <input type="password" name="kitchenpwd" /><br>
				饭店地址: <input type="text" name="pickaddress" id="" value="" required="required" /><br>
				<input type="submit" value="提交"/>
				<input type="reset" value="清空" />
			</form>
		</center>
		<?php }
			else{
		?>

		登录成功<br>
		当前登录 <?php echo $kname; ?> <br>
		取餐地址 <?php echo $paddress; ?> <br>
		<?php 
			}
		?>


		<?php
			print_r($_POST);
		?>
	</body>
</html>
