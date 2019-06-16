<?php

namespace App\UtilityTraits;

use App\Category;
use App\Subcategory;
use App\Queries\CategoriesForDropdownQuery;

trait CategoryTrait
{
    /**
     * @return array
     */

    private function getCategoryLists()
    {
        $categories = CategoriesForDropdownQuery::data();

        $subcategories = Subcategory::all();

        return [$categories, $subcategories];
    }


}