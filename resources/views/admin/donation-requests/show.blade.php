
@extends('layouts.app')
@section('page-name')
    Donation Request Details
@endsection
@section('content')
    <div class="row mt-4">
        <nav class="w-100">
            <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="false">Patient</a>
                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Hospital</a>
            </div>
        </nav>
        <div class="tab-content p-3" id="nav-tabContent">
            <div class="tab-pane fade active show" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-4">Patient Name</dt>
                        <dd class="col-sm-8">{{$donationRequest->patient_name}}</dd>
                        <dt class="col-sm-4">Patient Age</dt>
                        <dd class="col-sm-8">{{$donationRequest->patient_age}} years old</dd>
                        <dt class="col-sm-4">Blood Type</dt>
                        <dd class="col-sm-8">{{$donationRequest->bloodType->name}}</dd>
                        <dt class="col-sm-4">Blood Bags Needed</dt>
                        <dd class="col-sm-8">{{$donationRequest->blood_bags}}</dd>
                        <dt class="col-sm-4">Contact Phone</dt>
                        <dd class="col-sm-8">{{$donationRequest->patient_phone}}</dd>
                    </dl>
                    @if ($donationRequest->details)
                        <div class="callout callout-info">
                            <h5><i class="fas fa-info"></i> Note:</h5>
                            {{$donationRequest->details}}
                        </div>
                    @else
                        <div class="callout callout-warning">
                            No Details Provided
                        </div>

                    @endif
                </div>
            </div>
            <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-4">Hospital</dt>
                        <dd class="col-sm-8">{{$donationRequest->hospital_name}}</dd>
                        <dt class="col-sm-4">City</dt>
                        <dd class="col-sm-8">{{$donationRequest->city->name}}</dd>
                        <dt class="col-sm-4">Governorate</dt>
                        <dd class="col-sm-8">{{$donationRequest->governorate->name}}</dd>
                        <dt class="col-sm-4">Location</dt>
                        <dd class="col-sm-8"></dd>
                    </dl>
                </div>
            </div>
                
        </div>
    </div>
    
    
    
    
@endsection

