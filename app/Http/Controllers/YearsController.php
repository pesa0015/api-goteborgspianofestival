<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $yearsRaw = Year::activeYears()->get();

        $years = $this->transform->collection($yearsRaw, Year::getTransformer());

        return response()->json($years, 200);
    }

    public function current()
    {
        $yearRaw = Year::current();

        $year = $this->transform->item($yearRaw, Year::getTransformer(), ['locations']);

        return response()->json($year, 200);
    }
}
