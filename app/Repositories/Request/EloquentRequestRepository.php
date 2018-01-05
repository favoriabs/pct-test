<?php

namespace App\Repositories\Request;
use App\Repositories\Request\RequestContract;
use App\Request as RequestedFund;

class EloquentRequestRepository implements RequestContract
{
  public function create($request){
    $requestedFund = new RequestedFund;
    $this->setRequestFundProperties($requestedFund, $request);
    $requestedFund->save();
    return $requestedFund;
  }

  public function edit($requestedFundId, $request){
    $requestedFund = $this->findById($requestedFundId);
    $this->setRequestFundProperties($requestedFund, $request);
    $requestedFund->save();
    return $requestedFund;
  }

  public function findAll(){
    return RequestedFund::all();
  }

  public function findById($requestedFundId){
    return RequestedFund::find($requestedFundId);
  }

  public function discard($requestedFundId){
    $requestedFund = $this->findById($requestedFundId);
    $requestedFund->delete();
    return true;
  }

  private function setRequestFundProperties($requestedFund, $request){
    $requestedFund->full_name = $request->full_name;
    $requestedFund->passport_number = $request->passport_number;
    $requestedFund->request_type = $request->request_type;
    $requestedFund->date_of_travel = $request->date_of_travel;
    $requestedFund->request_type = $request->request_type;
    $requestedFund->amount_needed = $request->amount_needed;
    $requestedFund->email = $request->email;
    $requestedFund->currency = $request->currency;

    $destination = 'uploads/tickets';
    $extension = $request->file('air_ticket')->getClientOriginalExtension();
    $fileName = rand(1111111, 9999999).'.'.$extension;
    $request->file('air_ticket')->move($destination, $fileName);
    $requestedFund->air_ticket = '/'.$destination.'/'.$fileName;

    $destination = 'uploads/passports';
    $extension = $request->file('passport')->getClientOriginalExtension();
    $fileName = rand(1111111, 9999999).'.'.$extension;
    $request->file('passport')->move($destination, $fileName);
    $requestedFund->passport = '/'.$destination.'/'.$fileName;


  }
}
