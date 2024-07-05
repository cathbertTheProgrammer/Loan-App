<?php

namespace App\Http\Controllers;

use App\Models\BankDetail;
use App\Models\Guarantor;
use App\Models\Loan;
use App\Models\User;
use App\Models\LoanStatuses;
use App\Models\MonthlyIncome;
use App\Models\NextOfKin;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class AdminController extends Controller
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

    public function index()
    {
        $totalCredit = Loan::whereIn('status', ['ACTIVE', 'PAID'])->sum('amount');
        $allPendingLoans =  Loan::whereIn('status', ['PENDING', 'VERIFIED', 'RECOMMENDED'])->sum('amount');
        $activeLoans = Loan::where('status', 'ACTIVE')->count();
        $paidLoans = Loan::where('status', 'PAID')->count();
        $pendingLoans = Loan::where('status', 'PENDING')->count();
        $verifiedLoans = Loan::where('status', 'VERIFIED')->count();
        $recommendedLoans = Loan::whereIn('status', ['RECOMMENDED'])->count();
        $rejectedLoans = Loan::where('status', 'REJECTED')->count();
        $totalClients = UserDetail::where('status', 1)->count();
        $collateral_loans = Loan::where('loan_type', 'collateral_related')->count();
        $payslips_loans = Loan::where('loan_type', 'payslip_related')->count();
        $business_loans = Loan::where('loan_type', 'business_related')->count();

        // Get the current date and the date one month ago
        $endDate = Carbon::now();
        $startDate = Carbon::now()->subMonth();

        // Query for the top 5 most recent loans created within the last month
        $recentLoans = Loan::whereBetween('created_at', [$startDate, $endDate])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();


        // Data for chart 1 (Monthly loan amounts)
        $monthlyUsers = User::selectRaw('MONTH(created_at) as month, SUM(id) as total')
            ->where('is_admin', 0)
            ->groupBy('month')
            ->pluck('total', 'month')->toArray();
        $monthlyUsersData = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthlyUsersData[] = $monthlyUsers[$i] ?? 0;
        }

        // Data for chart 2 (Trending loan categories)
        $trendingLoans = Loan::selectRaw('loan_type, COUNT(*) as count')
            ->groupBy('loan_type')
            ->pluck('count', 'loan_type')->toArray();


        // Fetch monthly revenue data
        $monthlyRevenue = Loan::selectRaw('MONTH(created_at) as month, SUM(amount) as total')
            ->whereIn('status', ['ACTIVE', 'PAID', 'APPROVED'])
            ->groupBy('month')
            ->pluck('total', 'month')->toArray();
        $monthlyRevenueData = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthlyRevenueData[] = $monthlyRevenue[$i] ?? 0;
        }

        // Data for chart 4 (Loan summary)
        $loanSummary = Loan::selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status')->toArray();
        // Initialize loanSummaryData with zeros
        $loanSummaryData = [
            'Paid' => 0,
            'Pending' => 0,
            'Rejected' => 0,
            'Active' => 0,
        ];

        // Aggregate the counts for each status
        foreach ($loanSummary as $status => $count) {
            if ($status === 'PAID') {
                $loanSummaryData['Paid'] += $count;
            } elseif (in_array($status, ['PENDING', 'RECOMMENDED', 'VERIFIED', 'APPROVED'])) {
                $loanSummaryData['Pending'] += $count;
            } elseif ($status === 'REJECTED') {
                $loanSummaryData['Rejected'] += $count;
            } elseif ($status === 'ACTIVE') {
                $loanSummaryData['Active'] += $count;
            }
        }

        return view('admin.index', compact(
            'totalCredit',
            'activeLoans',
            'pendingLoans',
            'rejectedLoans',
            'recentLoans',
            'allPendingLoans',
            'monthlyUsersData',
            'trendingLoans',
            'monthlyRevenueData',
            'loanSummaryData',
            'collateral_loans',
            'verifiedLoans',
            'recommendedLoans',
            'totalClients',
            'business_loans',
            'payslips_loans',
            'paidLoans'
        ));
    }
    
    public function activeLoans()
    {
        $activeLoans = Loan::where('status', 'ACTIVE')->get();
        return view('admin.active-loans', compact('activeLoans'));
    }

    public function loanHistory()
    {
        $allLoans = Loan::all();
        return view('admin.loan-history', compact('allLoans'));
    }

    public function specificLoan(Loan $loan)
    {
        // $loan = Loan::with('assets')->find($loan->id);
        $clientProfile = UserDetail::where('user_id', $loan->user_id)->first();
        $nextOfKin = NextOfKin::where('user_id', $loan->user_id)->first();
        $guarantor = Guarantor::where('user_id', $loan->user_id)->first();
        $bankdetails = BankDetail::where('user_id', $loan->user_id)->first();
        $monthlyIncome = MonthlyIncome::where('user_id', $loan->user_id)->first();

        return view(
            'admin.specific-loan',
            compact('loan', 'clientProfile', 'nextOfKin', 'guarantor', 'bankdetails', 'monthlyIncome')
        );
    }


    public function pendingVerification()
    {
        $pendingLoans = Loan::where('status', 'PENDING')->get();
        return view('admin.pending-loan-verifications', compact('pendingLoans'));
    }

    public function pendingVerificationView(Loan $loan)
    {
        // $loan = Loan::with('assets')->find($loan->id);
        $clientProfile = UserDetail::where('user_id', $loan->user_id)->first();
        $nextOfKin = NextOfKin::where('user_id', $loan->user_id)->first();
        $guarantor = Guarantor::where('user_id', $loan->user_id)->first();
        $bankdetails = BankDetail::where('user_id', $loan->user_id)->first();
        $monthlyIncome = MonthlyIncome::where('user_id', $loan->user_id)->first();


        return view(
            'admin.verify-specific-loan',
            compact('loan', 'clientProfile', 'nextOfKin', 'guarantor', 'bankdetails', 'monthlyIncome')
        );
    }

    public function verificationStore(Request $request, Loan $loan)
    {
        try {
            // validate request data
            $request->validate([
                'status' => 'required|string',
                'comment' => 'required|string',
            ]);

            DB::transaction(function () use ($request, $loan) {
                // update loan statuses
                $statuses = LoanStatuses::where('loan_id', $loan->id)->first();

                $loan_statuses_update = [
                    'verification_status' => $request->status,
                    'verification_comment' => $request->input('comment', null),
                    'verified_by' => auth()->user()->id
                ];

                $loan_update_details = [
                    'status' => $request->status
                ];

                $loan->update($loan_update_details);
                $statuses->update($loan_statuses_update);
            });

            // return JSON response indicating success
            return response()->json(['message' => 'Loan verified successfully'], Response::HTTP_OK);
        } catch (\Exception $e) {
            // return JSON response indicating error
            return response()->json(['message' => 'Error verifying loan: ' . $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function pendingRecommendation()
    {
        $pendingLoans = Loan::where('status', 'VERIFIED')->get();
        return view('admin.pending-loan-recommendation', compact('pendingLoans'));
    }


    public function pendingRecommendationView(Loan $loan)
    {
        // $loan = Loan::with('assets')->find($loan->id);
        $clientProfile = UserDetail::where('user_id', $loan->user_id)->first();
        $nextOfKin = NextOfKin::where('user_id', $loan->user_id)->first();
        $guarantor = Guarantor::where('user_id', $loan->user_id)->first();
        $bankdetails = BankDetail::where('user_id', $loan->user_id)->first();
        $monthlyIncome = MonthlyIncome::where('user_id', $loan->user_id)->first();
        $loanStatuses = LoanStatuses::where('loan_id', $loan->id)->first();


        return view(
            'admin.recommended-specific-loan',
            compact('loan', 'clientProfile', 'nextOfKin', 'guarantor', 'bankdetails', 'monthlyIncome', 'loanStatuses')
        );
    }

    public function recommendationStore(Request $request, Loan $loan)
    {
        try {
            // validate request data
            $request->validate([
                'status' => 'required|string',
                'comment' => 'required|string',
            ]);

            DB::transaction(function () use ($request, $loan) {
                // update loan statuses
                $statuses = LoanStatuses::where('loan_id', $loan->id)->first();

                $loan_statuses_update = [
                    'recommendation_status' => $request->status,
                    'recommendation_comment' => $request->input('comment', null),
                    'recommended_by' => auth()->user()->id
                ];

                $loan_update_details = [
                    'status' => $request->status
                ];

                $loan->update($loan_update_details);
                $statuses->update($loan_statuses_update);
            });

            // return JSON response indicating success
            return response()->json(['message' => 'Loan recommended successfully'], Response::HTTP_OK);
        } catch (\Exception $e) {
            // return JSON response indicating error
            return response()->json(['message' => 'Error recommending a loan: ' . $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    public function pendingApproval()
    {
        $pendingLoans = Loan::where('status', 'RECOMMENDED')->get();
        return view('admin.pending-loan-approval', compact('pendingLoans'));
    }


    public function pendingApprovalView(Loan $loan)
    {
        // $loan = Loan::with('assets')->find($loan->id);
        $clientProfile = UserDetail::where('user_id', $loan->user_id)->first();
        $nextOfKin = NextOfKin::where('user_id', $loan->user_id)->first();
        $guarantor = Guarantor::where('user_id', $loan->user_id)->first();
        $bankdetails = BankDetail::where('user_id', $loan->user_id)->first();
        $monthlyIncome = MonthlyIncome::where('user_id', $loan->user_id)->first();
        $loanStatuses = LoanStatuses::where('loan_id', $loan->id)->first();


        return view(
            'admin.approve-specific-loan',
            compact('loan', 'clientProfile', 'nextOfKin', 'guarantor', 'bankdetails', 'monthlyIncome', 'loanStatuses')
        );
    }

    public function approveStore(Request $request, Loan $loan)
    {
        try {
            // validate request data
            $request->validate([
                'status' => 'required|string',
                'comment' => 'required|string',
            ]);

            DB::transaction(function () use ($request, $loan) {
                // update loan statuses
                $statuses = LoanStatuses::where('loan_id', $loan->id)->first();

                $loan_statuses_update = [
                    'approval_status' => $request->status,
                    'approval_comment' => $request->input('comment', null),
                    'approved_by' => auth()->user()->id
                ];

                $loan_update_details = [
                    'status' => $request->status
                ];

                $loan->update($loan_update_details);
                $statuses->update($loan_statuses_update);
            });

            // return JSON response indicating success
            return response()->json(['message' => 'Loan approved successfully'], Response::HTTP_OK);
        } catch (\Exception $e) {
            // return JSON response indicating error
            return response()->json(['message' => 'Error approving a loan: ' . $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function pendingPayment()
    {
        $pendingApprovedPayment = Loan::where('status', 'APPROVED')->get();
        return view('admin.pending-approved-loan-payment', compact('pendingApprovedPayment'));
    }


    public function pendingPaymentView(Loan $loan)
    {
        // $loan = Loan::with('assets')->find($loan->id);
        $clientProfile = UserDetail::where('user_id', $loan->user_id)->first();
        $nextOfKin = NextOfKin::where('user_id', $loan->user_id)->first();
        $guarantor = Guarantor::where('user_id', $loan->user_id)->first();
        $bankdetails = BankDetail::where('user_id', $loan->user_id)->first();
        $monthlyIncome = MonthlyIncome::where('user_id', $loan->user_id)->first();
        $loanStatuses = LoanStatuses::where('loan_id', $loan->id)->first();


        return view(
            'admin.payment-specific-loan',
            compact('loan', 'clientProfile', 'nextOfKin', 'guarantor', 'bankdetails', 'monthlyIncome', 'loanStatuses')
        );
    }

    public function paymentStore(Request $request, Loan $loan)
    {
        try {
            // validate request data
            $request->validate([
                'status' => 'required|string',
                'comment' => 'required|string',
            ]);

            DB::transaction(function () use ($request, $loan) {
                // update loan statuses
                $statuses = LoanStatuses::where('loan_id', $loan->id)->first();

                $loan_statuses_update = [
                    'approval_status' => $request->status,
                    'approval_comment' => $request->input('comment', null),
                    'approved_by' => auth()->user()->id
                ];

                $loan_update_details = [
                    'status' => $request->status
                ];

                $loan->update($loan_update_details);
                $statuses->update($loan_statuses_update);
            });

            // return JSON response indicating success
            return response()->json(['message' => 'Loan approved successfully'], Response::HTTP_OK);
        } catch (\Exception $e) {
            // return JSON response indicating error
            return response()->json(['message' => 'Error approving a loan: ' . $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}