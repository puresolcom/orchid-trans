<?php
namespace App\Services\Invoice;

use App\Services\BaseService;
use App\Models\Invoice;
use Illuminate\Support\Facades\DB; 
use Auth;
use App\Models\InvoiceProcess;
use App\Models\InvoiceMeta;
use App\Models\InvoiceAdditionalCost;

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

    public static function createInvoice($request)
    {   
        DB::beginTransaction();
        try{

        $invoice = Invoice::updateOrCreate(
            ['bid_id' => $request->input('invoice')['bid_id'] ],
            [
            //'should_apply_vat' => $request->get('should_apply_vat') == 'yes' ? true : false,
            "user_id" => Auth::user()->id,
            "number" => $request->input('invoice')['number'],
            'reference_number' => $request->input('invoice')['reference_number'],
            'credit_days' => 0,
            'draft' => 1
            ]
        );
        
        
        
        if ($invoice)
        {
            /**
             * Storing additional costs
             */
            if ($request->has('invoiceAdditionalCost'))
            {   
                foreach ($request->input('invoiceAdditionalCost')['description'] as $index => $description)
                {   //dd($request->input('invoiceAdditionalCost.attachment', [])[$index][$index]);
                    $invoiceInsertedId = InvoiceAdditionalCost::create([
                        "invoice_id" => $invoice->id,
                        "description" => $description,
                        "cost" => $request->input('invoiceAdditionalCost')['cost'][$index],
                        "vat" => $request->input('invoiceAdditionalCost')['vat'][$index]
                    ]);
                    
                    // if($request->input('invoiceAdditionalCost.attachment', [])[$index][$index]){
                    //     $invoiceInsertedId->attachment()->syncWithoutDetaching(
                    //         $request->input('invoiceAdditionalCost.attachment', [])[$index][$index]
                    //     );
                    // }
                }

            }

            $invoice->attachment()->syncWithoutDetaching(
                $request->input('invoice.carrier_invoice', [])
            );

            $invoice->attachment()->syncWithoutDetaching(
                $request->input('invoice.credit_note_file', [])
            );
            
            $invoiceProcess=  InvoiceProcess::updateOrCreate(
                [
                "invoice_id" => $invoice->id
                ],
                [
                "owner_id" => Auth::user()->id,
                "owner_role_id" => 1,
                "approved" => 0,
                //"additional_data" => $request->input('additional_data'),
                ]   
            );
            
            InvoiceMeta::updateOrCreate([
                "invoice_id" => $invoice->id,
                "key" => "invoice_date"
            ],
            [
                
                "value" => $request->input("invoiceMeta")["invoice_date"]
            ]);
            InvoiceMeta::updateOrCreate([
                "invoice_id" => $invoice->id,
                "key" => "invoice_number",
            ],
            [
                "value" => $request->input("invoiceMeta")["invoice_number"]
            ]);
            InvoiceMeta::updateOrCreate([
                "invoice_id" => $invoice->id,
                "key" => "invoice_amount"
            ],
            [
                "value" => $request->input("invoiceMeta")["invoice_amount"]
            ]);

            InvoiceMeta::updateOrCreate([
                "invoice_id" => $invoice->id,
                "key" => "cn_date"
            ],
            [
                "value" => $request->input("invoiceMeta")["cn_date"]
            ]);
            InvoiceMeta::updateOrCreate([
                "invoice_id" => $invoice->id,
                "key" => "cn_number",
            ],
            [
                "value" => $request->input("invoiceMeta")["cn_number"]
            ]);
            InvoiceMeta::updateOrCreate([
                "invoice_id" => $invoice->id,
                "key" => "cn_amount",
            ],
            [
                "value" => $request->input("invoiceMeta")["cn_amount"]
            ]);
        }
        

        }catch(\Exception $exception){
            \Log::debug($exception->getMessage());
            DB::rollback();
            return $exception->getMessage();
        }
        DB::commit();

        return $invoice->toArray();
    }

    /**
     * Storing additional invoice details
     *
     * @param Request $request
     * @param Invoice $invoice
     */
    public function saveDetails($request,$invoice)
    {   
        foreach ($request->input('invoiceAdditionalCost')['description'] as $index => $description)
        {
            $invoiceInsertedId = InvoiceAdditionalCost::create([
                "invoice_id" => $invoice->id,
                "description" => $description,
                "cost" => $request->input('invoiceAdditionalCost')['cost'][$index],
                "vat" => $request->input('invoiceAdditionalCost')['vat'][$index]
            ]);
                    
            $invoiceInsertedId->attachment()->syncWithoutDetaching(
                $request->input('invoiceAdditionalCost.attachment', [])[$index]
            );
        }
    }
}
