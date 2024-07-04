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
                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
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
                <h5 class="card-title">Add Guarantor</h5>
                <hr />

				<form id="addGuarantorForm" method="POST" enctype="multipart/form-data" action="{{ route('client.storeGuarantor') }}">
					@csrf
					@method('POST')
					
					<div class="form-body mt-4">
						
						<div class="border border-3 p-4 rounded">
                            <div class="row">

                                <div class="col-lg-6">
									<div class="mb-3">
										<label for="guarantorFullname" class="form-label">Name of Guarantor</label>
										<input type="text" class="form-control" name="guarantorFullname" id="guarantorFullname" >
									</div>
                                </div>
                               
                                <div class="col-lg-6">
                                    <div class="mb-3">
										<label for="guarantorPhoneNumber" class="form-label"> Guarantor Phone Number</label>
										<input type="text" class="form-control" name="guarantorPhoneNumber" id="guarantorPhoneNumber"  maxlength="10" placeholder="Enter phone number">
									</div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="guarantorNrc" class="form-label">Guarantor NRC</label>
                                        <input type="text" class="form-control" name="guarantorNrc" id="guarantorNrc" placeholder="111111/11/1" maxlength="11" oninput="formatNRC(this)">
                                    </div>
                                </div>

                                <div class="col-lg-6">
									<div class="mb-3">
										<label for="refereeFullname" class="form-label">Name of Referee  (If applicable)</label>
										<input type="text" class="form-control" name="refereeFullname" id="fullname" >
									</div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
										<label for="refereePhoneNumber" class="form-label">Referee Phone Number</label>
										<input type="text" class="form-control" name="refereePhoneNumber" id="phoneNumber"  maxlength="10" placeholder="Enter phone number">
									</div>
                                </div>

                                <div class="col-lg-6">
									<div class="mb-3">
										<label for="refereePosition" class="form-label">Referee Position</label>
										<input type="text" class="form-control" name="refereePosition" id="fullname" >
									</div>
                                </div>

                                <div class="col-2">
                                    <div class="d-grid">
                                        <button type="submit"  class="btn btn-primary" id="addGurantorBtn">Save</button>
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
            function formatNRC(input) {
				let value = input.value.replace(/\D/g, ''); // Remove all non-digit characters
				if (value.length > 6) value = value.slice(0, 6) + '/' + value.slice(6);
				if (value.length > 9) value = value.slice(0, 9) + '/' + value.slice(9);
				input.value = value.slice(0, 11); // Limit to 11 characters (6 digits + 2 slashes + 3 digits)
			}
			
			document.getElementById('addGuarantorForm').addEventListener('submit', function(e) {
				let nrcInput = document.getElementById('nrc');
				nrcInput.value = nrcInput.value.replace(/\D/g, ''); // Remove all non-digit characters before submission
			});
        </script>
	@endpush
</x-client-layout>
