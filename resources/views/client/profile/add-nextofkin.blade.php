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
                <h5 class="card-title">Add Next Of Kin</h5>
                <hr />

				<form id="addNextOfKinForm" method="POST" enctype="multipart/form-data" action="{{ route('client.storeNextOfKin') }}">
					@csrf
					@method('POST')
					
					<div class="form-body mt-4">
						
						<div class="border border-3 p-4 rounded">
                            <div class="row">

                                <div class="col-lg-6 col-md-6 col-sm-6  mb-3">
									
                                    <label for="fullname" class="form-label">Full Names</label>
                                    <input type="text" class="form-control" name="fullname" id="fullname" >
									
                                </div>

                                <div class="col-lg-6 mb-3">
                                    
                                    <label for="relationship" class="form-label">Relationship</label>
                                    <input type="text" class="form-control" name="relationship" id="relationship" >
									
                                </div>

                                <div class="col-lg-6 mb-3">
                                    
                                    <label for="phoneNumber" class="form-label">Phone Number</label>
                                    <input type="text" class="form-control" name="phoneNumber" id="phoneNumber" placeholder="Enter phone number">
									
                                </div>

                                <div class="col-lg-6 mb-3">
                                
                                    <label for="homeAddress" class="form-label">Home Address</label>
                                    <textarea class="form-control" name="homeAddress" id="homeAddress" rows="2" placeholder="Enter Home Address"></textarea>
                                
                                </div>

                                <div class="col-lg-6 mb-3">
                                   
                                    <label for="nameOfEmployer" class="form-label">Name Of Employer</label>
                                    <input type="text" class="form-control" name="nameOfEmployer" id="nameOfEmployer" >
									
                                </div>

                                <div class="col-lg-6 mb-3">         
                                    <label for="telNo" class="form-label">Tel No</label>
                                    <input type="text" class="form-control" name="telNo" id="telNo" placeholder="Enter Tell Number">					
                                </div>

                                <div class="col-lg-12 mb-3">
                                   
                                    <label for="employerAddress" class="form-label">Employers Physical Address</label>
                                    <textarea class="form-control" name="employerAddress" id="employerAddress" rows="2" placeholder="Enter Employers Physical Address"></textarea>
									
                                </div>

                                

                                <div class="col-2">
                                    <div class="d-grid">
                                        <button type="submit"  class="btn btn-primary" id="addNextOfKinBtn">Save</button>
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
	@endpush
</x-client-layout>
