<?php

namespace App\Orchid\Screens;

use App\Models\Invoice;
use App\Models\User;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
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

    public function query(Invoice $invoice): array
    {
        $this->exists = $invoice->exists;

        if($this->exists){
            $this->name = 'Edit invoice';
        }

        return [
            'invoice' => $invoice,
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
    {
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
            
            Layout::component(CustomButton::class),
            
            ChargeLine::class,
            
            
        ];
    }

    public function createOrUpdate(Invoice $invoice, Request $request)
    {
        $invoice->fill($request->get('invoice'))->save();

        Alert::info('You have successfully created an invoice.');

        return redirect()->route('platform.invoice.list');
    }

    public function remove(Invoice $invoice)
    {
        $invoice->delete();

        Alert::info('You have successfully deleted the invoice.');

        return redirect()->route('platform.invoice.list');
    }

    public function addMore(){
        return [
            ChargeLine::class
        ];
    }
}
