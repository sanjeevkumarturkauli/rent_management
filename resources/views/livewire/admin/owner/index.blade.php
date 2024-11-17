@section('title', $title)
<div>
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">

            <div class="card">
                <h5 class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="gap-2 d-flex">
                            <input type="text" class="form-control" placeholder="Search..." wire:model.live="search">
                            <button class="btn bg-primary text-white" wire:click="refresh">
                                <i class="ti ti-rotate-clockwise rotate-180 scaleX-n1-rtl cursor-pointer"></i>
                            </button>
                            <div class="spinner-border p-3 text-primary" role="status"  wire:loading wire:target="search,refresh"></div>
                        </div>
                        <button class="btn bg-primary text-white">Add <i class="ti ti-plus me-1"></i></button>
                    </div>
                </h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Sr. No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($owners as $key => $owner)
                                <tr>
                                    <td>{{ $owners->firstItem() + $key }}</td>
                                    <td>{{ $owner->name }}</td>
                                    <td>{{ $owner->email }}</td>
                                    <td>
                                        {{ $owner->getRoleNames()->implode(', ') ?: 'No role found' }}
                                        <a href="javascript:void(0)" wire:click="editOwner({{ $owner->id }})"
                                            data-bs-toggle="modal" data-bs-target="#editUser">
                                            <i class="ti ti-pencil me-1"></i>
                                        </a>
                                    </td>
                                    <td>
                                        {!! $owner->status == 0
                                            ? '<span class="badge bg-label-danger">Inactive</span>'
                                            : '<span class="badge bg-label-primary">Active</span>' !!}
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)" wire:click="editOwner({{ $owner->id }})">
                                            <i class="ti ti-pencil me-1"></i>
                                        </a>
                                        |
                                        <a href="javascript:void(0)" wire:click="delete({{ $owner->id }})">
                                            <i class="ti ti-trash me-1"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No owners found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $owners->links('pagination.paginate') }}
                </div>
            </div>

            <!-- Edit Roles Modal -->
            <div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true" wire:ignore>
                <div class="modal-dialog modal-dialog-centered modal-simple">
                    <div class="modal-content p-3">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            <div class="text-center mb-4">
                                <h3>Edit Roles for Owner</h3>
                            </div>
                            <form wire:submit.prevent="updateRole">
                                <div class="mb-3">
                                    @foreach ($roles as $role)
                                        <div class="form-check">
                                            <input type="checkbox" id="role_{{ $role->id }}"
                                                class="form-check-input" value="{{ $role->name }}"
                                                wire:model="selectedRoles">
                                            <label for="role_{{ $role->id }}" class="form-check-label">
                                                {{ $role->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Update Roles</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Edit Roles Modal -->

        </div>
    </div>
</div>
