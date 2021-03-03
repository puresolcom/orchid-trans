<?php

namespace App\Orchid\Filters;

use Illuminate\Database\Eloquent\Builder;
use Orchid\Filters\Filter;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;

class UserFullNameFilter extends Filter
{
    /**
     * @var array
     */
    public $parameters = [
        'name'
    ];

    
    /**
     * @return string
     */
    public function name(): string
    {
        return __('Name');
    }

    /**
     * @param Builder $builder
     *
     * @return Builder
     */
    public function run(Builder $builder): Builder
    {
        return $builder->where('name', 'LIKE', '%'. $this->request->get('name') . '%');
    }

    /**
     * @return Field[]
     */
    public function display(): array
    {
        return [
            Input::make('name')
            ->type('text')
            ->value($this->request->get('name'))
            ->placeholder(__('Search...'))
            ->title(__('Search')),
        ];
    }
}
