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
                        <li class="breadcrumb-item active" aria-current="page">Monthly Income & Expenditure</li>
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
                    <a id="editMonthlyIncomeButton" class="btn btn-primary mb-3 mb-lg-0"><i class='bx bxs-plus-square'></i>Edit</a>
                </div>
                <hr />

                <form id="editMonthlyIncomeForm" method="POST" enctype="multipart/form-data" action="{{ route('client.updateMonthlyIncome', ['monthlyIncome' => $monthlyIncome->id]) }}">
                    @csrf
                    @method('PUT')
        
                    <div class="form-body mt-4">
                        <div class="border border-3 p-4 rounded">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h5 class="mb-2">Income</h5>
									<div class="mb-3">
										<label for="salary" class="form-label">Salary/wage</label>
										<input type="number" class="form-control" name="salary" id="salary" disabled value="{{ $monthlyIncome->salary }}">
									</div>

                                    <div class="mb-3">
										<label for="business_income" class="form-label">Income from business</label>
										<input type="number" class="form-control" name="business_income" id="business_income" disabled value="{{ $monthlyIncome->business_income }}">
									</div>

                                    <div class="mb-3">
										<label for="other_income" class="form-label">Other income</label>
										<input type="number" class="form-control" name="other_income" id="other_income" disabled value="{{ $monthlyIncome->other_income }}">
									</div>

                                    <div class="mb-3">
										<label for="total_income" class="form-label">Total income - A</label>
										<input type="number" class="form-control" name="total_income" id="total_income" disabled value="{{ $monthlyIncome->total_income }}" readonly>
									</div>
                                </div>
                               
                                <div class="col-lg-6">
                                    <h5 class="mb-2">Expenditure</h5>
                                    <div class="mb-3">
										<label for="rent" class="form-label">Rent</label>
										<input type="number" class="form-control" name="rent" id="rent" disabled value="{{ $monthlyIncome->rent }}">
									</div>

                                    <div class="mb-3">
										<label for="salaries_wages" class="form-label">Salaries/wages</label>
										<input type="number" class="form-control" name="salaries_wages" id="salaries_wages" disabled value="{{ $monthlyIncome->salaries_wages }}">
									</div>

                                    <div class="mb-3">
										<label for="other_expenses" class="form-label">Other expenses</label>
										<input type="number" class="form-control" name="other_expenses" id="other_expenses" disabled value="{{ $monthlyIncome->other_expenses }}">
									</div>

                                    <div class="mb-3">
										<label for="total_expenses" class="form-label">Total expenses - B</label>
										<input type="number" class="form-control" name="total_expenses" id="total_expenses" disabled value="{{ $monthlyIncome->total_expenses }}" readonly>
									</div>
                                </div>

                                <div class="col-lg-12">
									<div class="mb-3">
                                        <label for="net_income">Net Income (A-B)</label>
                                        <input type="number" class="form-control" id="net_income" name="net_income" disabled value="{{ $monthlyIncome->net_income }}" readonly>
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
		<script src="{{ asset('assets/js/monthlyIncome.js') }}" ></script>
        <script>
            $(document).ready(function() {
                $('#editMonthlyIncomeButton').on('click', function() {
                    // Enable all input, select, and textarea elements
                    $('#editMonthlyIncomeForm input, #editMonthlyIncomeForm select, #editMonthlyIncomeForm textarea').prop('disabled', false);
        
                    // Show the hidden save button
                    $('#editMonthlyIncomeForm button[type="submit"]').closest('.col-2').removeAttr('hidden');
                });
            });
        </script>

        <script>
            $(document).ready(function() {
                function calculateTotals() {
                    // Income calculations
                    let salary = parseFloat($('#salary').val()) || 0;
                    let businessIncome = parseFloat($('#business_income').val()) || 0;
                    let otherIncome = parseFloat($('#other_income').val()) || 0;
                    let totalIncome = salary + businessIncome + otherIncome;
                    $('#total_income').val(totalIncome);
            
                    // Expenditure calculations
                    let rent = parseFloat($('#rent').val()) || 0;
                    let salariesWages = parseFloat($('#salaries_wages').val()) || 0;
                    let otherExpenses = parseFloat($('#other_expenses').val()) || 0;
                    let totalExpenses = rent + salariesWages + otherExpenses;
                    $('#total_expenses').val(totalExpenses);
            
                    // Net Income calculation
                    let netIncome = totalIncome - totalExpenses;
                    $('#net_income').val(netIncome);
                }

                $('input').on('input', function() {
                    calculateTotals();
                });
            });
        </script>

       
	@endpush
</x-client-layout>
