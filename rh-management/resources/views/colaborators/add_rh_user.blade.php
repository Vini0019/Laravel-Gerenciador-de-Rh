<x-layout-app pageTitle="New RH Colaborator">

    <div class="w-100 p-4">

        <h3>New Human Resources Colaboratos</h3>

        <hr>

        <form action="{{ route('colaborators.create-rh-users') }}" method="post">

            @csrf

            <div class="container-fluid">

                <div class="row gap-3">

                    <div class="col shadow-sm p-3 mb-5 bg-white rounded p-4">


                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                            @error('email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <p class="mb-3">Profile: <strong>Human Resources</strong></p>

                    </div>


                    {{-- user details --}}
                    <div class="col shadow-sm p-3 mb-5 bg-white rounded p-4">

                        <div class="mb-3">
                            <label for="Address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
                            @error('address')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="zip_code" class="form-label">Zip Code</label>
                                    <input type="text" class="form-control" id="zip_code" name="zip_code" value="{{ old('zip_code') }}">
                                    @error('zip_code')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="city" class="form-label">City</label>
                                    <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}">
                                    @error('city')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                                    @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="salary" class="form-label">salary</label>
                                    <input type="number" class="form-control" id="salary" name="salary" step=".01" placeholder="0,00" value="{{ old('salary') }}">
                                    @error('salary')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="admission_date" class="form-label">Admission Date</label>
                                    <input type="text" class="form-control" id="admission_date" name="admission_date" placeholder="YYYY-mm-dd" value="{{ old('admission_date') }}">
                                    @error('admission_date')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="mt-3">
                    <a href="{{route('colaborators.rh-users')}}" class="btn btn-outline-danger me-3">Cancel</a>
                    <button type="submit" class="btn btn-primary">Create colaborator</button>
                </div>

            </div>


        </form>

    </div>

</x-layout-app>