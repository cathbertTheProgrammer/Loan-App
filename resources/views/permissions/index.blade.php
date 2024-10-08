<x-admin-layout>

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <!-- Breadcrumb content -->
        </div>
        <!--end breadcrumb-->
        <div class="card">
            <div class="card-header">Manage Permissions</div>
            <div class="card-body">
                @can('create-permission')
                    <a href="{{ route('permissions.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Permission</a>
                @endcan
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">S#</th>
                            <th scope="col">Name</th>
                            <th scope="col" style="width: 300px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($permissions as $permission)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $permission->name }}</td>
                            <td>
                                <form action="{{ route('permissions.destroy', $permission->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
    
                                    <a href="{{ route('permissions.show', $permission->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>
    
                                    @if ($permission->name!='Super Admin')
                                        @can('edit-permission')
                                            <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>   
                                        @endcan
    
                                        @can('delete-permission')
                                            @if ($permission->name!=Auth::user()->hasRole($permission->name))
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this permission?');"><i class="bi bi-trash"></i> Delete</button>
                                            @endif
                                        @endcan
                                    @endif
    
                                </form>
                            </td>
                        </tr>
                        @empty
                            <td colspan="3">
                                <span class="text-danger">
                                    <strong>No permission Found!</strong>
                                </span>
                            </td>
                        @endforelse
                    </tbody>
                </table>
    
                {{ $permissions->links() }}
    
            </div>
        </div>
    </div>
    
    </x-admin-layout>