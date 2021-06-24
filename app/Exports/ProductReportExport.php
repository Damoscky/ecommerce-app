<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
USE DB;
use Auth;

class ProductReportExport implements FromCollection, WithHeadings
{
    
    protected $request;

    public function __construct($request) 
    {
        $this->request = $request;
    }
    
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       
        $from = $this->request->start_date;
        $to = $this->request->end_date;
        $status = $this->request->status;
        $userID = Auth::id();
        return collect(DB::select("SELECT a.product_name,a.in_stock, a.new_price ,a.created_at, b.cat_name FROM products AS a 
        INNER join categories AS b on a.cat_id = b.id
        where a.created_at between '$from' and '$to' and a.is_active = '$status' and a.user_id = '$userID'
        "));
    }

    public function headings(): array
    {
        return array('product_name','in stock', 'price', 'date added','category');
    }
}
