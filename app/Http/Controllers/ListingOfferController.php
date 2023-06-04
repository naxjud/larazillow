<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Listing;
use Illuminate\Http\Request;

class ListingOfferController extends Controller
{
    public function store(Listing $listing, Request $request)
    {
        // $listing->offers()->save(
        //     Offer::make(
        //         $request->validate([
        //             'amount' => 'required|integer|min:1|max:20000000'
        //         ])
        //         )->bidder()->associate($request->user())
        //     );
        
        $this->authorize('view', $listing);

        $listing->offers()->make(
            $request->validate([
                'amount' => 'required|integer|min:1|max:20000000'
            ])
        )->bidder()->associate($request->user())->save();


        return redirect()->back()->with(
            'success',
            'Offer was made!'
        );
    }
}
