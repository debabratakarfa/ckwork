<?php

include('lib_util.php');
include('lib_products.php');


//simulate database
$custinfo = getCustomerInfo();
$orderInfo = getOrderInfo();
$products = Products::loadAllProducts();

?>
<html>
<head>
	<title>Debug Test</title>
	<script language="Javascript">
		function moreinfo(id) {
			document.getElementById('moreinfo_'+id).style.display='block';
		}
	</script>
</head>
<body>

	<div style="align:right; background-color:silver;">
		Basic Info...
	</div>

	<br/>

	<table border="2" cellpadding="5">
	<tr><th>Order ID</th><th>Order Date</th><th>Username</th><th>Products</th></tr>
	<?php
		foreach($orderInfo as $key => $infoStruct) {
			echo "<tr><td>";
			echo $key;
			echo "</td><td>";
			echo $infoStruct['ordered_on'];
			echo "</td><td>";
			echo $infoStruct['ordered_by'];
			echo "</td><td>";
			echo '<a href="products.php?oid='.$key.'">More Info...</a>';
			echo "</td></tr>";
		}
	?>
	</table>


<?php
		foreach($orderInfo as $key => $infoStruct) {
			echo "<div id=\"moreinfo_".$key."\" style=\"display:none;padding:.5em 2em; background-color:#DEF;margin:2em 1.5em; border:2px solid silver;\">";
			echo "Order ID: #". sprintf('%d',$key)."\n";
			echo "<ol>\n";
			foreach ($infoStruct['products'] as $blank => $prodId) {
				echo "<li>".$products[$prodId]->name."</li>";
			}
			echo "</ol>\n";
			echo "</div>";
		}

?>
</body>
</html>
