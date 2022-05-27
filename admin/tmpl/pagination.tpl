<table id="pagination">
	<tr>
		<?php for ($i = 0; $i < count($this->pages); $i++) { ?>
			<td>
				<a href="<?=$this->pages[$i]?>"><?=($i + 1)?></a>
			</td>
		<?php } ?>
	</tr>
</table>