<?php

namespace App\Livewire\Admin\Owner;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    #[Layout('layouts.app')]

    public $owners;
    public $paginate = 10;
    public $title = "Owner";

    use WithPagination;

    #[Validate('required|email|unique:users,email')]
    public $email;

    #[Validate('required')]
    public $fullName;


    public function addOwner()
    {
        $this->validate();
    }

    public function getOwners()
    {
        // Get the search term
        $searchValue = request()->input('search.value');  // The global search value

        // Build the query to get users except the authenticated one
        $query = User::where('id', '!=', Auth::id());

        // Apply the search filter if a search term is provided
        if (!empty($searchValue)) {
            $query->where(function ($q) use ($searchValue) {
                $q->where('name', 'like', '%' . $searchValue . '%')
                    ->orWhere('email', 'like', '%' . $searchValue . '%');
            });
        }

        // Get the paginated data for DataTables
        $totalRecords = $query->count();
        $filteredRecords = $totalRecords;  // After filtering, we can adjust this if needed

        // Apply pagination
        $users = $query->skip(request()->input('start'))
            ->take(request()->input('length'))
            ->get();

        // Return the data in the format DataTables expects
        return response()->json([
            "draw" => intval(request()->input('draw')),
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $filteredRecords,
            "data" => $users->map(function ($user) {
                return [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'status' => $user->status
                ];
            })
        ]);
    }

    public function updateStatus()
    {
        $user = User::findOrFail(request('id'));
        $user->status = request('status') == 'true' ? 1 : 0;
        $user->save();
        return response()->json(['success' => true]);
    }

    public function deleteOwner($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['success' => true]);
    }

    public function mount(){
        $query = User::where('id', '!=', Auth::id());
        $this->owners = $query->paginate($this->paginate);
    }


    public function render()
    {
        return view('livewire.admin.owner.index');
    }
}
