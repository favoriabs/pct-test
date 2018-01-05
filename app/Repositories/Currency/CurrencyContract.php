<?php

namespace App\Repositories\Currency;

interface CurrencyContract
{
	public function create($request);
  public function edit($currencyId, $request);
  public function findAll();
  public function findById($currencyId);
  public function discard($currencyId);
}
