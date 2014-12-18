<?php

class Products {

	var $name;
	var $description;
	var $productId;

	function Products($id = 0, $infoArr = array()) {
	    if ($id > 0 && count($infoArr)) {
    		$this->name = $infoArr['name'];
    		$this->description = $infoArr['description'];
    		$this->productId = $id;
	    }
	}


	/**
	 * @static
	 */
	function loadAllProducts() {
		$arr = getProducts();
		$prods = array();
		foreach ($arr as $id=>$info) {
			$prods[$id] = new Products($id,$info);
		}

		return $prods;
	}

/**
 * function loadOrderDetails
 *
 * This function should be giving us all the information about the order:
 * The customer's name and address, the products that were ordered (deescriptions too) and the order totals.
 * See products that php to see what is expected to be shown
 *
 * @param Integer   $order_id   the unique identifier for the order
 * @return Array    $cur_order  the details of the order
 *
 */
function loadOrderDetails($order_id) {
	$cur_order['orders']    = getOrderInfo();
	$cur_order['products']  = getProducts();
	$cur_order['customer']  = getCustomerInfo();
	$cur_order['address']   = getAddresses();
	return $cur_order;
}

/*function loadOrderDetails($order_id) {
$orders    = getOrderInfo();
$products  = getProducts();
$customer  = getCustomerInfo();
$address   = getAddresses();


return $cur_order;
}*/
}

?>
