<?php

namespace App\Http\Controllers;

use App\Sponsor;

class SponsorsController extends CustomController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sponsorsRaw = Sponsor::where('active', true)->get();

        $sponsors = $this->transform->collection($sponsorsRaw, Sponsor::getTransformer());

        return response()->json($sponsors, 200);
    }
}
