<?php

namespace App\Http\Controllers;

use App\Models\Guarantor;
use App\Models\Loan;
use App\Models\NextOfKin;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function index(){
        $user = auth()->user();
    
        $totalLoans = Loan::where('user_id', $user->id)->count();
        $activeLoans = Loan::where('user_id', $user->id)->where('status', 'ACTIVE')->count();
        $pendingLoans = Loan::where('user_id', $user->id)->where('status', 'PENDING')->count();
        $totalCredit = Loan::where('user_id', $user->id)->where('status', 'ACTIVE')->sum('amount');
        $rejectedLoans = Loan::where('user_id', $user->id)->where('status', 'REJECTED')->count();
        $paidLoans = Loan::where('user_id', $user->id)->where('status', 'PAID')->count();
        $totalRequested = Loan::where('user_id', $user->id)->sum('amount');
        // Get loans count per month for the current year
        $monthlyLoans = Loan::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
        ->where('user_id', $user->id)
        ->whereYear('created_at', Carbon::now()->year)
        ->groupBy('month')
        ->pluck('count', 'month')
        ->toArray();

        // Prepare data for Chart.js
        $monthlyLoanData = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthlyLoanData[] = $monthlyLoans[$i] ?? 0;
        }
    
        return view('client.index', compact(
            'totalLoans', 'activeLoans', 'pendingLoans', 'totalCredit', 'rejectedLoans', 'paidLoans', 'monthlyLoanData', 'totalRequested'
        ));
    }
    


    public function profile(){
        $user = auth()->user();
        $profile = UserDetail::where('user_id', $user->id)->where('status', 1)->first();

        if (is_null($profile)) {
            return view('client.profile.add-new-profile', ['user' => $user, 'profile' => $profile]);
        } else {
            return view('client.profile.profile', ['profile' => $profile]);
        }
    }
    
    // Store Method
    public function store(Request $request)
    {
        try {
            $request->validate([
                'phoneNumber' => 'required|numeric|unique:user_details,phoneNumber',
                'profilePicture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'nrc' => 'nullable|integer|unique:user_details,nrc',
                'nrcFrontImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'nrcBackImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'gender' => 'nullable|string',
                'address' => 'nullable|string',
                'dateOfBirth' => 'nullable|date',
                'district' => 'nullable|string',
                'maritalStatus' => 'nullable|string',
                'numberOfDependants' => 'nullable|string',
                'yearsInEmployment' => 'nullable|string',
                'nameOfEmployer' => 'nullable|string'
            ]);

            $user_data = $request->only([
                'phoneNumber', 'gender', 'address', 'dateOfBirth', 'district',
                'maritalStatus', 'numberOfDependants', 'yearsInEmployment', 'nameOfEmployer'
            ]);

            if ($request->hasFile('profilePicture')) {
                $user_data['profilePicture'] = $request->file('profilePicture')->store('profile_pictures', 'public');
            }

            if ($request->hasFile('nrcFrontImage')) {
                $user_data['nrcFrontImage'] = $request->file('nrcFrontImage')->store('nrc_images', 'public');
            }

            if ($request->hasFile('nrcBackImage')) {
                $user_data['nrcBackImage'] = $request->file('nrcBackImage')->store('nrc_images', 'public');
            }

            if ($request->has('nrc')) {
                $user_data['nrc'] = $request->nrc;
            }

            $user_data['user_id'] = auth()->user()->id;

            $user_data['status'] = 1;

            UserDetail::create($user_data);

            return response()->json(['message' => 'User detail added successfully'], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error adding user detail: ' . $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }



    public function edit( UserDetail $userDetail)
    {
        return view('admin.ecommerce.edit-profile-detail', ['userDetail'=>$userDetail]);
    }


    // Update Method
    public function update(Request $request, UserDetail $userDetail)
    {
        // dd($userDetail);
        try {
            $request->validate([
                'profilePicture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'nrcFrontImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'nrcBackImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'gender' => 'nullable|string',
                'address' => 'nullable|string',
                'dateOfBirth' => 'nullable|date',
                'district' => 'nullable|string',
                'maritalStatus' => 'nullable|string',
                'numberOfDependants' => 'nullable|string',
                'yearsInEmployment' => 'nullable|string',
                'nameOfEmployer' => 'nullable|string'
            ]);

            $profile_form_data_update = [
                'nrc' => $request->nrc,
                'phoneNumber' => $request->phoneNumber,
                'gender' => $request->gender,
                'address' => $request->address,
                'dateOfBirth' => $request->dateOfBirth,
                'district' => $request->district,
                'maritalStatus' => $request->maritalStatus,
                'numberOfDependants' => $request->numberOfDependants,
                'yearsInEmployment' => $request->yearsInEmployment,
                'nameOfEmployer' => $request->nameOfEmployer
            ];
            


            if ($request->hasFile('profilePicture')) {
                if ($userDetail->profilePicture) {
                    Storage::disk('public')->delete($userDetail->profilePicture);
                }
                $profile_form_data_update['profilePicture'] = $request->file('profilePicture')->store('profile_pictures', 'public');
            }

            if ($request->hasFile('nrcFrontImage')) {
                if ($userDetail->nrcFrontImage) {
                    Storage::disk('public')->delete($userDetail->nrcFrontImage);
                }
                $profile_form_data_update['nrcFrontImage'] = $request->file('nrcFrontImage')->store('nrc_images', 'public');
            }

            if ($request->hasFile('nrcBackImage')) {
                if ($userDetail->nrcBackImage) {
                    Storage::disk('public')->delete($userDetail->nrcBackImage);
                }
                $profile_form_data_update['nrcBackImage'] = $request->file('nrcBackImage')->store('nrc_images', 'public');
            }

           

            $userDetail->update($profile_form_data_update);

            return view('client.profile.profile', ['profile' => $userDetail]); 

        } catch (\Exception $e) {
            return response()->json(['message' => 'Error updating user detail: ' . $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function nextOfKin(){
        $user = auth()->user();
        $nextOfKin = NextOfKin::where('user_id', $user->id)->where('status', 1)->first();

        if (is_null($nextOfKin)) {
            return view('client.profile.add-nextofkin', ['user' => $user, 'nextOfKin' => $nextOfKin]);
        } else {
            return view('client.profile.nextofkin', ['nextOfKin' => $nextOfKin]);
        }
    }


    public function storeNextOfKin(Request $request)
    {
        try {
            // validate request data
            $request->validate([
                'fullname' => 'nullable|string',
                'relationship' => 'nullable|string',
                'phoneNumber' => 'nullable|string',
                'homeAddress' => 'nullable|string',
                'nameOfEmployer' => 'nullable|string',
                'employerAddress' => 'nullable|string',
                'telNo' => 'nullable|string',
            ]);
    
            // create new brand
            $nextOfKin_form_data_create = [
                'fullname' => $request->fullname,
                'relationship' => $request->relationship,
                'phoneNumber' => $request->phoneNumber,
                'homeAddress' => $request->homeAddress,
                'nameOfEmployer' => $request->nameOfEmployer,
                'employerAddress' => $request->employerAddress,
                'telNo' => $request->telNo,
            ];

            $nextOfKin_form_data_create['user_id'] = auth()->user()->id;
            $nextOfKin_form_data_create['status'] = 1;

            NextOfKin::create($nextOfKin_form_data_create);
    
            // return JSON response indicating success
            return response()->json(['message' => 'Next Of Kin Added Successfully'], Response::HTTP_OK);
        } catch (\Exception $e) {
            // return JSON response indicating error
            return response()->json(['message' => 'Error adding Next Of Kin Added: ' . $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    

    public function updateNextOfKin(Request $request, nextOfKin $nextOfKin)
    {
        try {
            // validate request data
            $nextOfKin_update_details = $request->validate([
                'fullname' => 'nullable|string',
                'relationship' => 'nullable|string',
                'phoneNumber' => 'nullable|string',
                'homeAddress' => 'nullable|string',
                'nameOfEmployer' => 'nullable|string',
                'employerAddress' => 'nullable|string',
                'telNo' => 'nullable|string',
            ]);

            // update brand
            $nextOfKin->update($nextOfKin_update_details);

            // return JSON response indicating success
            return response()->json(['message' => 'Next Of Kin Updated successfully'], Response::HTTP_OK);
        } catch (\Exception $e) {
            // return JSON response indicating error
            return response()->json(['message' => 'Error updating next of kin: ' . $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    public function guarantor(){
        $user = auth()->user();
        $gurantor = Guarantor::where('user_id', $user->id)->where('status', 1)->first();

        if (is_null($gurantor)) {
            return view('client.profile.add-guarantor', ['user' => $user, 'guarantor' => $gurantor]);
        } else {
            return view('client.profile.guarantor', ['guarantor' => $gurantor]);
        }
    }


    public function storeGuarantor(Request $request)
    {
        try {
            // validate request data
            $request->validate([
                'guarantorFullname' => 'nullable|string',
                'guarantorPhoneNumber' => 'nullable|string',
                'guarantorNrc' => 'nullable|string',
                'refereeFullname' => 'nullable|string',
                'refereePhoneNumber' => 'nullable|string',
                'refereePosition' => 'nullable|string',
            ]);
    
            // create new brand
            $guarantor_form_data_create = [
                'guarantorFullname' => $request->guarantorFullname,
                'guarantorPhoneNumber' => $request->guarantorPhoneNumber,
                'guarantorNrc' => $request->guarantorNrc,
                'refereeFullname' => $request->refereeFullname,
                'refereePhoneNumber' => $request->refereePhoneNumber,
                'refereePosition' => $request->refereePosition
            ];

            $guarantor_form_data_create['user_id'] = auth()->user()->id;
            $guarantor_form_data_create['status'] = 1;

            Guarantor::create($guarantor_form_data_create);
    
            // return JSON response indicating success
            return response()->json(['message' => 'Guarantor Added Successfully'], Response::HTTP_OK);
        } catch (\Exception $e) {
            // return JSON response indicating error
            return response()->json(['message' => 'Error adding Guarantor Added: ' . $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    

    public function updateGuarantor(Request $request, Guarantor $guarantor)
    {
        try {
            // validate request data
            $guarantor_update_details = $request->validate([
                'guarantorFullname' => 'nullable|string',
                'guarantorPhoneNumber' => 'nullable|string',
                'guarantorNrc' => 'nullable|string',
                'refereeFullname' => 'nullable|string',
                'refereePhoneNumber' => 'nullable|string',
                'refereePosition' => 'nullable|string',
            ]);

            // update brand
            $guarantor->update($guarantor_update_details);

            // return JSON response indicating success
            return response()->json(['message' => 'Guarantor Updated successfully'], Response::HTTP_OK);
        } catch (\Exception $e) {
            // return JSON response indicating error
            return response()->json(['message' => 'Error updating Guarantor: ' . $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    
}
