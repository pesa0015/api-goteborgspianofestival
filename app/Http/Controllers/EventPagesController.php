<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventPage;
use App\Year;

class EventPagesController extends CustomController
{
    /**
     * Display the specified resource.
     *
     * @param  $slug
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $year, $slug)
    {
        $eventYear = Year::where('year', $year)->firstOrFail();

        $eventPageRaw = EventPage::where('slug', $slug)->where('year_id', $eventYear->id)->with([
            'translations' => function ($query) {
                return $query->ofLang();
            }
        ])->firstOrFail();

        $eventPage = $this->transform->item($eventPageRaw, EventPage::getTransformer());

        return response()->json($eventPage, 200);
    }
}
