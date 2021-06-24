<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
USE DB;
use App\Models\User;

class CustomerExportReport implements FromCollection, WithHeadings
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

        $role = 'customer';
        $customers = User::whereHas('roles', function ($roleTable) use ($role) {
            $roleTable->where('name', '=', $role);
        })->whereBetween('created_at', [$from, $to])->where('is_active',$status)
        ->get(['firstname', 'lastname', 'email', 'created_at' ]);

        return collect($customers);
        
        
    }

    public function headings(): array
    {
        return array('firstname','lastname', 'email', 'created_at');
    }
}
