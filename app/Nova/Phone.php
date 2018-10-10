<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;

class Phone extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Phone';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'home';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'home', 'office', 'mobile'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('Home')
                ->sortable()
                ->rules('required', 'string', 'max:255'),

            Text::make('Office')
                ->sortable()
                ->rules('required', 'string', 'max:255'),

            Text::make('Mobile')
                ->sortable()
                ->rules('required', 'string', 'max:255'),

            BelongsTo::make('User'),
        ];
    }
}
