<h3><?=$this->form_title?></h3>
<?php include "message.tpl"; ?>
<div class="form">
	<form name="product" action="<?=$this->action?>" method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td>Section:</td>
				<td>
					<select name="section_id">
						<?php foreach ($this->sections as $section) { ?>
							<option value="<?=$section["id"]?>" <?php if ($section["id"] == $this->section_id) { ?>selected="selected"<?php } ?>><?=$section["title"]?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Name:</td>
				<td>
					<input type="text" name="pr_title" value="<?=$this->pr_title?>" />
				</td>
			</tr>
			<tr>
				<td>Price:</td>
				<td>
					<input type="text" name="price" value="<?=$this->price?>" /> shekels
				</td>
			</tr>
			<tr>
				<td>Years:</td>
				<td>
					<input type="text" name="year" value="<?=$this->year?>" />
				</td>
			</tr>
			<tr>
				<td>Country:</td>
				<td>
					<input type="text" name="country" value="<?=$this->country?>" />
				</td>
			</tr>
			<tr>
				<td>Type:</td>
				<td>
					<input type="text" name="type" value="<?=$this->type?>" />
				</td>
			</tr>
			<tr>
				<td>Kashrut:</td>
				<td>
					<input type="text" name="kashrut" value="<?=$this->kashrut?>" />
				</td>
			</tr>
			<tr>
				<td>Descriotion:</td>
				<td>
					<textarea name="description" cols="30" rows="10"><?=$this->description?></textarea>
				</td>
			</tr>
			<tr>
				<td>Picture:</td>
				<td>
					<input type="file" name="img" />
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
