<?php
namespace app\common\modules\Product\config;

use app\common\modules\Product\define\ProductDef;
use app\common\interfaces\ConfigInterface;

class ProductConfig implements ConfigInterface
{
    public static function getConfiguration(): array
    {
        return [
            ProductDef::PRODUCT_PRODUCT_DB_TYPE => ProductDef::PRODUCT_PRODUCT_DB_TYPE_MOCK,
            ProductDef::PRODUCT_COUNT_DB_TYPE => ProductDef::PRODUCT_COUNT_DB_TYPE_FILE,
            ProductDef::PRODUCT_CACHE_TYPE => ProductDef::PRODUCT_CACHE_TYPE_FILE,
        ];
    }

}
