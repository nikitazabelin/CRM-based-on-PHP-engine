<h3>Купоны</h3>
<?php include "message.tpl"; ?>
<?php include "pagination.tpl"; ?>
<p class="link_new">
	<a href="<?=$this->link_new?>">Edding of the new discount's coupon</a>
</p>
<table class="info">
	<tr class="header">
		<td>ID</td>
		<td>Code</td>
		<td>Size of discount</td>
		<td>Fucions</td>
	</tr>
	<?php foreach ($this->table_data as $data) { ?>
		<tr>
			<td><?=$data["id"]?></td>
			<td><?=$data["code"]?></td>
			<td><?=($data["value"] * 100)?> %</td>
			<td>
				<a href="<?=$data["link_admin_edit"]?>">Edit</a>
				<br />
				<a href="<?=$data["link_admin_delete"]?>" onclick="return confirm('Are you sure you want to remove this element?')">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
