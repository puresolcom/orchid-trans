<?php

namespace App\Orchid\Screens;

use App\Models\Invoice;
use App\Models\User;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Auth;
use App\Models\AdditionalCharge;
use App\Models\InvoiceAdditionalCost;
use App\Orchid\Layouts\ChargeLine;
use App\View\Components\CustomButton;
use Orchid\Attachment\File;
use App\Services\Invoice\InvoiceService;
use Redirect;
use App\Models\InvoiceMeta;
use Illuminate\Support\Facades\DB; 

class InvoiceEditScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'InvoiceEditScreen';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'InvoiceEditScreen';

    /**
     * Query data.
     *
     * @return array
     */

    public $exists = false;

    protected $invoiceService;

    public function __construct(InvoiceService $invoiceService)
    {
        $this->invoiceService = $invoiceService;
    }

    public function query(Invoice $invoice): array
    {
        $this->exists = $invoice->exists;

        if($this->exists){
            $this->name = 'Edit invoice';
            $invoiceMeta = $invoice->invoiceMetas;
            $invoiceAdditionalCost = $invoice->details;
            //dd($invoiceMeta);

        }

        return [
            'invoice' => $invoice,
            'invoiceMeta' => !empty($invoiceMeta)? $invoiceMeta : " ",
            'invoiceAdditionalCost' => !empty($invoiceAdditionalCost)?$invoiceAdditionalCost: " "
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
            Button::make('Create Invoice')
                ->icon('pencil')
                ->method('createOrUpdate')
                ->canSee(!$this->exists),

            Button::make('Update')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->exists),

            Button::make('Remove')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->exists),
               
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): array
    {   //dd($invoice->invoiceMetas);
        return [
            Layout::rows([
                Input::make('invoice.user_id')
                    ->type('hidden')
                    ->value(Auth::user()->id),

                Input::make('invoice.bid_id')
                    ->title('Shipment id')
                    ->placeholder('shipment foreign key'),

                Input::make('invoice.number')
                    ->title('Invoice number')
                    ->placeholder('Invoice number'),

                Input::make('invoice.reference_number')
                    ->title('Shipment reference number')
                    ->placeholder('Shipment reference number'),

                Input::make('invoice.credit_days')
                    ->title('Credit days')
                    ->placeholder('Credit days'),           
                    
            ]),
            
            

            Layout::rows([
                Group::make([
                    DateTimer::make('invoiceMeta.invoice_date')
                    ->title('Invoice date')
                    ->format('Y-m-d'),
                    Input::make('invoiceMeta.invoice_number')
                        ->title('Invoice number')
                        ->placeholder('Invoice number'),
                    Input::make('invoiceMeta.invoice_amount')
                        ->title('Invoice amount')
                        ->type('number')
                        ->placeholder('Invoice amount'),
                    Upload::make('invoice.carrier_invoice')
                        ->title('Carrier invoice')
                        ->maxFiles(1)
                        //->maxFileSize(1024)
                        ->groups('photo','documents')
                        ->targetId(),    
                ]),
            ]),
            Layout::rows([
                Group::make([
                    DateTimer::make('invoiceMeta.cn_date')
                    ->title('Credit note date')
                    ->format('Y-m-d'),
                    Input::make('invoiceMeta.cn_number')
                        ->title('Crdit days number')
                        ->placeholder('Invoice number'),
                    Input::make('invoiceMeta.cn_amount')
                        ->title('Credit amount')
                        ->type('number')
                        ->placeholder('Invoice amount'),

                    Upload::make('invoice.credit_note_file')
                    ->title('Credit note file')
                    ->maxFiles(1)
                    //->maxFileSize(1024)
                    ->groups('photo','documents')
                    ->targetId(),    
                ]),
            ]),
            
            Layout::rows([
                Group::make([
                    Select::make('invoiceAdditionalCost.description.')
                        ->title('Charge line')
                        ->fromModel(AdditionalCharge::class, 'charges_line'),
                    Input::make('invoiceAdditionalCost.cost.')
                        ->title('Cost')
                        ->placeholder('cost'),
                    Input::make('invoiceAdditionalCost.vat.')
                    ->title('Vat')
                    ->placeholder('vat'),
                    Upload::make('invoiceAdditionalCost.attachment.')
                        ->title('Charge attachment')
                        //->maxFiles(2)
                        //->maxFileSize(1024)
                        ->groups('photo','documents')
                        ->targetId(), 
                ]),
            ]),
            Layout::component(CustomButton::class),
            //ChargeLine::class,
            
        ];
    }

    public function createOrUpdate(Invoice $invoice, Request $request)
    {   
        $response = $this->invoiceService->createInvoice($request);
        if(is_array($response)){
            Alert::info('You have successfully created an invoice.');
            return redirect()->route('platform.invoice.list');
        }else{
            return Redirect::back()->withErrors($response);
        }
    }

    public function remove(Invoice $invoice)
    {   DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $invoice->delete();

        Alert::info('You have successfully deleted the invoice.');

        return redirect()->route('platform.invoice.list');
    }

}
