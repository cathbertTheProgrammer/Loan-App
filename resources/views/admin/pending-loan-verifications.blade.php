<x-admin-layout>
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">{{ auth()->user()->name }}</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('client.index') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Loan Verification</li>
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
                <h5 class="card-title">Loan Verification</h5>
                <hr />

                <div class="table-responsive">
                    <table class="table mb-0">
						<thead class="table-light">
							<tr>
								<th>Type</th>
								<th>Amount</th>		
								<th>Period</th>
								<th>Purpose</th>
                                <th>Status</th>
                                <th>Date</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
                            @foreach($pendingLoans as $loan)
							
								<tr>
									<td>
										<div class="d-flex align-items-center">
											<div>
												<input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
											</div>
											<div class="ms-2">
												<h6 class="mb-0 font-14">{{ $loan->loan_type  }}</h6>
											</div>
										</div>
									</td>
									<td>{{ $loan->amount   }}</td>
                                    <td>{{ $loan->period  }}</td>
                                    <td>{{ $loan->purpose  }} Months</td>

									@if ($loan->status == 'ACTIVE')
										<td><div class="badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3"><i class="bi bi-check-circle"></i>{{ $loan->status }}</div></td>
									@elseif ($loan->status == 'PENDING')
										<td><div class="badge rounded-pill text-info bg-light-info p-2 text-uppercase px-3"><i class="bi bi-arrow-clockwise"></i>{{ $loan->status }}</div></td>
									@elseif (in_array($loan->status, ['DISABLED', 'DELETED']))
										<td><div class="badge rounded-pill text-danger bg-light-danger p-2 text-uppercase px-3"><i class="bi bi-x-circle"></i>{{ $loan->status }}</div></td>
									@endif

									<td>{{ $loan->created_at }}</td>
									
                                    <td>
                                        <div class="d-flex order-actions">                                       
                                            <a href="{{ route('admin.pendingVerificationView',  ['loan' => $loan->id]) }}">
                                                <i class="bi bi-eye text-success"></i>
                                            </a>                                           
                                        </div>
                                    </td>
									
								</tr>
							@endforeach
							
						</tbody>
					</table>

				
            </div>
        </div>


    </div>



	@push('scripts')

      
	@endpush
</x-admin-layout>
