<?php
namespace app\common\modules\Product\services;

use app\common\modules\Product\define\ProductDef;
use app\common\modules\Product\services\helpers\MockCreator;
use app\common\interfaces\DbInterface;

class ProductProductDatabase implements DbInterface
{
    private $databaseType;
    
    private $database;

    public function __construct(string $databaseType)
    {
        $this->databaseType = $databaseType;
        $this->setDatabase();
    }

    private function setDatabase()
    {
        switch ($this->databaseType) {
            case ProductDef::PRODUCT_PRODUCT_DB_TYPE_MOCK:
                $this->handleMockType();
                break;
            case ProductDef::PRODUCT_PRODUCT_DB_TYPE_SQL:
                $this->handleDbType();
                break;
            default:
                $this->handleDbType();
        }
    }

    public function getConnection()
    {
        return $this->database;
    }

    private function handleMockType()
    {
        $this->database = new MockCreator();
    }

    private function handleDbType()
    {
        /* do something with database and return connection or something similar */
    }

}