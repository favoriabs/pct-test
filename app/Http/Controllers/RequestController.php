<?php

	namespace App\Http\Controllers;

	use Illuminate\Http\Request;
	use App\Repositories\Request\RequestContract;
	use App\Repositories\Currency\CurrencyContract;
	use App\Mail\RequestMade;

	class RequestController extends Controller
	{

			protected $repo;
			protected $currencyRepo;

			public function __construct(RequestContract $requestContract, CurrencyContract $currencyContract) {
				$this->repo = $requestContract;
				$this->currencyRepo = $currencyContract;
			}

	    /**
	     * Display a listing of the resource.
	     *
	     * @return \Illuminate\Http\Response
	     */
	    public function index()
	    {
	        $requests = $this->repo->findAll();
					return view('request.index')->with('requests', $requests);
	    }

	    /**
	     * Show the form for creating a new resource.
	     *
	     * @return \Illuminate\Http\Response
	     */
	    public function create()
	    {
				$currencies = $this->currencyRepo->findAll();
	      return view('request.create')->with('currencies', $currencies);
	    }

	    /**
	     * Store a newly created resource in storage.
	     *
	     * @param  \Illuminate\Http\Request  $request
	     * @return \Illuminate\Http\Response
	     */
	    public function store(Request $request)
	    {
	        $this->validate($request, [
						'full_name' => 'required',
						'passport_number' => 'required',
						'request_type' => 'required',
						'date_of_travel' => 'required',
						'air_ticket' => 'required',
						'passport' => 'required',
						'amount_needed' => 'required',
						'email' => 'required',
						'currency' => 'required',
					]);

					$requestedFund = $this->repo->create($request);

					$getNaira = $this->currencyRepo->getNairaAmount($requestedFund);

					$amount = $requestedFund->amount_needed * $getNaira;

					\Mail::to($requestedFund->email)->send(new RequestMade($amount, $requestedFund->full_name));

					if($requestedFund){
						return back()->with('success', 'Request has been made successfully!!!');
					}else{
						return back()->with('error', 'Something went wrong, try again!!!');
					}
	    }

	    /**
	     * Display the specified resource.
	     *
	     * @param  int  $id
	     * @return \Illuminate\Http\Response
	     */
	    public function show($id)
	    {
	        //
	    }

	    /**
	     * Show the form for editing the specified resource.
	     *
	     * @param  int  $id
	     * @return \Illuminate\Http\Response
	     */
	    public function edit($id)
	    {
	        //
	    }

	    /**
	     * Update the specified resource in storage.
	     *
	     * @param  \Illuminate\Http\Request  $request
	     * @param  int  $id
	     * @return \Illuminate\Http\Response
	     */
	    public function update(Request $request, $id)
	    {
	        //
	    }

	    /**
	     * Remove the specified resource from storage.
	     *
	     * @param  int  $id
	     * @return \Illuminate\Http\Response
	     */
	    public function delete($id)
	    {
	        //
	    }
	}
