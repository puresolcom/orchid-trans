<?php

namespace App\Orchid\Layouts;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\Link;
use App\Models\Invoice;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\ModalToggle;

class InvoiceListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'invoices';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): array
    {
        return [
            TD::make('number', 'Invoice Number')
                ->render(function (Invoice $invoice) {
                    return Link::make($invoice->number)
                        ->route('platform.invoice.edit', $invoice);
                }),
            TD::make('reference_number', 'Shipment reference number')
            ->render(function (Invoice $invoice) {
                return Link::make($invoice->reference_number)
                    ->route('platform.invoice.edit', $invoice);
            }),
            TD::make('credit_days', 'Credit days')
            ->render(function (Invoice $invoice) {
                return Link::make($invoice->credit_days)
                    ->route('platform.invoice.edit', $invoice);
            }),
            TD::make('Edit')
            ->render(function (Invoice $invoice) {
                return ModalToggle::make('Update')
                        ->icon('fa.pencil')
                        ->modal('invoiceModal')
                        ->modalTitle('Invoice')
                        ->asyncParameters([
                            'invoice' => $invoice,
                        ]);
            }),      
        ];
    }

}
