<?php if ($this->auth) { ?>
	<div id="menu">
		<h2>Menu</h2>
		<table>
			<tr>
				<td>
					<a href="<?=$this->index?>">Main page</a>
				</td>
				<td>
					<a href="<?=$this->link_products?>">Items</a>
				</td>
				<td>
					<a href="<?=$this->link_orders?>">Orders</a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="<?=$this->link_sections?>">Sections</a>
				</td>
				<td>
					<a href="<?=$this->link_discounts?>">Discounts</a>
				</td>
				<td>
					<a href="<?=$this->link_statistics?>">Statistics</a>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<a href="<?=$this->logout?>">Exit</a>
				</td>
			</tr>
		</table>
	</div>
	<hr />
<?php } ?>
