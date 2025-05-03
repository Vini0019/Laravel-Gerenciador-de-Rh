<x-layout-app pageTitle="Edit RH Colaborator">

    <div class="w-100 p-4">

        <h3>Edit Human Resources Colaborator</h3>

        <hr>

        <form action="{{ route('colaborators.update-rh-users') }}" method="post">

            @csrf

            @method('put')

            <input type="hidden" name="id" value="{{ $colaborator->id }}">

            <div class="container-fluid">

                <div class="row gap-3">

                    <div class="col shadow-sm p-3 mb-5 bg-white rounded p-4">

                        <div class="col">
                            <div class="mb-3">
                                <label for="name" class="form-label">Colaborator Name</label>
                                <input type="string" class="form-control" id="name" name="name" value="{{ $colaborator->name}}">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col">
                            <div class="mb-3">
                                <label for="salary" class="form-label">Salary</label>
                                <input type="number" class="form-control" id="salary" name="salary" step=".01" placeholder="0,00" value="{{ $colaborator->detail->salary }}">
                                @error('salary')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="admission_date" class="form-label">Admission Date</label>
                                <input type="text" class="form-control" id="admission_date" name="admission_date" placeholder="YYYY-mm-dd" value="{{ $colaborator->detail->admission_date }}">
                                @error('admission_date')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <p class="mb-3">Profile: <strong>Human Resources</strong></p>

                    </div>


                </div>

            </div>

            <div class="mt-3">
                <a href="{{route('colaborators.rh-users')}}" class="btn btn-outline-danger me-3">Cancel</a>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>

        </form>


</x-layout-app>