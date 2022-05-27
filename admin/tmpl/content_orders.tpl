<h3>Orders</h3>
<?php include "message.tpl"; ?>
<?php include "pagination.tpl"; ?>
<p class="link_new">
	<a href="<?=$this->link_new?>">Edd new order</a>
</p>
<table class="info">
	<tr class="header">
		<td>ID</td>
		<td>Way off delivery</td>
		<td>Order</td>
		<td>Price</td>
		<td>Full name</td>
		<td>Phone number</td>
		<td>E-mail</td>
		<td>Adrress</td>
		<td>Примечание</td>
		<td>Date of order</td>
		<td>Date of sending</td>
		<td>Date of payment</td>
		<td>Functions</td>
	</tr>
	<?php foreach ($this->table_data as $data) { ?>
		<tr>
			<td><?=$data["id"]?></td>
			<td><?php if ($data["delivery"] == 0) { ?>Delivery<?php } else { ?>Pick up<?php } ?></td>
			<td>
				<?php foreach ($data["products"] as $product) { ?>
					<p><?=$product["title"]?> (<?=$product["count"]?> шт.)</p>
				<?php } ?>
			</td>
			<td><?=$data["price"]?></td>
			<td><?=$data["name"]?></td>
			<td><?=$data["phone"]?></td>
			<td><?=$data["email"]?></td>
			<td><?=$data["address"]?></td>
			<td><?=$data["notice"]?></td>
			<td><?=$data["date_order"]?></td>
			<td><?php if ($data["date_send"] == 0) { ?>Not sent<?php } else { ?><?=$data["date_send"]?><?php } ?></td>
			<td><?php if ($data["date_pay"] == 0) { ?>Not payed<?php } else { ?><?=$data["date_pay"]?><?php } ?></td>
			<td>
				<a href="<?=$data["link_admin_edit"]?>">Edit</a>
				<br />
				<a href="<?=$data["link_admin_delete"]?>" onclick="return confirm('Are you sure you want to remove this element?')">Remove</a>
			</td>
		</tr>
	<?php } ?>
</table>
