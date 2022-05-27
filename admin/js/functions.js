function addItem() {
	var orders = document.getElementById("orders");
	var tr = orders.getElementsByTagName("tr");
	tr = tr[tr.length - 1];
	var number = Number(tr.getElementsByTagName("select")[0].getAttribute("name").substr("products_".length));
	newElem = tr.cloneNode(true);
	number++;
	newElem.getElementsByTagName("select")[0].setAttribute("name", "products_" + number);
	newElem.getElementsByTagName("input")[0].setAttribute("name", "count_" + number);
	orders.appendChild(newElem);
	return false;
}

function deleteItem(elem) {
	var orders = document.getElementById("orders");
	var tr = orders.getElementsByTagName("tr");
	if (tr.length != 1) elem.parentNode.removeChild(elem);
	return false;
}