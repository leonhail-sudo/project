<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Model;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\TransformerAbstract;

class TFHelper
{
    /**
     * Transform a collection.
     *
     * @param $items
     * @param \League\Fractal\TransformerAbstract $transformer
     * @param array $data = []
     * @return transformed collection
     */
    public static function collection($items, TransformerAbstract $transformer, array $data = [])
    {
        $fractal = fractal()->collection($items, $transformer);
        // Determine if the request has page
        if (isset($data['page'])) {
            return $fractal->paginateWith(new IlluminatePaginatorAdapter($items))
            ->collection($items, $transformer)
            ->toArray();
        }

        return $fractal->toArray();
    }

    /**
     * Transform an item.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param \League\Fractal\TransformerAbstract $transformer
     * @return transformed item
     */
    public static function item(Model $model, TransformerAbstract $transformer)
    {
        return fractal()->item($model, $transformer)->toArray();
    }
}
