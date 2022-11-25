<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DonationRequest;
use Illuminate\Http\Request;

class DonationRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.donation-requests.index',[
            'donationRequests' => DonationRequest::latest()->filter(request(['search']))->simplePaginate(10)
        ]);
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(DonationRequest $donationRequest)
    {
        return view('admin.donation-requests.show',[
            'donationRequest' => $donationRequest
        ]);
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DonationRequest $donationRequest)
    {
        $donationRequest->delete();
        return redirect()->route('donation-requests.index')->with('message','Donation Request Deleted Successfully');
    }
}
