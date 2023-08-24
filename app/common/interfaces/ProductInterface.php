<?php
namespace app\common\interfaces;

interface ProductInterface 
{
    public function findProductById(int $productId): array;
}