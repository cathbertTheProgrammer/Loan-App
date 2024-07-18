<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Instantiate a new UserController instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-user|edit-user|delete-user', ['only' => ['index', 'show']]);
        $this->middleware('permission:create-user', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-user', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-user', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('users.index', [
            'users' => User::where('is_admin', 1)->latest('id')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('users.create', [
            'roles' => Role::pluck('name')->all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request): RedirectResponse
    {
        // Filter only the relevant fields
        $input = $request->only(['name', 'is_admin', 'email', 'password']);
    
        // Hash the password
        $input['password'] = Hash::make($request->password);
    
        // Create the user
        $user = User::create($input);
    
        // Assign roles to the user
        $user->assignRole($request->roles);
    
        return redirect()->route('users.index')
            ->withSuccess('New user is added successfully.');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(User $user): View
    {
        return view('users.show', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        // Check Only Super Admin can update his own Profile
        if ($user->hasRole('Super Admin')) {
            if ($user->id != auth()->user()->id) {
                abort(403, 'USER DOES NOT HAVE THE RIGHT PERMISSIONS');
            }
        }

        return view('users.edit', [
            'user' => $user,
            'roles' => Role::pluck('name')->all(),
            'userRoles' => $user->roles->pluck('name')->all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        // Filter out the unnecessary fields
        $input = $request->only(['name', 'is_admin', 'email', 'password']);
        
    
        dd($user);
        // Hash the password if it is provided
        if (!empty($request->password)) {
            $input['password'] = Hash::make($request->password);
        } else {
            // Remove password from input if it's not provided to avoid overwriting with empty value
            unset($input['password']);
        }
    
        // Update the user with the filtered input
        $user->update($input);
    
        // Sync roles
        if ($request->has('roles')) {
            $user->syncRoles($request->roles);
        }
    
        return redirect()->back()->withSuccess('User is updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        // About if user is Super Admin or User ID belongs to Auth User
        if ($user->hasRole('Super Admin') || $user->id == auth()->user()->id) {
            abort(403, 'USER DOES NOT HAVE THE RIGHT PERMISSIONS');
        }

        $user->syncRoles([]);
        $user->delete();
        return redirect()->route('users.index')
            ->withSuccess('User is deleted successfully.');
    }
}
