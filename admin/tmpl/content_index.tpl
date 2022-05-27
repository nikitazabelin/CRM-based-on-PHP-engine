<h3>Stisticks for the last 7 days</h3>
<table class="info">
	<tr class="header">
		<td>Order's quantity</td>
		<td>Bill's ammount</td>
		<td>Income</td>
		<td>Sold items</td>
	</tr>
	<tr>
		<td><?=$this->result["count_orders"]?></td>
		<td><?=$this->result["summa_account"]?> shekels</td>
		<td><?=$this->result["income"]?> shekels</td>
		<td><?=$this->result["count_dvd"]?></td>
	</tr>
</table>
