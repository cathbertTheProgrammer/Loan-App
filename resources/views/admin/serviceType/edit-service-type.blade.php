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
                        <li class="breadcrumb-item active" aria-current="page">Service Type</li>
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
                <h5 class="card-title">Service Types</h5>
                <hr />

				<form id="editServiceTypeForm" method="POST" enctype="multipart/form-data" action="{{ route('serviceTypes.update', ['serviceType' => $serviceType->id]) }}">
					@csrf
					@method('PUT')
					
					<div class="form-body mt-4">
						<div class="row">
							<div class="">
								<div class="border border-3 p-4 rounded">
                              
                                    <div class="mb-3">
                                        <label for="service_type" class="form-label">Service Type Name</label>
                                        <input type="text" class="form-control" name="service_type" id="service_type" value="{{$serviceType->service_type}}" required>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-select" name="status" value="{{$serviceType->status}}" id="status">
                                            <option>Select Status</option>
                                            <option value="ACTIVE" {{ $serviceType->status == 'ACTIVE' ? 'selected' : '' }}>Active</option>
                                            <option value="PENDING" {{ $serviceType->status == 'PENDING' ? 'selected' : '' }}>Pending</option>
                                            <option value="DISABLED" {{ $serviceType->status == 'DISABLED' ? 'selected' : '' }}>Disabled</option>
                                        </select>
                                    </div>

            
                                    <div class="">
                                        <button type="submit"  class="btn btn-primary" id="editServiceType">Submit</button>
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
		<script src="{{ asset('assets/js/service-type.js') }}" ></script>
	@endpush
</x-admin-layout>
