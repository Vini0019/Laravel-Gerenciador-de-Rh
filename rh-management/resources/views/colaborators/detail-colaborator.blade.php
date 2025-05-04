<x-layout-app page-title="Colaborator details">

    <div class="w-100 p-4">

        <h3>Colaborator details</h3>

        <hr>

        <div class="container-fluid">
            <div class="row mb-3">

                <div class="col">

                    <p>Name: <strong>{{ $colaborator->name }}</strong></p>
                    <p>Email: <strong>{{ $colaborator->email }}</strong></p>
                    <p>Role: <strong>{{ $colaborator->role }}</strong></p>
                    <p>Permissions: </p>



                    <p>Department: <strong>{{ $colaborator->department->name }}</strong></p>
                    <p>Active:
                        @if($colaborator->deleted_at === null)
                        <span class="badge bg-success">Yes</span>
                        @else
                        <span class="badge bg-danger">No</span>
                        @endif
                    </p>
                </div>

                <div class="col">
                    <p>Address: <strong>{{ $colaborator->detail->address }}</strong></p>
                    <p>Zip code: <strong>{{ $colaborator->detail->zip_code }}</strong></p>
                    <p>City: <strong>{{ $colaborator->detail->city }}</strong></p>
                    <p>Phone: <strong>{{ $colaborator->detail->phone }}</strong></p>
                    <p>Admission date: <strong>{{ $colaborator->detail->admission_date }}</strong></p>
                    <p>Salary: <strong>{{ $colaborator->detail->salary }}</strong></p>
                </div>
            </div>
        </div>

        <a href="{{route('colaborators.admin-all-colaborators')}}"> <button class="btn btn-outline-dark"><i class="fas fa-arrow-left me-2"></i>Back</button></a>

    </div>

</x-layout-app>