<?php
namespace app\common\modules\Product\services\helpers;

final class FileDbCreator
{
    public function findProductCountById(int $productId)
    {
        $countObject = @file_get_contents(FILE_DB_DIR . (string)$productId . '.json');

        if ($countObject !== false) {
            $countObject = json_decode($countObject, true);
        } else {
            $countObject = [
                'id' => $productId,
                'count' => 0
            ];
        }

        return $countObject;
    }

    public function increaseProductCount(int $productId)
    {
        $countObject = $this->findProductCountById($productId);
        $countObject['count'] += 1;

        $countObjectJson = json_encode($countObject);

        file_put_contents(FILE_DB_DIR . (string)$productId . '.json', $countObjectJson);

        return $countObject['count'];
    }
}