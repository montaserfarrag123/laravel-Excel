<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Validation\Rule;
use App\Models\ManageUser;

class UsersImport implements ToCollection ,WithHeadingRow ,WithValidation
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            //So That Another Row is Not Added For The Same User
            $ManageUser = ManageUser::where('email',$row['email_exc'])->first();
            if($ManageUser){
                $ManageUser->update([
                    'name' => $row['full_name'],
                    'phone' => $row['tel_number'],
                ]);

            }else{
                // Add a new user
            ManageUser::create([
                'name' => $row['full_name'],
                'email' => $row['email_exc'],
                'phone' => $row['tel_number'],
            ]);
          }
        }

    }
                //Check The Data Coming From The File
    public function rules(): array{

        return[
            'full_name'=>'required',
            'email_exc'=>'required|email',
            'tel_number'=>'required'
        ];
    }
}
