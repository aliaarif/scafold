<?php

namespace App\Http\Controllers;



use App\Imports\BusinessImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function import()
    {
        Excel::import(new BusinessImport, 'businesses.xlsx');

        // return redirect()->route('products.index')->with('success', 'Data imported successfully!');
       return  'Data imported successfully!';
    }
}
