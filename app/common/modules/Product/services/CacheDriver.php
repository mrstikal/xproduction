<?php
namespace app\common\modules\Product\services;

use app\common\modules\Product\define\ProductDef;
use app\common\modules\Product\services\helpers\FileCacheCreator;
use app\common\interfaces\CacheInterface;

class CacheDriver implements CacheInterface
{
    private $cacheType;

    public $cache;

    public function __construct(string $cacheType)
    {
        $this->cacheType = $cacheType;
        $this->setCache();
    }

    private function setCache()
    {
        switch ($this->cacheType) {
            case ProductDef::PRODUCT_CACHE_TYPE_FILE:
                $this->handleFileType();
                break;
            case ProductDef::PRODUCT_CACHE_TYPE_SQL:
                $this->handleDbType();
                break;
            case ProductDef::PRODUCT_CACHE_TYPE_CLASS_DRIVEN:
                $this->handleClassType();
                break;
            default:
                $this->handleDbType();
        }
    }

    public function getCache()
    {

        return $this->cache;
    }

    private function handleFileType()
    {
        $this->cache = new FileCacheCreator();
    }

    private function handleDbType()
    {
        /* do something with database and return connection or something similar */
    }

    private function handleClassType()
    {
        /* load cache class reflection etc. */
    }
}