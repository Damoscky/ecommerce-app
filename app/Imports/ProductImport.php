<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Auth;

class ProductImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $subcat = SubCategory::where('sub_cat_name', $row['subcategory_name'])->first();
        $data = [
            "product_name" => $row['product_name'],
            "product_description" => $row['product_description'],
            "cat_id" => $subcat->cat_id,
            "sub_cat_id" => $subcat->id,
            "new_price" => $row['new_price'],
            "old_price" => $row['old_price'],
            "production_company" => $row['production_company'],
            "product_image" => $row['image'],
            "user_id" => Auth::id(),
            "available_quantity" => $row["available_quantity"],
            "in_stock" => $row["available_quantity"] > 0 ? 1 : 0,
            "tags" => $row["tags"],
        ];
        return new Product($data);
    }
}
