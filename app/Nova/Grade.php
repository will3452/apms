<?php

namespace App\Nova;

use App\Models\Role;
use App\Models\Year;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;

class Grade extends Resource
{

    public static function indexQuery(NovaRequest $request, $query)
    {
        if (!auth()->user()->hasRole(Role::SUPERADMIN)) {
            return $query->where('teacher_id', auth()->id());
        }
        return $query;
    }
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Grade::class;

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
        'created_at',
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

            BelongsTo::make('Student')
                ->searchable()
                ->required(),

            Select::make('Year')
                ->options(Year::get()->pluck('label', 'value'))
                ->required(),

            Select::make('Quarter')
                ->options([
                    '1' => "1st",
                    '2' => "2nd",
                    '3' => "3rd",
                    '4' => "4th",
                ])
                ->required(),

            BelongsTo::make('Teacher')
                ->exceptOnForms()
                ->onlyOnDetail()
                ->searchable()
                ->required(),

            BelongsTo::make('Subject')
                ->searchable()
                ->required(),

            Number::make('Grade', 'value')
                ->required(),

            Text::make('Remark'),

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
        return [
            new DownloadExcel,
        ];

    }

    public static $group = "Data Management";
}
