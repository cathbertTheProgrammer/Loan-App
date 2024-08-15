<x-admin-layout>
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <!-- Breadcrumb content -->
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body">
                <div class="d-lg-flex align-items-center mb-4 gap-3">
                    <!-- Search input -->
                    <div class="position-relative">
                        <!-- Search input content -->
                    </div>


                </div>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>#No</th>
                                <th>Service Type</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Urgent</th>
                                <th>Deadline</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($requestsHistory as $request)
                                <tr>
                                    <td>
										<div class="d-flex align-items-center">
											
											<div class="ms-2">
												<h6 class="mb-0 font-14">#{{ $request->id }}</h6>
											</div>
										</div>
									</td>

                                    <td>{{ $request->serviceType->service_type }}</td>
                            
                                    <td>{{ $request->firstname }}</td>
                                    <td>{{ $request->lastname }}</td>
                                   

                                    @if ($request->urgent == 1)
                                        <td>Yes</td>
                                    @else
                                        <td>No</td>
                                    @endif

                                    <td>{{ $request->deadline }}</td>

                                    @if ($request->status == 'COMPLETED')
                                        <td>
                                            <div
                                                class="badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3">
                                                <i class='bx bxs-circle me-1'></i>{{ $request->status }}
                                            </div>
                                        </td>
                                    @elseif ($request->status == 'PENDING')
                                        <td>
                                            <div
                                                class="badge rounded-pill text-warning bg-light-warning p-2 text-uppercase px-3">
                                                <i class='bx bxs-circle align-middle me-1'></i>{{ $request->status }}
                                            </div>
                                        </td>
                                    @elseif (in_array($request->status, ['DISABLED', 'DELETED']))
                                        <td>
                                            <div
                                                class="badge rounded-pill text-danger bg-light-danger p-2 text-uppercase px-3">
                                                <i class='bx bxs-circle align-middle me-1'></i>{{ $request->status }}
                                            </div>
                                        </td>
                                    @endif

                                 
                                    <td>
                                        <div class="d-flex order-actions">
                                            <a href="javascript:;" class="view-request"
                                                data-request-id="{{ $request->id }}"
                                                data-request-type="{{ $request->serviceType }}"
                                                data-request-services="{{ $request->services }}"
                                                data-request-email="{{ $request->email }}"
                                                data-request-description="{{ $request->description }}"
                                                data-request-firstname="{{ $request->firstname }}"
                                                data-request-lastname="{{ $request->lastname }}"
                                                data-request-urgent="{{ $request->urgent }}"
                                                data-request-deadline="{{ $request->deadline }}"
                                                data-request-address="{{ $request->address }}"
                                                data-request-phone="{{ $request->phone }}">
                                                <i class='bi bi-eye text-success'></i>
                                            </a>

                                        </div>
                                    </td>
                              
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{ $requestsHistory->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Modal -->
<div class="modal fade" id="viewRequestModal" tabindex="-1" aria-labelledby="requestsRequestReview" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between align-items-center">
                <h5 class="modal-title mx-auto text-primary" id="requestsRequestReview">Service Request Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body">
                <!-- Form content -->
                <div class="container">
                    
                    <div class="card">
                        <div class="card-header text-center">
                            <h5 class="card-title"><span id="display-request-type"></span></h5>
                        </div>
                        <div class="card-body">

                            <input hidden name="request_id" id="request_id">
                            <p><strong>Services:</strong></p>
                            <ul class="request-list" id="display-requests">
                                <!-- Services will be dynamically inserted here -->
                            </ul>
                            <p><strong>Description:</strong> <span id="display-description"></span></p>
                            <p><strong>Email:</strong> <span id="display-email"></span></p>
                            <p><strong>First Name:</strong> <span id="display-first-name"></span></p>
                            <p><strong>Last Name:</strong> <span id="display-last-name"></span></p>
                            <p><strong>Phone:</strong> <span id="display-phone"></span></p>
                            <p><strong>Address:</strong> <span id="display-address"></span></p>
                            <p><strong>Urgent:</strong> <span id="display-urgent"></span></p>
                            <p><strong>Deadline:</strong> <span id="display-deadline"></span></p>
                        </div>
                      
                    </div>
                    
                </div>
                
            </div>

        </div>
    </div>
</div>
<!-- End Bootstrap Modal -->


@push('scripts')
    <script src="{{ asset('assets/js/view-request.js') }}"></script>
@endpush

</x-admin-layout>
