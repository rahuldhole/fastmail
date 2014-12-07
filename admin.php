<?php
/*
RAHUL N DHOLE
dholerahul@sggsa.c.in

*/
$err=""; $i = 0;
if(count($_POST)>0) 
	{
		if($_POST['id']&&$_POST['pass'])
		{
				$conn = mysqli_connect("localhost","a1100935_fmail","kismat7");
				mysqli_select_db($conn, "a1100935_fmail");
				$sql = 'SELECT * FROM sent';
				$res = mysqli_query($conn, $sql);
				$row = mysqli_fetch_array($res);
					if($_POST['id'] == "admin" &&$_POST['pass'] == "admin")
					{
							echo"<table border = '1' style = 'color : green' align = 'center'>";
							echo"<tr style='background:pink' style='font-family:Comic Sans MS' align = 'center'>";
							echo "<td>To</td>".
							"<td>From</td>".
							"<td>Subject</td>".
							"<td>message</td>".
							"<td>ip</td>".
							"<td>Date</td>";
							echo"</tr>";
							if(is_array($row)) 
							{
								
								foreach($res as $row)
								{
									echo"<tr style='background:#99FFFF' style='font-family:Comic Sans MS' align = 'center'>";
									echo "<td>".$row['to']."</td>"."<td>".
									$row['from']."</td>"."<td>".
									$row['subject']."</td>"."<td>".
									$row['message']."</td>"."<td>".
									$row['ip']."</td>"."<td>".
									$row['date']."</td>";
									echo"</tr>";
								}
								echo"</table>";
							}
					}
		}else
		{
		$err = "Something is missing";
		}
	}
?>
<title>Fast Mail|admin</title>
<h1 align = "center" style = "color : blue">Fast Mail Report</h1>
<div align = "center" class="message"><span style = 'color:red'><?php if($err!="") { echo $err; } ?></span></div>
<hr /><div align = "center"><form name="frmUser" method="post" action="">
<br />ID:<input type = "username" name = "id">Password:<input type = "password" name = "pass"><br />
<input type = "submit" value = "See eMail's">
</form></div><hr />
