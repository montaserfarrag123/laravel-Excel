<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\ManageUser;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ManageUser::select('name','email','phone')->get();

    }

    public function headings(): array
    {
        return [
            'Name',
            'email',
            'Phone',
        ];
    }

    // here you select the row that you want in the file
    // public function map($row): array{
    //     $fields = [
    //        $row->name,
    //        $row->phone,
    //        $row->email,
    //   ];
    //  return $fields;
//  }
}
