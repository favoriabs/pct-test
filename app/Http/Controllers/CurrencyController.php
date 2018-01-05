<?php

	namespace App\Http\Controllers;

	use Illuminate\Http\Request;
	use App\Repositories\Currency\CurrencyContract;

	class CurrencyController extends Controller
	{

			protected $repo;

			public function __construct(CurrencyContract $currencyContract) {
				$this->middleware('auth');
				$this->repo = $currencyContract;
			}

	    /**
	     * Display a listing of the resource.
	     *
	     * @return \Illuminate\Http\Response
	     */
	    public function index()
	    {
	        $currencies = $this->repo->findAll();
					return view('currency.index')->with('currencies', $currencies);
	    }

	    public function create()
	    {
	        return view('currency.create');
	    }

	    public function store(Request $request)
	    {
				$this->validate($request, [
					'short_name' => 'required',
					'long_name' => 'required',
					'naira_equivalent' => 'required',
				]);

				$currency = $this->repo->create($request);

				if($currency){
					return redirect()->route('manage_currencies')->with('success', 'Currency has been created successfully!!!');
				}else{
					return back()->with('error', 'Something went wrong, try again!!!');
				}
	    }
	    public function edit($id)
	    {
	        $currency = $this->repo->findById($id);
					return view('currency.edit')->with('currency', $currency);
	    }

	    public function update(Request $request, $id)
	    {
				$this->validate($request, [
					'short_name' => 'required',
					'long_name' => 'required',
					'naira_equivalent' => 'required',
				]);

				$currency = $this->repo->edit($id,  $request);

				if($currency->id){
					return redirect()->route('manage_currencies')->with('success', 'Currency has been edited successfully!!!');
				}else{
					return back()->with('error', 'Something went wrong, try again!!!');
				}
	    }

	    public function delete($id)
	    {
	        $currency = $this->repo->discard($id);

					if($currency){
						return redirect()->route('manage_currencies')->with('success', 'Currency has been deleted successfully!!!');
					}else{
						return back()->with('error', 'Something went wrong, try again!!!');
					}
	    }
	}
