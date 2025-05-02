<x-layout-app pageTitle="Departments">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="w-100 p-4">

        <h3>Departments</h3>

        <hr>


        @if ($departments->count() === 0)

        <div class="text-center my-5">
            <p>no departments found</p>
            <a href="{{ route('departments.new-department') }}" class="btn btn-primary">Create a new department</a>
        </div>

        @else

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <div class="mb-3">
            <a href="{{ route('departments.new-department') }}" class="btn btn-primary">Create a new department</a>
        </div>

        <table class="table w-50" id="table">
            <thead class="table-dark">
                <th>Departments</th>
                <th></th>
            </thead>
            <tbody>

                @foreach ( $departments as $department )
                <tr>
                    <td>{{ $department->name }}</td>
                    <td>
                        <div class="d-flex gap-3 justify-content-end">
                            <a href="{{ route('FormEditDepartment', ['id' => $department->id]) }}" class="btn btn-sm btn-outline-dark"><i class="fa-regular fa-pen-to-square me-2"></i>Edit</a>

                            <form id="delete-department-form-{{ $department->id }}" action="{{ route('DeleteDepartment') }}" method="post" class="delete-department-form">
                                @csrf
                                @method('delete')

                                <input type="hidden" name="id" value="{{ $department->id }}">

                                <button type="button" class="btn btn-sm btn-outline-dark delete-button" data-id="{{ $department->id }}">
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
                const form = document.getElementById(`delete-department-form-${id}`);

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