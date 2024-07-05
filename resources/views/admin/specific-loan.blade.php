<x-admin-layout>
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">{{ auth()->user()->name }}</div>
            <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary">Settings</button>
                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">
                        <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="javascript:;">Action</a>
                        <a class="dropdown-item" href="javascript:;">Another action</a>
                        <a class="dropdown-item" href="javascript:;">Something else here</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="javascript:;">Separated link</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Specific Loan</h5>
                <hr />

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="loan-tab" data-bs-toggle="tab" data-bs-target="#loanProfile" type="button" role="tab" aria-controls="loanProfile" aria-selected="true">Loan Profile</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="clientProfile-tab" data-bs-toggle="tab" data-bs-target="#clientProfile" type="button" role="tab" aria-controls="clientProfile" aria-selected="false">Client Profile</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="nextOfKin-tab" data-bs-toggle="tab" data-bs-target="#nextOfKin" type="button" role="tab" aria-controls="nextOfKin" aria-selected="false">Next of Kin</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="guarantor-tab" data-bs-toggle="tab" data-bs-target="#guarantor" type="button" role="tab" aria-controls="guarantor" aria-selected="false">Guarantor</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="bankdetails-tab" data-bs-toggle="tab" data-bs-target="#bankdetails" type="button" role="tab" aria-controls="bankdetails" aria-selected="false">Bank Details</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="monthlyIncome-tab" data-bs-toggle="tab" data-bs-target="#monthlyIncome" type="button" role="tab" aria-controls="monthlyIncome" aria-selected="false">Monthly Income</button>
                    </li>

                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="loanProfile" role="tabpanel" aria-labelledby="loanProfile-tab">
                        <x-loan-details :loan="$loan" /> 
                    </div>
                    <div class="tab-pane fade" id="clientProfile" role="tabpanel" aria-labelledby="clientProfile-tab">
                        <x-client-profile :profile="$clientProfile" /> 
                    </div>
                    <div class="tab-pane fade" id="nextOfKin" role="tabpanel" aria-labelledby="nextOfKin-tab">
                        <x-next-of-kin :nextOfKin="$nextOfKin" /> 
                    </div>
                    <div class="tab-pane fade" id="guarantor" role="tabpanel" aria-labelledby="guarantor-tab">
                        <x-guarantor :guarantor="$guarantor" /> 
                    </div>
                    <div class="tab-pane fade" id="bankdetails" role="tabpanel" aria-labelledby="bankdetails-tab">
                        <x-bank-details :bankdetail="$bankdetails" /> 
                    </div>
                    <div class="tab-pane fade" id="monthlyIncome" role="tabpanel" aria-labelledby="monthlyIncome-tab">
                        <x-monthly-income :monthlyIncome="$monthlyIncome" /> 
                    </div>
                 
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>
