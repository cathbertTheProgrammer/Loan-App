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
                        <li class="breadcrumb-item active" aria-current="page">Loan Request</li>
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
                <h5 class="card-title">Request A Loan</h5>
                <hr />

				<form id="addLoanForm" method="POST" enctype="multipart/form-data" action="{{ route('client.storeLoan') }}">
					@csrf
					@method('POST')
					
					<div class="form-body mt-4">
						<div class="row">
							<div class="">
								<div class="border border-3 p-4 rounded">

                                    <div class="mb-3">
                                        <label for="loan_type" class="form-label">Loan Application Type</label>
                                        <select class="form-select" name="loan_type" id="loan_type">
                                            <option>Select the loan type</option>
                                            <option value="payslip_related">Payslips Related</option>
                                            <option value="business_related">Sales record or Business Related</option>
                                            <option value="collateral_related">Collateral Related</option>
                                        </select>
                                    </div>

                                    <div id="pay_slip" style="display: none;">
                                        <div class="mb-3 mt-2 form-control">
                                            <label for="pay_slips" class="form-label">Pay slips (3 months) for salary related applicants</label>
                                            <input name="pay_slips" id="pay_slips" type="file">
                                        </div>
                                    </div>

                                    <div id="sales_record"_record style="display: none;">
                                        <div class="mb-3 mt-2 form-control">
                                            <label for="sales_records" class="form-label">Sales Record for business related applicants</label>
                                            <input name="sales_records" id="sales_records" type="file">
                                        </div>
                                    </div>

                                    <div id="collaterals" style="display: none;">
                                        <label for="asset_id" class="form-label">Select Collateral</label>
                                        <select class="form-select" id="asset_id" name="asset_id[]" multiple>
                                            @foreach ($assets as $asset)
                                                <option value="{{ $asset->id }}">{{ $asset->description }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3 mt-2 form-control">
                                        <label for="bank_statements" class="form-label">Bank Statements (3 months)</label>
                                        <input name="bank_statements" id="bank_statements" type="file">
                                    </div>

                                    <div class="mb-3">
                                        <label for="amount" class="form-label">Amount</label>
                                        <input type="number" class="form-control" name="amount" id="amount" >
                                    </div>
                              
                                    <div class="mb-3">
                                        <label for="amount_in_words" class="form-label">Amount In Words</label>
                                        <input type="text" class="form-control" name="amount_in_words" id="amount_in_words"   placeholder="Enter amount in words">
                                    </div>
                            
                                    <div class="mb-3">
                                        <label for="period" class="form-label">Period in Months</label>
                                        <input type="number" class="form-control" name="period" id="period"  placeholder="Enter Period in months (e.g 24 for 2 years)">
                                    </div>

									<div class="mb-3">
										<label for="address" class="form-label">Purpose of Loan</label>
										<textarea class="form-control" name="purpose" id="purpose" rows="2" placeholder="Enter a Loan purpose"></textarea>
									</div>

                                   
                                    <div class="">
                                        <button type="submit"  class="btn btn-primary" id="addLoanBtn">Submit</button>
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

        <script>
             $(document).ready(function() {
                $('#loan_type').change(function() {
                    var selectedType = $(this).val();
                    $('#pay_slip, #sales_record, #collaterals').hide();

                    if (selectedType === 'payslip_related') {
                        $('#pay_slip').show();
                    } else if (selectedType === 'business_related') {
                        $('#sales_record').show();
                    } else if (selectedType === 'collateral_related') {
                        $('#collaterals').show();
                    }
                });
             });
        </script>

		
		<script src="{{ asset('assets/js/loan.js') }}" ></script>
	@endpush
</x-client-layout>
