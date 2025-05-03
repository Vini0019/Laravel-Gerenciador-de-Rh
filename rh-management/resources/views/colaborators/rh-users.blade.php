<x-layout-app pageTitle="Human resources">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="w-100 p-4">

        <h3>Colaborators</h3>

        <hr>


        @if ($colaborators->count() === 0)

        <div class="text-center my-5">
            <p>No colaborators found</p>
            <a href="{{ route('colaborators.new-rh-users') }}" class="btn btn-primary">Create a new colaborator</a>
        </div>

        @else

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <div class="mb-3">
            <a href="{{ route('colaborators.new-rh-users') }}" class="btn btn-primary">Create a new colaborator</a>
        </div>

        <table class="table" id="table">
            <thead class="table-dark">
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Permissions</th>
                <th>Address</th>
                <th>City</th>
                <th>Admission Date</th>
                <th></th>
            </thead>
            <tbody>

                @foreach ( $colaborators as $colaborator )
                <tr>
                    <td>{{ $colaborator->name }}</td>
                    <td>{{ $colaborator->email }}</td>
                    <td>{{ $colaborator->role }}</td>

                    @php
                    $permissions = json_decode($colaborator->permissions);
                    @endphp

                    <td>
                        {{ implode(',', $permissions) }}
                    </td>

                    <td>{{ $colaborator->detail->address }}</td>
                    <td>{{ $colaborator->detail->city }}</td>
                    <td>{{ $colaborator->detail->admission_date }}</td>

                    <td>
                        <div class="d-flex gap-3 justify-content-end">
                            <a href="{{ route('colaborators.edit-rh-users', ['id' => $colaborator->id]) }}" class="btn btn-sm btn-outline-dark"><i class="fa-regular fa-pen-to-square me-2"></i>Edit</a>

                            <form id="delete-user-form-{{ $colaborator->id }}" action="{{ route('colaborators.delete-rh-users') }}" method="post" class="delete-user-form">
                                @csrf
                                @method('delete')

                                <input type="hidden" name="id" value="{{ $colaborator->id }}">

                                <button type="button" class="btn btn-sm btn-outline-dark delete-button" data-id="{{ $colaborator->id }}">
                                    <i class="fa-regular fa-trash-can me-2"></i>Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>

                @endforeach


            </tbody>
        </table>


        @endif


        <hr>


    </div>

    <script>
        document.querySelectorAll('.delete-button').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const form = document.getElementById(`delete-user-form-${id}`);

                Swal.fire({
                    title: 'Tem certeza?',
                    text: "Você não poderá reverter isso!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Sim, deletar!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
</x-layout-app>