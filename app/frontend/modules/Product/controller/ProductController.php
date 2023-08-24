<?php

namespace app\frontend\modules\Product\controller;

use app\common\modules\Product\services\ProductProductDatabase;
use app\common\modules\Product\services\ProductCountDatabase;
use app\common\modules\Product\config\ProductConfig;
use app\common\modules\Product\define\ProductDef;
use app\common\formatters\JsonEncode;

class ProductController
{
    public function detail(string $id): string
    {
        $config = ProductConfig::getConfiguration();
        $db = new ProductProductDatabase($config[ProductDef::PRODUCT_PRODUCT_DB_TYPE]);
        $connection = $db->getConnection();
        $product = $connection->findProductById((int)$id);

        $product['count'] = $this->increaseCount((int) $id);

        return JsonEncode::formatJson($product);
    }

    private function increaseCount(int $id)
    {
        $config = ProductConfig::getConfiguration();
        $db = new ProductCountDatabase($config[ProductDef::PRODUCT_COUNT_DB_TYPE]);
        $connection = $db->getConnection();

        return $connection->increaseProductCount($id);
    }

}