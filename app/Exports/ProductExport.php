<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
// use 
class ProductExport implements FromCollection, WithHeadings
{
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        //
        return collect([
            [
                'product_name' => 'Almond Fruits',
                'product_description' => 'Nice to eat',
                'category_name' => 'Nuts and Seed',
                'subcategory_name' => 'Mixed Juice',
                'old_price' => 967,
                'new_price' => 667,
                'image' => "https://images.pexels.com/photos/1132047/pexels-photo-1132047.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940",
                "available_quantity" => 1,
                "production_company" => "Company Name",
                "tags" => "fruits",
            ]
        ]);
    }

    public function headings(): array
    {
        return array('product_name', 'product_description', 'category_name', 'subcategory_name', "old_price", 'new_price', 'image', "available_quantity", "production_company", "tags");
    }
}
