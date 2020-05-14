<?php

namespace App\Http\Controllers\API\v1\Listings;

use App\Http\Controllers\Controller;
use App\Http\Resources\ListingResource;
use App\Models\Listing;
use App\Supports\ApiSettings;
use Illuminate\Http\Request;
use Validator;

class ApiListingController extends Controller
{
    use ApiSettings;

    public function index(Request $request) { 

    	$data = $this->data;

    	$rules = [
            'latitude'            => 'required|numeric',
            'longitude'           => 'required|numeric',
        ];

        $message = [];

        $validator = Validator::make($request->input(), $rules, $message);

        if ($validator->fails()) {
            return $this->failedResponse($request, $validator->errors()->first());
        }

    	$listings = Listing::distance($request->input('latitude'), $request->input('longitude'))->get();

		array_push($data, $listings);
		$appData = $this->prepareAppData($request, $data);

        return ListingResource::collection($listings)->additional(['AppData' => $appData]);

	}
}
