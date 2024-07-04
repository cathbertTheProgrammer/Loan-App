<x-client-layout>
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">{{ auth()->user()->name }}</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('client.index') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Bank Details</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary">Settings</button>
                    <button type="button"
                        class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                        data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                            href="javascript:;">Action</a>
                        <a class="dropdown-item" href="javascript:;">Another action</a>
                        <a class="dropdown-item" href="javascript:;">Something else here</a>
                        <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated
                            link</a>
                    </div>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body p-4">
                <div class="col-lg-3 col-xl-2">
                    <a id="editBankDetailsButton" class="btn btn-primary mb-3 mb-lg-0"><i class='bx bxs-plus-square'></i>Edit</a>
                </div>
                <hr />

                <form id="editBankDetailsForm" method="POST" enctype="multipart/form-data" action="{{ route('client.updateBankDetails', ['bankdetail' => $bankdetail->id]) }}">
                    @csrf
                    @method('PUT')
        
                    <div class="form-body mt-4">
                        <div class="border border-3 p-4 rounded">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="bank_name" class="form-label">Name of Bank</label>
                                        <input type="text" disabled value="{{ $bankdetail->bank_name }}" class="form-control" name="bank_name" id="bank_name">
                                    </div>
                                </div>
        
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="branch" class="form-label">Branch</label>
                                        <input type="text" disabled value="{{ $bankdetail->branch }}" class="form-control" name="branch" id="branch" placeholder="Enter phone number">
                                    </div>
                                </div>
        
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="account_name" class="form-label">Account Name</label>
                                        <input type="text" disabled class="form-control" name="account_name" value="{{ $bankdetail->account_name }}" id="account_name" placeholder="111111/11/1" maxlength="11" oninput="formatNRC(this)">
                                    </div>
                                </div>
        
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="account_duration" class="form-label">Duration of Account with Bank</label>
                                        <input type="text" disabled value="{{ $bankdetail->account_duration }}" class="form-control" name="account_duration" id="account_duration">
                                    </div>
                                </div>
        
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="active_loan" class="form-label">Do you have a Loan with any organization?</label>
                                        <div>
                                            <input disabled type="radio" id="loan_yes" name="active_loan" value="1" {{ $bankdetail->active_loan == '1' ? 'checked' : '' }}>
                                            <label for="loan_yes">Yes</label>
                                        </div>
                                        <div>
                                            <input disabled type="radio" id="loan_no" name="active_loan" value="0" {{ $bankdetail->active_loan == '0' ? 'checked' : '' }}>
                                            <label for="loan_no">No</label>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="col-lg-12" id="loanDetails" style="display: none;">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="organisation_name" class="form-label">State name of organization/institution</label>
                                                <input type="text" disabled value="{{ $bankdetail->organisation_name }}" class="form-control" name="organisation_name" id="organisation_name">
                                            </div>
                                        </div>
            
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="organisation_address" class="form-label">State the address of organization/institution</label>
                                                <textarea class="form-control" disabled name="organisation_address" id="organisation_address" rows="2" placeholder="Enter address">{{ $bankdetail->organisation_address }}</textarea>
                                            </div>
                                        </div>
            
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="total_debt" class="form-label">Please state your total indebtedness (how much you owe?)</label>
                                                <input type="text" disabled value="{{ $bankdetail->total_debt }}" class="form-control" name="total_debt" id="total_debt">
                                            </div>
                                        </div>
            
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="remaining_years" class="form-label">How many months/Years are remaining</label>
                                                <input type="text" disabled value="{{ $bankdetail->remaining_years }}" class="form-control" name="remaining_years" id="remaining_years">
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
                                <div hidden class="col-2">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary" id="editBankeDetailsBtn">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>



	@push('scripts')
		<script src="{{ asset('assets/js/bankDetails.js') }}" ></script>
        <script>
            $(document).ready(function() {
                $('#editBankDetailsButton').on('click', function() {
                    // Enable all input, select, and textarea elements
                    $('#editBankDetailsForm input, #editBankDetailsForm select, #editBankDetailsForm textarea').prop('disabled', false);
        
                    // Show the hidden save button
                    $('#editBankDetailsForm button[type="submit"]').closest('.col-2').removeAttr('hidden');
                });
            });
        </script>

        <script>
            function toggleLoanDetails(show) {
                if (show) {
                    $('#loanDetails').show();
                } else {
                    $('#loanDetails').hide();
                }
            }

            $(document).ready(function() {
                const loanYesRadio = $('#loan_yes');
                const loanNoRadio = $('#loan_no');
                
                // Initialize the display state based on the initial radio button selection
                toggleLoanDetails(loanYesRadio.is(':checked'));

                // Add change event listeners to the radio buttons
                loanYesRadio.on('change', function() {
                    toggleLoanDetails(true);
                });

                loanNoRadio.on('change', function() {
                    toggleLoanDetails(false);
                });
            });
        </script>
	@endpush
</x-client-layout>
