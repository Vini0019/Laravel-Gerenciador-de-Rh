<div class="w-25 p-4">

    <h3>{{ $title }}</h3>

    <hr>

    <form action={{ $route }} method="post">

        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Department name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        @error('name')
        <div class="text-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3 d-flex align-items-center">
            <a href="{{ route('departments') }}" class="btn btn-outline-danger me-3">Cancel</a>
            <button type="submit" class="btn btn-primary">{{$btnSubmit}}</button>
        </div>

    </form>

</div>