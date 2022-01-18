<?php

namespace App\Http\Controllers;


use App\Models\Agency;
use App\Models\Loans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Storage\Memcached;

class LoanController extends Controller
{

    public function UserLevel()
    {

        $loans = [];
        if (Gate::allows('admin', auth()->user())) {
            return view('/loans/_partials.Admin', ['loans' => $loans]);
        } else {
            return view('/loans/_partials.LoanSearch', ['loans' => $loans]);
        }
    }


    public function create()
    {
        $agency = Agency::all();
        return view('loans.LoanForms', ['Agency' => $agency]);
    }




    public function store(request $request)
    {


        $request->validate([
            'Customer_Name' => 'required|min:3|max:255',
            'Customer_Number' => 'required|numeric|digits:9',
            'branch' => 'required',
            'image' => 'mimes:jpg|max:2048|unique:loans'
        ]);

        $path = $request->file('image')->store('images');

     //   $path = Storage::disk('public')->put('/images', $request->file('image'));

      //  $path = Storage::disk('local')->put();
        Loans::create([
            'Customer_Name' => request()->get('Customer_Name'),
            'Customer_Number' => request()->get('Customer_Number'),
            'branch' => request()->get('branch'),
            'image' => $path,
        ]);
        session()->flash('success', 'Forms uploaded Successfully!');
        return redirect()->back();


    }







        public function SearchLoan(request $request)
        {
                         $agency = Agency::all();
            $request->validate ([
                'Customer_Number' => 'required|numeric|digits:9|exists:loans',
         ]);
         $Customer_Number = request()->get('Customer_Number');

         $loans = Loans::where('Customer_Number',$Customer_Number)->get();
           //ddd($loans);

           //echo $loans;



          return view('loans/_partials.LoanSearch', ['loans' => $loans, 'agency' => $agency]);

        }

}
