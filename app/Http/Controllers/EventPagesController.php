<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventPage;

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
        $eventPageRaw = EventPage::where('slug', $slug)->with([
            'year' => function ($query) use ($request) {
                return $query->where('year', $request->year)->firstOrFail();
            },
            'translations' => function ($query) {
                return $query->ofLang();
            }
        ])->firstOrFail();

        $eventPage = $this->transform->item($eventPageRaw, EventPage::getTransformer());

        return response()->json($eventPage, 200);
    }
}
