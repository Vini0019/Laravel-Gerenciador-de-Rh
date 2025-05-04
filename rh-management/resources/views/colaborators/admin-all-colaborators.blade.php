<x-layout-app pageTitle="Colaborators">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <div class="w-100 p-4">

        <h3>All colaborators</h3>

        <hr>

        <!-- table -->

        @if ($colaborators->count() === 0)

        <div class="text-center my-5">
            <p>No colaborators found</p>
        </div>

        @else

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <table class="table" id="table">
            <thead class="table-dark">
                <th>Name</th>
                <th>Email</th>
                <th>Active</th>
                <th>Role</th>
                <th>Permissions</th>
                <th>Deparment</th>

                <th></th>
            </thead>
            <tbody>

                @foreach ( $colaborators as $colaborator )
                <tr>
                    <td>{{ $colaborator->name }}</td>
                    <td>{{ $colaborator->email }}</td>
                    <td>
                        @if ($colaborator->deleted_at === null)
                        Sim

                        @else

                        Não

                        @endif

                    </td>
                    <td>{{ $colaborator->role }}</td>

                    @php
                    $permissions = json_decode($colaborator->permissions);
                    @endphp

                    <td>
                        {{ implode(',', $permissions) }}
                    </td>

                    <td>{{ $colaborator->department->name }}</td>


                    <td>
                        <div class="d-flex gap-3 justify-content-end">
                            <a href="{{ route('colaborator.detail-colaborator', ['id' => $colaborator->id]) }}" class="btn btn-sm btn-outline-dark"><i class="fas fa-eye me-2"></i>Detail</a>

                            <form id="delete-user-form-{{ $colaborator->id }}" action="{{ route('colaborator.destroy-colaborator') }}" method="post" class="delete-user-form">
                                @csrf
                                @method('delete')

                                <input type="hidden" name="id" value="{{ $colaborator->id }}">

                                @if($colaborator->deleted_at === null)

                                <button type="button" class="btn btn-sm btn-outline-dark delete-button" data-id="{{ $colaborator->id }}">
                                    <i class="fa-regular fa-trash-can me-2"></i>Delete
                                </button>

                                @endif


                            </form>

                            <form action="{{ route('colaborator.restore-colaborator') }}" method="post">

                                @csrf

                                @method('put')

                                <input type="hidden" name="id" value="{{ $colaborator->id }}">

                                @if($colaborator->deleted_at !== null)


                                <button type="submit" class="btn btn-sm btn-outline-dark">
                                    <i class="fa-solid fa-trash-arrow-up me-2"></i>Restore
                                </button>


                                @endif

                            </form>
                        </div>
                    </td>
                </tr>

                @endforeach


            </tbody>
        </table>


        @endif
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
        });
    </script>
</x-layout-app>