<h3>Login to administrator accaunt</h3>
<?php include "message.tpl"; ?>
<div class="form">
	<form name="auth" action="<?=$this->action?>" method="post">
		<table>
			<tr>
				<td>Login:</td>
				<td>
					<input type="text" name="login" value="<?=$this->login?>" />
				</td>
			</tr>
			<tr>
				<td>Password:</td>
				<td>
					<input type="password" name="password" />
				</td>
			</tr>
			<tr>
				<td colspan="2" align="right">
					<input type="hidden" name="r" value="<?=$this->r?>" />
					<input type="hidden" name="func" value="auth" />
					<input type="submit" name="auth" value="Sing in" />
				</td>
			</tr>
		</table>
	</form>
</div>
