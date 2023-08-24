<?php
namespace app\common\modules\Product\services\helpers;

use app\common\modules\Product\services\CacheDriver;
use app\common\interfaces\ProductInterface;
use app\common\modules\Product\config\ProductConfig;
use app\common\modules\Product\define\ProductDef;

final class MockCreator implements ProductInterface
{
    private $connection;

    public function __construct()
    {
        $this->getMockData();
    }

    private function getMockData(): void
    {
        $this->connection = json_decode(file_get_contents(APP_DIR . '_data/mock_data.json'), true);
    }

    /**
     * @param integer $productId
     * @return array
     */
    public function findProductById(int $productId): array
    {
        $config = ProductConfig::getConfiguration();
        $cacheDriver = new CacheDriver($config[ProductDef::PRODUCT_CACHE_TYPE]);
        $cache = $cacheDriver->getCache();
        $cachedProduct = $cache->getProductCache($productId);

        if (empty($cachedProduct)) {
            $key = array_search($productId, array_column($this->connection, 'id'));
            $product = $this->connection[$key];
            $cache->setProductCache($product);
            $cachedProduct = $product;
        }

        return $cachedProduct;
    }
}