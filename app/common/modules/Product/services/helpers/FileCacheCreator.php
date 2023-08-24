<?php
namespace app\common\modules\Product\services\helpers;

use app\common\modules\Product\define\ProductDef;
use app\common\formatters\JsonEncode;

class FileCacheCreator
{
    public function getProductCache(int $productId): array
    {
        $cacheFileObject = @file_get_contents(CACHE_DIR . 'product_cache_' . (string)$productId . '.json');
        if ($cacheFileObject !== false) {
            return json_decode($cacheFileObject, true);
        }

        return [];
    }

    public function setProductCache(array $product): void
    {
        $cacheObject = $product;
        $productId = $cacheObject[ProductDef::PRODUCT_ID];

        $cacheObjectJson = JsonEncode::formatJson($cacheObject);

        file_put_contents(CACHE_DIR . 'product_cache_' . (string)$productId . '.json', $cacheObjectJson);
    }
}