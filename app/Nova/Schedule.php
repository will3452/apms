<?php

namespace App\Nova;

use App\Nova\Filters\ScheduleFilter;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Select;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;
use Michielfb\Time\Time;

class Schedule extends Resource
{
    public static $group = "Data Management";

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Schedule::class;

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
            BelongsTo::make('Subject')
                ->required(),

            BelongsTo::make('Class Room', 'classRoom')
                ->required(),

            Time::make('Start Time')
                ->format('hh:mm a')
                ->required(),

            Time::make('End Time')
                ->format('hh:mm a')
                ->required(),

            Select::make('Day')
                ->options([
                    'm' => 'Monday',
                    't' => 'Tuesday',
                    'w' => 'Wednesday',
                    'th' => 'Thursday',
                    'f' => 'Friday',
                    's' => 'Saturday',
                ])
                ->displayUsingLabels()
                ->required(),

            BelongsTo::make('Teacher')->searchable()
                ->required(),

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
        return [
            ScheduleFilter::make(),
        ];
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
}
