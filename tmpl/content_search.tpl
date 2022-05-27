<div id="search_result">
<?php if ($this->q == "") { ?>
	<h2>הזנת שאילתת חיפוש ריקה!</h2>
<?php } else { ?>
	<h2>תוצאות חיפוש: <?=$this->q?></h2>
	<?php if (!$this->products) { ?>
		<p>שום דבר לא נמצא</p>
	<?php } else { ?>
		<?php include "table_products_top.tpl"; ?>
		<?php include "table_products.tpl"; ?>
	<?php } ?>
<?php } ?>
</div>
