<?php
require VENDOR_DIR . '/autoload.php';

use app\frontend\modules\Product\controller\ProductController;

$controller = new ProductController();
$product = $controller->detail('100');

echo '<script>console.log('. json_encode($product) . ')</script>';