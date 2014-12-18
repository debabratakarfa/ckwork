<?php

include('lib_util.php');
include('lib_products.php');

$product = new Products();
$order_details = $product->loadOrderDetails(intval($_GET['oid']));
?>
<html>
<head>
	<title>Debug Test</title>
</head>
<body>
	<br/>
	<table align="center" border="1" cellpadding="1" cellspacing="2" width="90%">
        <tr>
            <th>Order id</th>
            <th>Order Date</th>
            <th colspan="2">Order Total</th>
        </tr>
        <tr>
						<?php
						foreach ($order_details as $name => $areas) {
							foreach ($areas as $area) {
								//print_r($area);
								if($_GET['oid']==$area['order_id'])
								{
									?>
									<td><?=$area['order_id'];?></td>
									<td><?=$area['ordered_on'];?></td>
									<td colspan="2"><?=$area['order_total'];?></td>
	      </tr>
        <tr>
            <td colspan="5">&nbsp;</td>
        </tr>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Qty</th>
        </tr>
				<?php
				    foreach ($area['products'] as $pid => $info) {
						$productlatest = getProducts();
						foreach($productlatest as $proinfo => $prokey)
							{
								//print_r($prokey);

								if($prokey['product_id'] == $info['product_id'])
								{
									?>
									<tr>
										<td><?=$prokey['name'];?></td>
										<td><?=$prokey['description'];?></td>
										<td><?=$prokey['price'];?></td>
										<td><?=$info['qty'];?></td>
									</tr>
									<?php
								}

							}


				    }
				?>
        <tr>
            <td colspan="5">&nbsp;</td>
        </tr>
        <tr>
            <th colspan="5">Customer Information</th>
        </tr>
				<?php
				$customerid = $area['ordered_by'];
				$cur_order_details  = getCustomerInfo();
				$cur_order_address   = getAddresses();
				foreach($cur_order_details as $proinfo => $prokey)
				{
				if($customerid==$prokey['customer_id']) {

				?>
        <tr>
            <td colspan="5">
                <?=$prokey['username'];?><br/>
                <?=$prokey['company_name'];?><br/>
								<?php
								foreach($cur_order_address as $addinfo => $addkey)
								{
									if($addkey['address_id']==$prokey['address_id']) {
								?>
                <?=$addkey['street'];?><br/>
                <?=$addkey['city'].', '.$addkey['state'].' '.$addkey['zip'];?><br/>
            </td>
        </tr>
							<?php
										}
								}

							}
						}
					}
				}
				}
				?>
    </table>

</body>
</html>
