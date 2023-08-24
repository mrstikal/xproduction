<?php
namespace app\common\modules\Product\services;

use app\common\modules\Product\define\ProductDef;
use app\common\interfaces\DbInterface;
use app\common\modules\Product\services\helpers\FileDbCreator;

class ProductCountDatabase implements DbInterface
{
    private $databaseType;
    
    private $database;

    public function __construct(string $databaseType)
    {
        $this->databaseType = $databaseType;
        $this->setDatabase();
    }

    private function setDatabase(): void
    {
        switch ($this->databaseType) {
            case ProductDef::PRODUCT_COUNT_DB_TYPE_FILE:
                $this->handleFileType();
                break;
            case ProductDef::PRODUCT_COUNT_DB_TYPE_SQL:
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

    private function handleFileType()
    {
        $this->database = new FileDbCreator();
    }

    private function handleDbType()
    {
        /* do something with database and return connection or something similar */
    }
}