<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Screen;
use App\Models\Invoice;
use Orchid\Screen\Actions\Link;
use Orchid\Support\Facades\Layout;
use App\Orchid\Layouts\InvoiceListLayout;
use Orchid\Screen\Fields\Input;

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
    public function query(): array
    {
        return [
            'invoices' => Invoice::paginate()
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
            ])
                ->title('Window title')
                ->applyButton('Send')
                ->closeButton('Close')
                ->async('asyncGetData')
        ];
    }

    public function asyncGetData($invoice){
        
        return [
            'invoice' => $invoice,
        ];
    }

}
