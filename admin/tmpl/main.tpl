<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?=$this->title?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="<?=$this->meta_desc?>" />
	<meta name="keywords" content="<?=$this->meta_key?>" />
	<link type="text/css" rel="stylesheet" href="styles/main.css" />
	<script type="text/javascript" src="js/functions.js"></script>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1>Administrator's account</h1>
		</div>
		<hr />
		<?php include "menu.tpl"; ?>
		<div id="content">
			<?php include "content_".$this->content.".tpl"; ?>
		</div>
	</div>
</body>
</html>
