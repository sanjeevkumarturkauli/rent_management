<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class OwnerController extends Controller
{
    public function create(Request $request)
    {

        // If validation fails, return a detailed error message
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'message' => 'Validation failed'], 422);
        }

        // Create the owner (user) with the given validated data
        $owner = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Check if the "owner" role exists, and create it if not
        $role = Role::firstOrCreate(['name' => 'owner']);

        // Assign the role to the user
        $owner->assignRole($role);

        return response()->json(['status' => true, 'message' => 'Owner created successfully!', 'data' => $owner,], 201);
    }
}
