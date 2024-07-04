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
                <div class="col-lg-3 col-xl-2">
                    <a id="editNextOfKinButton" class="btn btn-primary mb-3 mb-lg-0"><i class='bx bxs-plus-square'></i>Edit</a>
                </div>
                <hr />

				<form id="editNextOfKinForm" method="POST" enctype="multipart/form-data" action="{{ route('client.updateNextOfKin',  ['nextOfKin' => $nextOfKin->id]) }}">
					@csrf
					@method('PUT')
					
					<div class="form-body mt-4">
						
						<div class="border border-3 p-4 rounded">
                            <div class="row">
                                <div class="col-lg-6">
									<div class="mb-3">
										<label for="fullname" class="form-label">Full Names</label>
										<input type="text" disabled value="{{ $nextOfKin->fullname }}" class="form-control" name="fullname" id="fullname" >
									</div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
										<label for="relationship" class="form-label">Relationship</label>
										<input type="text" disabled value="{{ $nextOfKin->relationship }}" class="form-control" name="relationship" id="relationship" >
									</div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
										<label for="phoneNumber" class="form-label">Phone Number</label>
										<input type="text" disabled  value="{{ $nextOfKin->phoneNumber }}" class="form-control" name="phoneNumber" id="phoneNumber" placeholder="Enter phone number">
									</div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="homeAddress" class="form-label">Home Address</label>
                                        <textarea class="form-control" disabled name="homeAddress" id="homeAddress" rows="2" placeholder="Enter address">
                                            {{ $nextOfKin->homeAddress }}"
                                        </textarea>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
										<label for="nameOfEmployer" class="form-label">Name Of Employer</label>
										<input type="text" disabled value="{{ $nextOfKin->nameOfEmployer }}" class="form-control" name="nameOfEmployer" id="nameOfEmployer" >
									</div>
                                </div>

                               

                                <div class="col-lg-6">
                                    <div class="mb-3">
										<label for="telNo" class="form-label">Tel No</label>
										<input type="text" disabled value="{{ $nextOfKin->telNo }}" class="form-control" name="telNo" id="telNo" placeholder="Enter Tell Number">
									</div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="mb-3">
										<label for="employerAddress" class="form-label">Employers Physical Address</label>
										<textarea class="form-control" disabled name="employerAddress" id="employerAddress" rows="2" placeholder="Enter address">
                                            {{ $nextOfKin->employerAddress }}
                                        </textarea>
									</div>
                                </div>

                                 <div hidden class="col-2">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary" id="editProfileBtn">Save</button>
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
		<script src="{{ asset('assets/js/nextOfKin.js') }}" ></script>
        <script>
             document.getElementById('editNextOfKinButton').addEventListener('click', function() {
                // Enable all input, select, and textarea elements
                document.querySelectorAll('#editNextOfKinForm input, #editNextOfKinForm select, #editNextOfKinForm textarea').forEach(function(element) {
                    element.disabled = false;
                })

                // Show the hidden save button
                document.querySelector('#editNextOfKinForm button[type="submit"]').parentElement.parentElement.hidden = false;
            });
        </script>
	@endpush
</x-client-layout>
