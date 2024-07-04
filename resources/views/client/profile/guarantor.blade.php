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
                        <li class="breadcrumb-item active" aria-current="page">GUARANTOR/REFEREE</li>
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
                    <a id="editGuarantorButton" class="btn btn-primary mb-3 mb-lg-0"><i class='bx bxs-plus-square'></i>Edit</a>
                </div>
                <hr />

				<form id="editGuarantorForm" method="POST" enctype="multipart/form-data" action="{{ route('client.updateGuarantor',  ['guarantor' => $guarantor->id]) }}">
					@csrf
					@method('PUT')
					
					<div class="form-body mt-4">
						
						<div class="border border-3 p-4 rounded">
                            <div class="row">
                                <div class="col-lg-6">
									<div class="mb-3">
										<label for="guarantorFullname" class="form-label">Name of Guarantor</label>
										<input type="text" disabled value="{{ $guarantor->guarantorFullname }}" class="form-control" name="guarantorFullname" id="guarantorFullname" >
									</div>
                                </div>
                               
                                <div class="col-lg-6">
                                    <div class="mb-3">
										<label for="guarantorPhoneNumber" class="form-label"> Guarantor Phone Number</label>
										<input type="text" disabled  value="{{ $guarantor->guarantorPhoneNumber }}" class="form-control" name="guarantorPhoneNumber" id="guarantorPhoneNumber" placeholder="Enter phone number">
									</div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="guarantorNrc" class="form-label">Guarantor NRC</label>
                                        <input type="text" disabled class="form-control" name="guarantorNrc" value="{{ $guarantor->guarantorNrc }}" id="guarantorNrc" placeholder="111111/11/1" maxlength="11" oninput="formatNRC(this)">
                                    </div>
                                </div>

                                <div class="col-lg-6">
									<div class="mb-3">
										<label for="refereeFullname" class="form-label">Name of Referee  (If applicable)</label>
										<input type="text" disabled value="{{ $guarantor->refereeFullname }}" class="form-control" name="refereeFullname" id="fullname" >
									</div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
										<label for="refereePhoneNumber" class="form-label">Referee Phone Number</label>
										<input type="text" disabled  value="{{ $guarantor->refereePhoneNumber }}" class="form-control" name="refereePhoneNumber" id="phoneNumber" placeholder="Enter phone number">
									</div>
                                </div>

                                <div class="col-lg-6">
									<div class="mb-3">
										<label for="refereePosition" class="form-label">Referee Position</label>
										<input type="text" disabled value="{{ $guarantor->refereePosition }}" class="form-control" name="refereePosition" id="fullname" >
									</div>
                                </div>

                               
                                 <div hidden class="col-2">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary" id="editGuarantorBtn">Save</button>
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
		<script src="{{ asset('assets/js/guarantor.js') }}" ></script>
        <script>
             document.getElementById('editGuarantorButton').addEventListener('click', function() {
                // Enable all input, select, and textarea elements
                document.querySelectorAll('#editGuarantorForm input, #editGuarantorForm select, #editGuarantorForm textarea').forEach(function(element) {
                    element.disabled = false;
                })

                // Show the hidden save button
                document.querySelector('#editGuarantorForm button[type="submit"]').parentElement.parentElement.hidden = false;
            });
        </script>
	@endpush
</x-client-layout>
