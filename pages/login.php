<center>
<h1>Customer Login</h1>
<br/><br/>
<form action="index.php?p=do_login" method="post">
<table style="width: 60%">
	<tr>
		<td align="right">username : </td>
		<td><input name="username" type="text"/></td>
	</tr>
	<tr>
		<td align="right">password : </td>
		<td><input name="password" type="password" /></td>
	</tr>
	<tr>
		<td colspan="2" align="center">Captcha!</td>
	</tr>
	<tr>
		<td align="right">
			<label>
				<?php    
					$number=rand(10000, 99999);
					echo $number;
				?>
			</label>
			<?php print '<input name="num" type="hidden" value="' . $number . '"/>'; ?> 
		</td>
		<td><input name="captcha" type="text" /></td>
	</tr>
	<tr>
       <td colspan="2" align="center"><input type="submit" value="login"/></td>
	</tr>
	<tr>
		<td colspan="2"><hr></td>
	</tr>
	<tr>
		<td colspan="2" align="center">No account? -><a href="index.php?p=register"><b><i><u> Register!</b></u></i></a>
	</tr>
</table>
</form>
</center>