<?php

namespace App\Http\Controllers;

use App\Year;

class YearsController extends CustomController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $yearsRaw = Year::activeYears()->with([
            'days',
            'days.activities',
            'days.activities.location',
            'days.activities.room',
            'days.activities.translations' => function ($query) {
                return $query->ofLang();
            }
        ])->get();

        $years = $this->transform->collection($yearsRaw, Year::getTransformer(), Year::getIncludes());

        return response()->json($years, 200);
    }

    public function current()
    {
        $yearRaw = Year::with('locations')->get()->last();

        $year = $this->transform->item($yearRaw, Year::getTransformer(), ['locations']);

        return response()->json($year, 200);
    }
}
