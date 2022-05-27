<?php
	require_once "start.php";

	require_once "manage.php";
	require_once "url.php";

	$manage = new Manage();
	$url = new URL();
	$func = $_REQUEST["func"];
	if ($func == "add_cart") {
		$manage->addCart();
	}
	elseif ($func == "delete_cart") {
		$manage->deleteCart();
	}
	elseif ($func == "cart") {
		$manage->updateCart();
	}
	elseif ($func == "order") {
		$success = $manage->addOrder();
	}
	elseif ($func == "success_pay") {
		$success = $manage->successPay();
	}
	elseif ($func == "fail_pay") {
		$success = $manage->failPay();
	}
	elseif ($func == "status_pay") {
		$success = $manage->statusPay();
	}
	else exit;
	if ($success) {
		$link = $url->message();
	}
	else {
		$link = ($_SERVER["HTTP_REFERER"] != "")? $_SERVER["HTTP_REFERER"]: $url->index();
	}
	header("Location: $link");
	exit;
?>
