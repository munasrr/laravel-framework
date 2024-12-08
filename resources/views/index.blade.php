<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Class Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1 class="text-center mb-4 text-primary">Class Management System</h1>

    <!-- Display success message -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Add New Class Form -->
    <div class="card shadow mb-4">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Add New Class</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('add-class') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="class_name" class="form-label">Class Name</label>
                    <input type="text" class="form-control" id="class_name" name="class_name" required>
                </div>
                <div class="mb-3">
                    <label for="class_fee" class="form-label">Class Fee</label>
                    <input type="number" class="form-control" id="class_fee" name="class_fee" step="0.01" required>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="Active">Active</option>
                        <option value="Deactive">Deactive</option>
                        <option value="Graduated">Graduated</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary w-100">Add Class</button>
            </form>
        </div>
    </div>

    <!-- Class List Table -->
    <div class="card shadow">
        <div class="card-header bg-secondary text-white">
            <h4 class="mb-0">Class List</h4>
        </div>
        <div class="card-body">
            @if ($data->isEmpty())
                <!-- Empty State -->
                <div class="alert alert-info text-center" role="alert">
                    No classes found. Add a new class using the form above.
                </div>
            @else
                <table class="table table-hover table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Class ID</th>
                            <th>Class Name</th>
                            <th>Class Fee</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $c)
                            <tr>
                                <td>{{ $c->id }}</td>
                                <td>{{ $c->class_name }}</td>
                                <td>${{ number_format((float) $c->class_fee, 2) }}</td>
                                <td>
                                    <span class="badge {{ $c->status == 'Active' ? 'bg-success' : ($c->status == 'Deactive' ? 'bg-secondary' : 'bg-warning') }}">
                                        {{ $c->status }}
                                    </span>
                                </td>
                                <td>
                                    <!-- Delete Form -->
                                    <form action="{{ route('classes.destroy', $c->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" 
                                            onclick="return confirm('Are you sure you want to delete this class?')">
                                            Delete
                                        </button>
                                    </form>
                                    <!-- Update Link -->
                                    <a href="{{ url('update/' . $c->id) }}" class="btn btn-warning btn-sm">Update</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
