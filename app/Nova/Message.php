<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class Message extends Resource
{
    public static $group = "Data Management";

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->where('receiver_id', auth()->id());
    }

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Message::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'message',
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
            BelongsTo::make('From', 'from', User::class)
                ->exceptOnForms(),

            Select::make('From', 'sender_id')
                ->required()
                ->options(\App\Models\User::get()
                        ->pluck('name', 'id'))
                ->exceptOnForms()
                ->displayUsingLabels(),

            // BelongsTo::make('To', 'to', User::class)
            //     ->searchable(),

            Select::make('To', 'receiver_id')
                ->required()
                ->options(\App\Models\User::where('id', '!=', auth()->id())
                        ->where('email', '!=', 'superadmin@apms.com')
                        ->get()
                        ->pluck('name', 'id'))
                ->displayUsingLabels(),

            Textarea::make('Message')
                ->required(),

            Boolean::make('Read at')
                ->exceptOnForms(),

        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
