<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class RealtorListingAcceptOfferController extends Controller
{
    // the invoke function is a built in function
    // it make you call the class as it is a function
    // the 2 underscore functions are special laravel functions
    // this controller is a single action controller

    public function __invoke(Offer $offer)
    {

        $listing = $offer->listing;

        $this->authorize('update', $listing);
        
        //Accept selected offer
        $offer->update(['accepted_at' => now()]);

        $listing->sold_at = now();
        $listing->save();

        // Reject all other offers
        $listing->offers()->except($offer)
        ->update(['rejected_at'=> now()]);

        return redirect()->back()
            ->with('success', "Offer #{$offer->id} accepted, other offers rejected");
    }
}
