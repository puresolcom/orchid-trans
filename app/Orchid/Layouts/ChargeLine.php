<?php

namespace App\Orchid\Layouts;

use Orchid\Screen\Field;
use Orchid\Screen\Layouts\Rows;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Select;
use App\Models\AdditionalCharge;
use App\Models\InvoiceAdditionalCost;
use Orchid\Screen\Fields\Upload;

class ChargeLine extends Rows
{
    /**
     * Used to create the title of a group of form elements.
     *
     * @var string|null
     */
    protected $title;

    /**
     * Get the fields elements to be displayed.
     *
     * @return Field[]
     */
    protected function fields(): array
    {
        return [
            
            Group::make([
                Select::make('InvoiceAdditionalCost[description][]')
                    ->title('Charge line')
                    ->fromModel(AdditionalCharge::class, 'charges_line'),
                Input::make('InvoiceAdditionalCost[cost][]')
                    ->title('Cost')
                    ->placeholder('cost'),
                Input::make('InvoiceAdditionalCost[vat][]')
                ->title('Vat')
                ->placeholder('vat'),
                Upload::make('InvoiceAdditionalCost[attchment][]')
                    ->title('Charge attachment')
                    ->maxFiles(1)
                    //->maxFileSize(1024)
                    ->groups('photo','documents'), 
            ]),
            
        ];
    }

    
}
