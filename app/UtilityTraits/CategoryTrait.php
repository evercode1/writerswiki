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


    public function showCategoryName($id)
    {

        $category = Category::where('id', $id)->first();

        return $category->name;



    }

    public function showSubcategoryName($id)
    {

        $subcategory = Subcategory::where('id', $id)->first();

        return $subcategory->name;



    }


}