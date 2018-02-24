<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Year;
use App\Day;

class DaysController extends CustomController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('years') && !empty($request->years)) {
            $yearsRaw = Year::whereIn('year', explode(',', $request->years))
                ->with(['days', 'days.activities'])->get();
        } else {
            $yearsRaw = Year::activeYears()
                ->with(['days', 'days.activities'])->get();
        }

        $years = $this->transform->collection($yearsRaw, Year::getTransformer(), Year::getIncludes());

        return response()->json($years, 200);
    }
}
