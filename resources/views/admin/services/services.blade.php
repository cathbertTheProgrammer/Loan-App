<x-admin-layout>
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">{{ auth()->user()->name }}</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('client.index') }}"><i
                                    class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Service Types</li>
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
                <div class="col-lg-6 col-xl-6">
                    <a href="{{ route('services.add') }}" class="btn btn-primary btn-sm mb-3 mb-lg-0"><i class='bx bxs-plus-square'></i>Add Service</a>
                </div>
                <hr />

                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Service</th>
                                <th>Service Type</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $service)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <input class="form-check-input me-3" type="checkbox" value=""
                                                    aria-label="...">
                                            </div>
                                            <div class="ms-2">
                                                <h6 class="mb-0 font-14">{{ $service->service }}</h6>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="d-flex align-items-center">
                                          
                                            <div class="ms-2">
                                                <h6 class="mb-0 font-14">{{ $service->serviceType->service_type }}</h6>

                                            </div>
                                        </div>
                                    </td>
                            
                            

                                    @if ($service->status == 'ACTIVE')
                                        <td>
                                            <div
                                                class="badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3">
                                                <i class="bi bi-check-circle"></i>{{ $service->status }}</div>
                                        </td>
                                    @elseif (in_array($service->status, ['PENDING']))
                                        <td>
                                            <div
                                                class="badge rounded-pill text-info bg-light-info p-2 text-uppercase px-3">
                                                <i class="bi bi-arrow-clockwise"></i>{{ $service->status }}</div>
                                        </td>
                                    @elseif (in_array($service->status, ['DISABLED']))
                                        <td>
                                            <div
                                                class="badge rounded-pill text-danger bg-light-danger p-2 text-uppercase px-3">
                                                <i class="bi bi-x-circle"></i>{{ $service->status }}</div>
                                        </td>
                                    @endif

                                    <td>{{ $service->created_at }}</td>

                                    <td>
                                        <div class="d-flex order-actions">
                                            <a href="{{ route('services.edit', ['service' => $service->id]) }}">
                                                <i class="bi bi-pencil-square text-primary"></i>
                                            </a>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $services->links() }}

                </div>
            </div>


        </div>



        @push('scripts')
        @endpush
</x-admin-layout>
