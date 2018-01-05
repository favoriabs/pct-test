<?php

namespace App\Repositories\Currency;
use App\Repositories\Currency\CurrencyContract;
use App\Currency;

class EloquentCurrencyRepository implements CurrencyContract
{
  public function create($request){
    $currency = new Currency;
    $this->setCurrencyProperties($currency, $request);
    $currency->save();
    return $currency;
  }

  public function edit($currencyId, $request){
    $currency = $this->findById($currencyId);
    $this->setCurrencyProperties($currency, $request);
    $currency->save();
    return $currency;
  }

  public function findAll(){
    return Currency::all();
  }

  public function findById($currencyId){
    return Currency::find($currencyId);
  }

  public function discard($currencyId){
    $currency = $this->findById($currencyId);
    $currency->delete();
    return true;
  }

  public function getNairaAmount($requestedFund){
    $currency = Currency::where('short_name', $requestedFund->currency)->first();
    return $currency->naira_equivalent;
  }

  private function setCurrencyProperties($currency, $request){
    $currency->short_name = $request->short_name;
    $currency->long_name = $request->long_name;
    $currency->naira_equivalent = $request->naira_equivalent;
  }
}
