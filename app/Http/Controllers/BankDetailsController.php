<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\BankDetail;
use App\Models\MonthlyIncome;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BankDetailsController extends Controller
{

    public function bankDetails()
    {
        $user = auth()->user();
        $bankdetails = BankDetail::where('user_id', $user->id)->where('status', 1)->first();

        if (is_null($bankdetails)) {
            return view('client.finance.add-bankdetails', ['user' => $user, 'bankdetails' => $bankdetails]);
        } else {
            return view('client.finance.bankdetails', ['bankdetail' => $bankdetails]);
        }
    }


    public function storeBankDetails(Request $request)
    {
        try {
            // validate request data
            $request->validate([
                'bank_name' => 'required|string',
                'branch' => 'required|string',
                'account_name' => 'required|string',
                'account_number' => 'required|string|unique:bank_details,account_number',
                'account_duration' => 'required|string',
                'active_loan' => 'required|boolean',
                'organisation_name' => 'nullable|string',
                'organisation_address' => 'nullable|string',
                'total_debt' => 'nullable|string',
                'remaining_years' => 'nullable|string',
            ]);

            
            // create new brand
            $bank_details_form_data_create = [
                'bank_name' => $request->bank_name,
                'branch' => $request->branch,
                'account_name' => $request->account_name,
                'account_number' => $request->account_number,
                'account_duration' => $request->account_duration,
                'active_loan' => $request->input('active_loan', false),
                'organisation_name' => $request->organisation_name,
                'organisation_address' => $request->organisation_address,
                'total_debt' => $request->total_debt,
                'remaining_years' => $request->remaining_years,
            ];

            $bank_details_form_data_create['user_id'] = auth()->user()->id;
            $bank_details_form_data_create['status'] = 1;

            BankDetail::create($bank_details_form_data_create);

            // return JSON response indicating success
            return response()->json(['message' => 'Bank Details Added Successfully'], Response::HTTP_OK);
        } catch (\Exception $e) {
            // return JSON response indicating error
            return response()->json(['message' => 'Error adding Bank Details Added: ' . $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    public function updateBankDetails(Request $request, BankDetail $bankDetail)
    {

        try {

            // validate request data
            $bankDetail_update_details = $request->validate([
                'bank_name' => 'nullable|string',
                'branch' => 'nullable|string',
                'account_name' => 'nullable|string',
                'account_number' => 'required|string',
                'account_duration' => 'nullable|string',
                'active_loan' => 'nullable|boolean',
                'organisation_name' => 'nullable|string',
                'organisation_address' => 'nullable|string',
                'total_debt' => 'nullable|string',
                'remaining_years' => 'nullable|string',
            ]);

            // update brand
            $bankDetail->update($bankDetail_update_details);

            // return JSON response indicating success
            return response()->json(['message' => 'Bank Details Updated successfully'], Response::HTTP_OK);
        } catch (\Exception $e) {
            // return JSON response indicating error
            return response()->json(['message' => 'Error updating Bank Details: ' . $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function monthlyIncome()
    {
        $user = auth()->user();
        $monthlyIncome = MonthlyIncome::where('user_id', $user->id)->where('status', 1)->first();

        if (is_null($monthlyIncome)) {
            return view('client.finance.add-monthly', ['user' => $user, 'monthlyIncome' => $monthlyIncome]);
        } else {
            return view('client.finance.monthly-income', ['monthlyIncome' => $monthlyIncome]);
        }
    }


    public function storeMonthlyIncome(Request $request)
    {
        try {
            // validate request data
            $request->validate([
                'salary' => 'required|numeric',
                'business_income' => 'required|numeric',
                'other_income' => 'required|numeric',
                'total_income' => 'required|numeric',
                'rent' => 'required|numeric',
                'salaries_wages' => 'required|numeric',
                'other_expenses' => 'required|numeric',
                'total_expenses' => 'required|numeric',
                'net_income' => 'required|numeric'
            ]);

            // create new brand
            $monthlyIncome_form_data_create = [
                'salary' => $request->salary,
                'business_income' => $request->business_income,
                'other_income' => $request->other_income,
                'total_income' => $request->total_income,
                'rent' => $request->rent,
                'salaries_wages' => $request->salaries_wages,
                'other_expenses' => $request->other_expenses,
                'total_expenses' => $request->total_expenses,
                'net_income' => $request->net_income
            ];

            $monthlyIncome_form_data_create['user_id'] = auth()->user()->id;
            $monthlyIncome_form_data_create['status'] = 1;

            MonthlyIncome::create($monthlyIncome_form_data_create);

            // return JSON response indicating success
            return response()->json(['message' => 'Monthly Income Added Successfully'], Response::HTTP_OK);
        } catch (\Exception $e) {
            // return JSON response indicating error
            return response()->json(['message' => 'Error adding Monthly Income A Added: ' . $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    public function updateMonthlyIncome(Request $request, MonthlyIncome $monthlyIncome)
    {
        try {
            // validate request data
            $monthlyIncome_update_details = $request->validate([
                'salary' => 'required|numeric',
                'business_income' => 'required|numeric',
                'other_income' => 'required|numeric',
                'total_income' => 'required|numeric',
                'rent' => 'required|numeric',
                'salaries_wages' => 'required|numeric',
                'other_expenses' => 'required|numeric',
                'total_expenses' => 'required|numeric',
                'net_income' => 'required|numeric'
            ]);

            // update brand
            $monthlyIncome->update($monthlyIncome_update_details);

            // return JSON response indicating success
            return response()->json(['message' => 'monthly Income Updated successfully'], Response::HTTP_OK);
        } catch (\Exception $e) {
            // return JSON response indicating error
            return response()->json(['message' => 'Error updating monthly income: ' . $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    public function assets()
    {
        $user = auth()->user();
        $assets = Asset::where('user_id', $user->id)->where('status', 1)->get();
       
        if ($assets->isEmpty()) {
            return view('client.finance.add-assets', ['user' => $user, 'assets' => $assets]);
        } else {
            return view('client.finance.assets', ['assets' => $assets]);
        }
    }
    

    public function storeAssets(Request $request)
    {
        try {
            // validate request data
            $request->validate([
                'assets.*.description' => 'nullable|string|max:255',
                'assets.*.serial' => 'nullable|string|max:255',
                'assets.*.value' => 'nullable|numeric|min:0',
                'assets.*.assetPicture' => 'nullable|file|mimes:jpg,jpeg,png,bmp|max:2048', // Validate assetPicture if exists
            ]);

            foreach ($request->assets as $assetData) {
                $assetData['user_id'] = auth()->user()->id;
                $assetData['status'] = 1;

                if (isset($assetData['assetPicture'])) {
                    $file = $assetData['assetPicture'];
                    $assetData['assetPicture'] = $file->store('asset_pictures', 'public');
                }

                Asset::create($assetData);
            }

            // return JSON response indicating success
            return response()->json(['message' => 'Assets added successfully'], Response::HTTP_OK);
        } catch (\Exception $e) {
            // return JSON response indicating error
            return response()->json(['message' => 'Error adding Assets: ' . $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }



    public function updateAssets(Request $request)
    {
        try {
            // validate request data
            $request->validate([
                'assets.*.description' => 'nullable|string|max:255',
                'assets.*.serial' => 'nullable|string|max:255',
                'assets.*.value' => 'nullable|numeric|min:0',
                'assets.*.assetPicture' => 'nullable|file|mimes:jpg,jpeg,png,bmp|max:2048', // Validate assetPicture if exists
            ]);

            // Loop through each asset data in the request
            foreach ($request->assets as $assetData) {
                // Check if 'id' key exists in the array
                if (array_key_exists('id', $assetData) && !is_null($assetData['id'])) {
                    // Find the asset by its id
                    $asset = Asset::find($assetData['id']);

                    // Ensure the asset exists
                    if ($asset) {
                        // Check if assetPicture is present and handle file upload
                        if (isset($assetData['assetPicture'])) {
                            $file = $assetData['assetPicture'];
                            $assetData['assetPicture'] = $file->store('asset_pictures', 'public');
                        }

                        // Update the asset with new details
                        $asset->update([
                            'description' => $assetData['description'],
                            'serial' => $assetData['serial'],
                            'value' => $assetData['value'],
                            'assetPicture' => $assetData['assetPicture'] ?? $asset->assetPicture, // Retain existing picture if not updated
                        ]);
                    }
                } else {
                    // Create a new asset
                    $assetData['user_id'] = auth()->user()->id;
                    $assetData['status'] = 1;

                    // Handle file upload for new asset
                    if (isset($assetData['assetPicture'])) {
                        $file = $assetData['assetPicture'];
                        $assetData['assetPicture'] = $file->store('asset_pictures', 'public');
                    }

                    Asset::create($assetData);
                }
            }

            // return JSON response indicating success
            return response()->json(['message' => 'Assets updated successfully'], Response::HTTP_OK);
        } catch (\Exception $e) {
            // return JSON response indicating error
            return response()->json(['message' => 'Error updating assets: ' . $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
