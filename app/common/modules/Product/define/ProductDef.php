<?php
namespace app\common\modules\Product\define;

class ProductDef
{
    const TABLE_PRODUCTS = 'products';

    const PRODUCT_ID = 'id';
    const PRODUCT_NAME = 'name';
    const PRODUCT_CATEGORY = 'category';
    const PRODUCT_PRICE = 'price';
    const PRODUCT_DESCRIPTION = 'description';

    const PRODUCT_PRODUCT_DB_TYPE = 'product_product_db_type';
    const PRODUCT_PRODUCT_DB_TYPE_MOCK = 'mock';
    const PRODUCT_PRODUCT_DB_TYPE_SQL = 'sql';

    const PRODUCT_COUNT_DB_TYPE = 'product_count_db_type';
    const PRODUCT_COUNT_DB_TYPE_FILE = 'file';
    const PRODUCT_COUNT_DB_TYPE_SQL = 'sql';

    const PRODUCT_CACHE_TYPE = 'product_cache_type';
    const PRODUCT_CACHE_TYPE_FILE = 'file';
    const PRODUCT_CACHE_TYPE_SQL = 'sql';
    const PRODUCT_CACHE_TYPE_CLASS_DRIVEN = 'class';

}