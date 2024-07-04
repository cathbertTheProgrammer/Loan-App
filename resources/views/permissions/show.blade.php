<x-admin-layout>

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <!-- Breadcrumb content -->
        </div>
        <!--end breadcrumb-->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="float-start">
                            Permission Information
                        </div>
                        <div class="float-end">
                            <a href="{{ route('permissions.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                        </div>
                    </div>
                    <div class="card-body">
    
                            <div class="mb-3 row">
                                <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Name:</strong></label>
                                <div class="col-md-6" style="line-height: 35px;">
                                    {{ $permission->name }}
                                </div>
                            </div>                     
                    </div>
                </div>
            </div>
        </div>    
    
    </div>
    </x-admin-layout>