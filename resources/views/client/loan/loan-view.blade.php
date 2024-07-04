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
                        <li class="breadcrumb-item active" aria-current="page">Loan View</li>
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
                <h5 class="card-title">Loan View</h5>
                <hr />

				<form >
					@csrf
					@method('POST')
					
					<div class="form-body mt-4">
						<div class="row">
							<div class="">
								<div class="border border-3 p-4 rounded view-back">

                                    
                                        <div class="row view-font">
                                        
                                            <div class="col-lg-6 col-md-12 col-sm-12 form">
                                                <p><span class="form-label">Loan Type: </span> <span class='form-control'>  {{ $loan->loan_type }} </span></p>
                                            </div>

                                            <div class="col-lg-6 col-md-12 col-sm-12">
                                                <p><span class="form-label">Amount: </span>  </span> <span class='form-control'> K{{ $loan->amount }} </span></p>
                                            </div>

                                            <div class="col-lg-6 col-md-12 col-sm-12">
                                                <p><span class="form-label">Amount in Words: </span>  </span> <span class='form-control'>{{ $loan->amount_in_words }} </span></p>
                                            </div>

                                            <div class="col-lg-6 col-md-12 col-sm-12">
                                                <p><span class="form-label">Period: </span>  </span> <span class='form-control'>{{ $loan->period }} Months</span></p>
                                            </div>

                                            <div class="col-lg-6 col-md-12 col-sm-12">
                                                <p><span class="form-label">Purpose: </span>  </span> <span class='form-control'>{{ $loan->purpose }} </span></p>
                                            </div>

                                            <div class="col-lg-6 col-md-12 col-sm-12">
                                                <span class="form-label">Status: </span> 
                                                    <span class='form-control'>
                                                        @if ($loan->status == 'ACTIVE')
                                                       <div class="  text-success bg-light-success p-2 text-uppercase px-3"><i class="bi bi-check-circle"></i>{{ $loan->status }}</div>
                                                        @elseif ($loan->status == 'PENDING')
                                                           <div class="  text-info bg-light-info p-2 text-uppercase px-3"><i class="bi bi-arrow-clockwise"></i>{{ $loan->status }}</div>
                                                        @elseif (in_array($loan->status, ['DISABLED', 'DELETED']))
                                                           <div class="  text-danger bg-light-danger p-2 text-uppercase px-3"><i class="bi bi-x-circle"></i>{{ $loan->status }}</div>
                                                        @endif
                                                 </span>
                                               
                                            </div>

                                            @if($loan->loan_type === 'payslip_related')
                                                <div class="col-lg-6 col-md-12 col-sm-12">
                                                    <span class="form-label">Pay Slips: </span> 
                                                    <span class='form-control'>
                                                        <a href="{{ Storage::url($loan->pay_slips) }}" class="btn btn-primary" download>Download Pay Slips</a>
                                                    </span>
                                                </div>
                                            @endif

                                            @if($loan->loan_type === 'business_related')
                                                <div class="col-lg-6 col-md-12 col-sm-12">
                                                    <span class="form-label">Sales Records: </span> 
                                                    <span class='form-control'>
                                                        <a href="{{ Storage::url($loan->sales_records) }}" class="btn btn-primary" download>Download Sales Records</a>
                                                    </span>
                                                </div>
                                            @endif

                                            
                                            @if($loan->loan_type === 'collateral_related' && $loan->assets->count())
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                
                                                    <span class="form-label">Collateral Assets</span>
                                                    <span class='form-control'>
                                                        <div class="table-responsive">
                                                            <table class="table mb-0">
                                                                <thead class="table-light">
                                                                    <tr>
                                                                        <th>Asset#</th>
                                                                        <th>Description</th>
                                                                        <th>Value</th>			
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($loan->assets as $asset)
                                                                    
                                                                        <tr>
                                                                            <td>
                                                                                <div class="d-flex align-items-center">
                                                                                    <div>
                                                                                        <input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
                                                                                    </div>
                                                                                    <div class="ms-2">
                                                                                        <h6 class="mb-0 font-14">#{{ $asset->id }}</h6>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>{{ $asset->description }}</td>
                                                                            <td>K{{ $asset->value }}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                    
                                                                </tbody>
                                                            </table>
                                        
                                                        </div>
                                                    </span>
                                                    
                                                </div>
                                            @endif
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

	
	@endpush
</x-client-layout>
