<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Screen;
use App\Models\Invoice;
use Orchid\Screen\Actions\Link;
use Orchid\Support\Facades\Layout;
use App\Orchid\Layouts\InvoiceListLayout;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use App\Services\Invoice\InvoiceService;
use Redirect;
//use App\Models\
class InvoiceListScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'InvoiceListScreen';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'InvoiceListScreen';

    /**
     * Query data.
     *
     * @return array
     */

    protected $invoiceService; 

    public function __construct(InvoiceService $invoiceService)
    {
        $this->invoiceService = $invoiceService;
    }


    public function query(): array
    {
        return [
            'invoices' => Invoice::with('invoiceMetas')->paginate()
        ];
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
        return [
            Link::make('Create new invoice')
                ->icon('pencil')
                ->route('platform.invoice.edit')
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): array
    {   
        return [
            InvoiceListLayout::class,
            Layout::modal('invoiceModal', [
                Layout::rows([
                    Input::make('invoice.id')
                    ->type('hidden'),
                    Input::make('invoice.number')
                    ->title('Invoice number')
                    ->placeholder('Invoice number'),
                    Input::make('invoice.reference_number')
                    ->title('Shipment reference number')
                    ->placeholder('Shipment reference number'),
                    Input::make('invoice.credit_days')
                    ->title('Credit days')
                    ->placeholder('Credit days'),
                    Input::make('invoiceMeta.invoice_date')
                    ->title('Invoice date')
                    ->placeholder('Invoice date'),
                ]),
            ])
                ->title('Window title')
                ->applyButton('Send')
                ->closeButton('Close')
                ->async('asyncGetData')
        ];
    }

    public function asyncGetData($invoice){
        $invoice = Invoice::where('id',$invoice['id'])
        ->with('invoiceMetas')->first();
        
        return [
            'invoice' => $invoice,
        ];
    }

    public function UpdateInvoiceModalHandler($data, Request $request){
        
        $request->validate([
            'invoice.credit_days' => 'max:30'
        ]);

        $response=$this->invoiceService->update($request);
        if($response == 1){
            return Redirect::back();
        }else{
            return Redirect::back()->withErrors($response);
        }
    }

}
