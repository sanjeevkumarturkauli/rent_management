<?php

namespace App\Livewire\Admin\Owner;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class Index extends Component
{
    public $search;
    public $paginate = 10;
    public $title = "Owner";

    public $email;
    public $roles;
    public $fullName;
    public $selectedOwner; // Selected owner's ID
    public $selectedRoles = []; // Store selected roles for the owner

    use WithPagination;

    // Validation rules
    protected $rules = [
        'email' => 'required|email|unique:users,email',
        'fullName' => 'required',
    ];

    public function mount()
    {
        $this->roles = Role::all(); // Fetch all roles
    }

    public function delete($id)
    {
        $owner = User::find($id);

        if ($owner) {
            $owner->delete();
            session()->flash('success', 'Owner deleted successfully.');
        } else {
            session()->flash('error', 'Owner not found.');
        }
    }

    public function editOwner($ownerId)
    {
        $owner = User::findOrFail($ownerId);
        $this->selectedOwner = $ownerId;
        $this->selectedRoles = $owner->roles->pluck('name')->toArray(); // Get assigned roles
    }

    public function updateRole()
    {
        $owner = User::findOrFail($this->selectedOwner);

        // Update roles
        $owner->syncRoles($this->selectedRoles);

        // Success message
        session()->flash('success', 'Roles updated successfully.');

        // Close modal
        $this->dispatch('closeModal', ['modalId' => '#editUser']);
    }

    public function refresh()
    {
        // Trigger a re-render
    }


    public function render()
    {
        $owners = User::search($this->search)
            ->where('id', '!=', Auth::id())
            ->paginate($this->paginate);

        return view('livewire.admin.owner.index', ['owners' => $owners]);
    }

}
