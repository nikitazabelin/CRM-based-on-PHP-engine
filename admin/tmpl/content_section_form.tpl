<h3><?=$this->form_title?></h3>
<?php include "message.tpl"; ?>
<div class="form">
	<form name="section" action="<?=$this->action?>" method="post">
		<table>
			<tr>
				<td>Name:</td>
				<td>
					<input type="text" name="sec_title" value="<?=$this->sec_title?>" />
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="hidden" name="id" value="<?=$this->id?>" />
					<input type="hidden" name="func" value="<?=$this->func?>" />
					<input type="submit" value="Send" />
				</td>
			</tr>
		</table>
	</form>
</div>
