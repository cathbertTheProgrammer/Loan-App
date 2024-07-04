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
                <h5 class="card-title">Add Profile</h5>
                <hr />

				<form id="addProfileForm" method="POST" enctype="multipart/form-data" action="{{ route('client.store') }}">
					@csrf
					@method('POST')
					
					<div class="form-body mt-4">
						<div class="row">
							<div class="col-lg-8">
								<div class="border border-3 p-4 rounded">
									<div class="mb-3">
										<label for="nrc" class="form-label">NRC</label>
										<input type="text" class="form-control" name="nrc" id="nrc" placeholder="111111/11/1" maxlength="11" oninput="formatNRC(this)">
									</div>
									<div class="mb-3">
										<label for="gender" class="form-label">Gender</label>
										<select class="form-select" name="gender" id="gender">
											<option></option>
											<option value="male">Male</option>
											<option value="female">Female</option>
											<option value="other">Other</option>
										</select>
									</div>

									<div class="mb-3">
										<label for="address" class="form-label">Address</label>
										<textarea class="form-control" name="address" id="address" rows="2" placeholder="Enter address"></textarea>
									</div>
									
									<div class="mb-3">
										<label for="phoneNumber" class="form-label">Phone Number</label>
										<input type="number" class="form-control" name="phoneNumber" id="phoneNumber" placeholder="Enter phone number">
									</div>
									<div class="mb-3">
										<label for="profilePicture" class="form-label">Profile Picture</label>
										<input name="profilePicture" id="profilePicture" type="file">
									</div>
									
									<div class="mb-3">
										<label for="nrcFrontImage" class="form-label">NRC Front Image</label>
										<input name="nrcFrontImage" id="nrcFrontImage" type="file">
									</div>
									<div class="mb-3">
										<label for="nrcBackImage" class="form-label">NRC Back Image</label>
										<input name="nrcBackImage" id="nrcBackImage" type="file">
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="border border-3 p-4 rounded">
									<div class="row g-3">
									
										<div class="mb-3">
											<label for="dateOfBirth" class="form-label">Date of Birth</label>
											<input type="date" class="form-control" name="dateOfBirth" id="dateOfBirth">
										</div>
										<div class="mb-3">
											<label for="district" class="form-label">District</label>
											<input type="text" class="form-control" name="district" id="district" placeholder="Enter district">
										</div>
										<div class="mb-3">
											<label for="maritalStatus" class="form-label">Marital Status</label>
											<select class="form-select" name="maritalStatus" id="maritalStatus">
												<option></option>
												<option value="single">Single</option>
												<option value="married">Married</option>
												<option value="divorced">Divorced</option>
												<option value="widowed">Widowed</option>
											</select>
										</div>
										<div class="mb-3">
											<label for="numberOfDependants" class="form-label">Number of Dependants</label>
											<input type="number" class="form-control" name="numberOfDependants" id="numberOfDependants" placeholder="Enter number of dependants">
										</div>
										<div class="mb-3">
											<label for="yearsInEmployment" class="form-label">Years in Employment</label>
											<input type="text" class="form-control" name="yearsInEmployment" id="yearsInEmployment" placeholder="Enter years in employment">
										</div>
										<div class="mb-3">
											<label for="nameOfEmployer" class="form-label">Name of Employer</label>
											<input type="text" class="form-control" name="nameOfEmployer" id="nameOfEmployer" placeholder="Enter name of employer">
										</div>
										
										<div class="col-12">
											<div class="d-grid">
												<button type="submit"  class="btn btn-primary" id="addProductBtn">Save Product</button>
											</div>
										</div>
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
			function formatNRC(input) {
				let value = input.value.replace(/\D/g, ''); // Remove all non-digit characters
				if (value.length > 6) value = value.slice(0, 6) + '/' + value.slice(6);
				if (value.length > 9) value = value.slice(0, 9) + '/' + value.slice(9);
				input.value = value.slice(0, 11); // Limit to 11 characters (6 digits + 2 slashes + 3 digits)
			}
			
			document.getElementById('addProfileForm').addEventListener('submit', function(e) {
				let nrcInput = document.getElementById('nrc');
				nrcInput.value = nrcInput.value.replace(/\D/g, ''); // Remove all non-digit characters before submission
			});
		</script>
		<script src="{{ asset('assets/js/addProfile.js') }}" ></script>
	@endpush
</x-client-layout>
