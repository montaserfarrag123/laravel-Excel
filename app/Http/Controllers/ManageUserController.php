<?php

namespace App\Http\Controllers;

use App\Models\ManageUser;
use Illuminate\Http\Request;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;




class ManageUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ManageUser::all();
        return view('userData',compact('data'));
    }


    public function import(Request $request)
    {
        //  dd($request->import_file);
        $request->validate([
            'import_file' =>[
                'required',
                'file'
            ],
        ]);

        Excel::import(new UsersImport, $request->file('import_file'));
        return redirect()->back()->with('status', 'Imported Successfilly');
    }

    public function export()
    {
        $file_name='users.xlsx';
        return Excel::download(new UsersExport,$file_name );

    }

}
