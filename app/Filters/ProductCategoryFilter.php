<?php

namespace App\Filters;

use EloquentFilter\ModelFilter;

class ProductCategoryFilter extends ModelFilter
{
    /**
     * Related Models that have ModelFilter as well as the method on the ModelFilter
     * As [relationMethod => [input_key1, input_key2]].
     *
     * @var array
     */
    public $relations = [];

    /**
     ** Filter search
     *
     * @param $search
     * @return QueryBuilder
     */
    public function search($search)
    {
        return $this->where(function ($query) use ($search) {
            return $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%');
        });
    }
}
