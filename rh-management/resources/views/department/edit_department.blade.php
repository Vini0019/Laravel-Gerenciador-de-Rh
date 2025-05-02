<x-layout-app pageTitle="Edit Department">

    <div class="w-25 p-4">

        <h3>Edit Department</h3>

        <hr>

        <form action="#" method="post">

            @csrf

            @method('put')

            <input type="hidden" name="id" value="{{ $department->id }}">

            <div class="mb-3">
                <label for="name" class="form-label">Department name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $department->name) }}" required>
            </div>
            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3 d-flex align-items-center">
                <a href="#" class="btn btn-outline-danger me-3">Cancel</a>
                <button type="submit" class="btn btn-primary">Edit Department</button>
            </div>

        </form>

    </div>
</x-layout-app>