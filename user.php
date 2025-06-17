<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>点餐</title>
	</head>
	<body>
		<center>
			<h2>用户点餐页面</h2>
			<form action="" method="post">
				用户名: <input type="text" name="username" value="" /> <br>
				送餐电话: <input type="text" name="userphone" value/> <br>
				送餐地址: <input type="text" name="sendaddress" id="" value="" /> <br>
				送餐内容: <input type="text" name="food" id="" value="" /> <br>
				<input type="submit" id="" name="" value="下单"/>
				<input type="reset" value="清空"/>
			</form>
		</center>
		<?php
			print_r($_POST);
			echo "<hr>";
			// 连接数据库
			@$db = mysql_connect("127.0.0.1", "root", "") or die("连接数据库失败");
			echo "数据库标识".$db."<br>";

			// 选中数据库
			if (mysql_select_db("fooduser", $db))
				echo "数据库选中成功"."<br>";
			else
				echo "失败".mysql_error()."<br>";
				
			// 查询行数
			$id = mysql_num_rows(mysql_query("SELECT * FROM user", $db));

			print_r(++$id);
			echo "<br>";

			if ($_POST['userphone']!= NULL) {
				$charu = mysql_query("INSERT user (id,username,userphone,sendaddress,food) values($id, '$_POST[username]', '$_POST[userphone]', '$_POST[sendaddress]', '$_POST[food]')", $db);
				if ($charu)
					echo "成功"."<br>";
				else
					echo "下单失败".mysql_error."<br>";

				$chaxun = mysql_query("SELECT * FROM user WHERE userphone='$_POST[userphone]'");

				while ($shuzu = mysql_fetch_array($chaxun)) {
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
			}
			else
				echo "请填写电话"."<br>";
		?>
	</body>
</html>
