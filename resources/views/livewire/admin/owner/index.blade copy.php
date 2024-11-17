@section('title', $title)
<div>
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <x-notify />
            <!-- Owners -->
            <div class="card">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-header">Owners</h5>
                    <a class="btn self-bg-black self-text-white mx-4 mt-2" data-bs-toggle="modal"
                        data-bs-target="#editUser">Add Owner</a>
                    {{-- href="{{route('owner.add')}}" --}}
                </div>
                <div class="card-datatable text-nowrap">
                    <table class="datatables-owner table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
            <!--/ Owners -->

        </div>
        <!-- / Content -->

        <!-- Edit User Modal -->
        <div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center mb-4">
                            <h3 class="mb-2">Add & Edit Owners</h3>
                        </div>
                        <form class="row g-3" wire:submit="addOwner">
                            <div class="col-12 col-md-6">
                                <label class="form-label">Full Name</label>
                                <input type="text" class="form-control" placeholder="John deo" />
                                @error('fullName')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditUserEmail">Email</label>
                                <input type="text" class="form-control" placeholder="example@domain.com" />
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                                <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Edit User Modal -->

    </div>
</div>
{{-- <script>
    $(document).ready(function() {
        var dt_ajax_table = $('.datatables-owner');

        if (dt_ajax_table.length) {
            var dt_ajax = dt_ajax_table.DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('get-owners') }}", // Fetch data via GET request
                    type: "GET",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // CSRF token for security
                    }
                },
                columns: [{
                        data: null,
                        render: function(data, type, full, meta) {
                            return '<input type="checkbox" class="dt-checkboxes form-check-input">';
                        },
                        checkboxes: {
                            selectAllRender: '<input type="checkbox" class="form-check-input"> &nbsp;&nbsp;'
                        }
                    },
                    {
                        data: 'name',
                        render: function(data, type, full, meta) {
                            return `<span>${data}</span>`;
                        }
                    },
                    {
                        data: 'email',
                        render: function(data, type, full, meta) {
                            return `<span>${data}</span>`;
                        }
                    },
                    {
                        render: function(data, type, full, meta) {
                            return `<label class="switch switch-success">
                                <input type="checkbox" class="switch-input status-toggle" data-id="${full.id}" ${full.status == 1 ? 'checked' : ''}>
                                <span class="switch-toggle-slider">
                                    <span class="switch-on">
                                        <i class="ti ti-check"></i>
                                    </span>
                                    <span class="switch-off">
                                        <i class="ti ti-x"></i>
                                    </span>
                                </span>
                            </label>`;
                        }
                    },
                    {
                        data: null,
                        render: function(data, type, full, meta) {
                            return `<i class="ti ti-edit email-list-edit cursor-pointer me-2" data-id="${full.id}"></i>
                                    <i class="ti ti-trash email-list-delete cursor-pointer me-2" data-id="${full.id}"></i>`;
                        }
                    }
                ],
                columnDefs: [{
                        targets: 0,
                        responsivePriority: 3,
                    },
                    {
                        targets: 1,
                        searchable: true,
                        responsivePriority: 3,
                    },
                    {
                        targets: 2,
                        searchable: true,
                        responsivePriority: 3,
                    },
                    {
                        targets: 3,
                        responsivePriority: 3,
                    },
                    {
                        targets: 4,
                        responsivePriority: 3,
                    }
                ],
                dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>><"table-responsive"t><"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                displayLength: 10,
                lengthMenu: [10, 25, 50, 75, 100]
            });

            // Update status on checkbox toggle
            $(document).on('change', '.status-toggle', function() {
                var userId = $(this).data('id');
                var isChecked = $(this).is(':checked');

                $.ajax({
                    url: "{{ route('update-status') }}", // Route to update status
                    type: "POST",
                    data: {
                        id: userId,
                        status: isChecked,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        // Optionally show a success message
                        notify('success', "Status updated successfully");
                    },
                    error: function(xhr) {
                        // Handle errors
                        notify('error', "Error updating status");
                    }
                });
            });

            // Delete user on click
            $(document).on('click', '.ti-trash', function() {
                var userId = $(this).data('id');
                if (confirm('Are you sure you want to delete this user?')) {
                    $.ajax({
                        url: "{{ route('delete-owner', '') }}/" +
                            userId, // Route to delete user
                        type: "DELETE",
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            // Refresh the DataTable to reflect changes
                            dt_ajax.ajax.reload();
                            // Optionally show a success message
                            notify('success', "User deleted successfully");
                        },
                        error: function(xhr) {
                            // Handle errors
                            notify('error', "Error updating status");
                        }
                    });
                }
            });
        }
    });
</script> --}}
