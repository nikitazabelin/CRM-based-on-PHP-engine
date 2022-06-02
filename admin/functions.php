<?php
	require_once "start.php";
	session_start();
	require_once "manageadmin.php";
	require_once "urladmin.php";
	require_once "auth.php";

	$manage = new ManageAdmin();
	$url = new URLAdmin();
	$auth = new Auth();
	$func = $_REQUEST["func"];
	if ($func == "auth") {
		$link = $manage->auth();
	}
	elseif (!$auth->checkAdmin($_SESSION["login"], $_SESSION["password"])) {
		header("Location: ".$url->auth());
		exit;
	}
	else {
		if ($func == "logout") {
			$manage->logout();
		}
		elseif ($func == "add_product") {
			$link = $manage->addProduct();
		}
		elseif ($func == "edit_product") {
			$link = $manage->editProduct();
		}
		elseif ($func == "delete_product") {
			$manage->deleteProduct();
		}
		elseif ($func == "add_section") {
			$link = $manage->addSection();
		}
		elseif ($func == "edit_section") {
			$link = $manage->editSection();
		}
		elseif ($func == "delete_section") {
			$manage->deleteSection();
		}
		elseif ($func == "add_order") {
			$link = $manage->addOrder();
		}
		elseif ($func == "edit_order") {
			$link = $manage->editOrder();
		}
		elseif ($func == "delete_order") {
			$manage->deleteOrder();
		}
		elseif ($func == "add_coupone") {
			$link = $manage->addCoupone();
		}
		elseif ($func == "edit_coupone") {
			$link = $manage->editCoupone();
		}
		elseif ($func == "delete_coupone") {
			$manage->deleteCoupone();
		}
		else exit;
	}
	if (!$link) $link = ($_SERVER["HTTP_REFERER"] != "")? $_SERVER["HTTP_REFERER"]: $url->index();
	header("Location: $link");
	exit;
?>
