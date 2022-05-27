<h3>Разделы</h3>
<?php include "message.tpl"; ?>
<?php include "pagination.tpl"; ?>
<p class="link_new">
	<a href="<?=$this->link_new?>">Add new section</a>
</p>
<table class="info">
	<tr class="header">
		<td>ID</td>
		<td>Name</td>
		<td>Finctions</td>
	</tr>
	<?php foreach ($this->table_data as $data) { ?>
		<tr>
			<td><?=$data["id"]?></td>
			<td><?=$data["title"]?></td>
			<td>
				<a href="<?=$data["link_admin_edit"]?>">Edit</a>
				<br />
				<a href="<?=$data["link_admin_delete"]?>" onclick="return confirm('Are you sure you want to remove this element?')">Remove</a>
			</td>
		</tr>
	<?php } ?>
</table>
