<h3>Items</h3>
<?php include "message.tpl"; ?>
<?php include "pagination.tpl"; ?>
<p class="link_new">
	<a href="<?=$this->link_new?>">Add new item</a>
</p>
<table class="info">
	<tr class="header">
		<td>ID</td>
		<td>Section</td>
		<td>Name</td>
		<td>Price</td>
		<td>Information</td>
		<td>Date of adding</td>
		<td>Functions</td>
	</tr>
	<?php foreach ($this->table_data as $data) { ?>
		<tr>
			<td><?=$data["id"]?></td>
			<td><?=$data["section"]?></td>
			<td>
				<?=$data["title"]?>
				<br />
				<img class="img" src="<?=$data["img"]?>" alt="<?=$data["title"]?>" />
			</td>
			<td><?=$data["price"]?> shekels</td>
			<td>
				<table>
					<tr>
						<td><b>Year:</b></td>
						<td><?=$data["year"]?></td>
					</tr>
					<tr>
						<td><b>Country:</b></td>
						<td><?=$data["country"]?></td>
					</tr>
					<tr>
						<td><b>Type:</b></td>
						<td><?=$data["type"]?></td>
					</tr>
					<tr>
						<td><b>Kashrut:</b></td>
						<td><?=$data["kashrut"]?></td>
					</tr>
				</table>
			</td>
			<td><?=$data["date"]?></td>
			<td>
				<a href="<?=$data["link_admin_edit"]?>">Edit</a>
				<br />
				<a href="<?=$data["link_admin_delete"]?>" onclick="return confirm('Are you sure you want to remove this element?')">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
