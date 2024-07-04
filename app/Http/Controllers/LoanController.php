<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\BankDetail;
use App\Models\Guarantor;
use App\Models\Loan;
use App\Models\LoanStatuses;
use App\Models\MonthlyIncome;
use App\Models\NextOfKin;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class LoanController extends Controller
{


    public function index(){
        $user = auth()->user();
    
        $profile = UserDetail::where('user_id', $user->id)->where('status', 1)->first();
        $nextOfKin = NextOfKin::where('user_id', $user->id)->where('status', 1)->first();
        $guarantor = Guarantor::where('user_id', $user->id)->where('status', 1)->first();
        $bankdetails = BankDetail::where('user_id', $user->id)->where('status', 1)->first();
        $monthlyIncome = MonthlyIncome::where('user_id', $user->id)->where('status', 1)->first();
        $assets = Asset::where('user_id', $user->id)->where('status', 1)->get();
    
        // Check if any required detail is missing
        if (is_null($profile) || is_null($nextOfKin) || is_null($guarantor) || is_null($bankdetails) || is_null($monthlyIncome) || $assets->isEmpty()) {
            return redirect('/client/dashboard')->with('fail', 'Sorry, you cannot request a loan until you fill in the profile and finance information.');
        }
    
        // Check if there is any loan that is not PAID
        $active_loan = Loan::where('user_id', $user->id)->whereNotIn('status', ['PAID', 'REJECTED'])->first();
        if (!is_null($active_loan)) {
            return redirect('/client/dashboard')->with('fail', 'Sorry, you cannot request a loan because you already have an active loan.');
        } 
    
        // All checks passed, show the loan index page
        return view('client.loan.index', ['user' => $user, 'assets' => $assets]);
    }


    public function storeLoan(Request $request)
{
    try {
        // validate request data
        $request->validate([
            'loan_type' => 'required|string',
            'pay_slips' => 'nullable|file|mimes:jpeg,png,jpg,gif,pdf|max:2048',
            'sales_records' => 'nullable|file|mimes:jpeg,png,jpg,gif,pdf|max:2048',
            'asset_id' => 'nullable|array',
            'asset_id.*' => 'integer|exists:assets,id',
            'amount' => 'required|string',
            'amount_in_words' => 'required|string',
            'period' => 'required|string',
            'purpose' => 'required|string',
        ]);

        DB::transaction(function () use ($request) {
            // Create new loan
            $loan = new Loan([
                'loan_type' => $request->loan_type,
                'amount' => $request->amount,
                'amount_in_words' => $request->amount_in_words,
                'period' => $request->period,
                'purpose' => $request->purpose,
                'user_id' => auth()->user()->id,
                'status' => 'PENDING',
            ]);

            if ($request->loan_type === 'payslip_related' && $request->hasFile('pay_slips')) {
                $loan->pay_slips = $request->file('pay_slips')->store('pay_slips', 'public');
            }
            
            if ($request->loan_type === 'business_related' && $request->hasFile('sales_records')) {
                $loan->sales_records = $request->file('sales_records')->store('sales_records', 'public');
            }

            $loan->save();

            if ($loan->id) {
                $loanStatuses = new LoanStatuses([
                    'loan_id' => $loan->id,
                    'verified_by' => null, 
                    'recommended_by' => null, 
                    'approved_by' => null, 
                ]);
                
                $loanStatuses->save();
            } else {
                // Handle the case where $loan is not valid
                throw new InvalidArgumentException('Invalid loan object or missing loan ID.');
            }

            if ($request->loan_type === 'collateral_related') {
                $loan->assets()->attach($request->asset_id);
            }
        });

        // return JSON response indicating success
        return response()->json(['message' => 'Loan Details Added Successfully'], Response::HTTP_OK);
    } catch (\Exception $e) {
        // return JSON response indicating error
        return response()->json(['message' => 'Error adding Loan Details: ' . $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}

    public function loanHistory(){
        $user = auth()->user();

        // Eager load the assets relationship
        $loans = Loan::where('user_id', $user->id)
                    ->with('assets')
                    ->get();

        return view('client.loan.loan-history', ['user' => $user, 'loans' => $loans]);
    }

    public function loanView(Loan $loan){
        $user = auth()->user();

        // Eager load the assets relationship
        // $loans = Loan::where('user_id', $user->id)
        //             ->with('assets')
        //             ->get();

        return view('client.loan.loan-view', ['user' => $user, 'loan' => $loan]);
    }

}
