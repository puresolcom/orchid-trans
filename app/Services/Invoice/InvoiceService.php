<?php
namespace App\Services\Invoice;

use App\Services\BaseService;
use App\Models\Invoice;
use Illuminate\Support\Facades\DB; 

class InvoiceService extends BaseService
{
    
    public function getInvoiceById($id){
        $invoice = Invoice::where('id',$id)->first();
        return $invoice;
    }

    public function update($request){
        DB::beginTransaction();
        try{
            $invoice = Invoice::where('id',$request->input('invoice')['id'])->update([
                "number" => $request->input('invoice')['number'],
                "reference_number" => $request->input("invoice")["reference_number"],
                "credit_days" => $request->input('invoice')["credit_days"]
            ]);

        }
        catch(\Exception $exception){
            DB::rollback();
            return $exception->getMessage();
        }
        DB::commit();
        return 1;
    }
}
