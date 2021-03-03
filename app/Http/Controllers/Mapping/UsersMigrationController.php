<?php

namespace App\Http\Controllers\Mapping;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersMigrationController extends Controller
{

    public function getallUsers(){

        $getAllUsers = DB::table('users1')->select('*')->join('company_profile', 'company_profile.user_id', '=', 'users1.id')->whereNotIn('users1.id', [32])->get();
       
        
        $metaData=array();

        foreach($getAllUsers as $getAllUser){

            $id=$getAllUser->id;
            $name=$getAllUser->first_name." ".$getAllUser->last_name;
            $email=$getAllUser->email;
            $password=$getAllUser->password;
            $remember_token=$getAllUser->remember_token;
            if($getAllUser->role_id==2){

                $role=2;
            }
            if($getAllUser->role_id==3){

                $role=3;
            }


            DB::table('users')->insert(
                [
                    'id' => $id,
                    'name' => $name,
                    'email'=> $email,
                    'password' => $password,
                    'remember_token' => $remember_token,
                ]);

            DB::table('role_users')->insert(
                    [
                        'user_id' => $id,
                        'role_id' => $role,
                        
                    ]);    

                    $metaData=[

                        'mobile_number'=>$getAllUser->mobile_number,
                        'phone_number'=>$getAllUser->phone_number,
                        'carrier_service_type'=>$getAllUser->carrier_service_type,
                        'shipper_service_type'=>$getAllUser->shipper_service_type,
                        'accept_terms_condition'=>$getAllUser->accept_terms_condition,
                        'accept_contacted_by'=>$getAllUser->accept_contacted_by,
                        'company_name'=>$getAllUser->company_name,
                        'street_name'=>$getAllUser->street_name,
                        'street_no'=>$getAllUser->street_no,
                        'address_extension'=>$getAllUser->address_extension,
                        'postcode'=>$getAllUser->postcode,
                        'city_id'=>$getAllUser->city_id,
                        'license_number'=>$getAllUser->trade_license_number,
                        'license_expiry_date'=>$getAllUser->trade_license_expiry_date,
                        'vat_code'=>$getAllUser->vat_id,
                        'company_code'=>$getAllUser->company_symbol,
                        'credit_terms'=>$getAllUser->credit_terms,
                        'company_sap_code'=>$getAllUser->company_sap_code,
                        'power_bi_reports'=>$getAllUser->power_bi_reports,
        
        
                    ];
                 

           foreach($metaData as $key => $value){


            DB::table('user_metas')->insert(
                    [
                        'user_id' => $id,
                        'key' => $key,
                        'value' => $value,
                        
                    ]);
            }
         


        }
        
   
    }
    
}
