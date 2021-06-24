<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
USE DB;
use App\Models\User;
use Auth;

class OrderExportReport implements FromCollection, WithHeadings
{
    
    protected $request;

    public function __construct($request) 
    {
        $this->request = $request;
    }
    
    
    /**
    * @return \Illuminate\Support\Collection
    */
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       
        $from = $this->request->start_date;
        $to = $this->request->end_date;
        $status = $this->request->status;
        $user = Auth::id();
        
        return collect(DB::select("SELECT a.product_name, a.status, a.created_at, b.total_price, b.orderid, c.phoneno FROM order_details AS a 
        INNER join orders AS b on a.order_id = b.id
        INNER join users as c on a.user_id = c.id
        where a.created_at between '$from' and '$to' and a.status = '$status' and a.merchant_id = '$user'
        "));
    }

    public function headings(): array
    {
        return array('product_name','status', 'created_at', 'total_price', 'order_no','phone number');
    }
}
