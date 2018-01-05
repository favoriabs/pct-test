<?php

namespace App\Repositories\Request;

interface RequestContract
{
  public function create($request);
  public function edit($requestedFundsId, $request);
  public function findAll();
  public function findById($requestedFundsId);
  public function discard($requestedFundsId);
}
