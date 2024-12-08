<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Class Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .table-container {
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background: linear-gradient(90deg, #0d6efd, #6610f2);
            color: white;
            font-weight: bold;
        }
        .btn-primary {
            background: linear-gradient(90deg, #6610f2, #0d6efd);
        }
        .btn-primary:hover {
            background: linear-gradient(90deg, #0d6efd, #6610f2);
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-5" style="font-weight: bold; color: #343a40;">Class Management System</h1>

    <!-- Success Message -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Add New Class Form -->
    <div class="card mb-4">
        <div class="card-header">
            <h4>Add New Class</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('add-class') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="class_name" class="form-label">Class Name</label>
                        <input type="text" class="form-control" id="class_name" name="class_name" placeholder="Enter class name" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="class_fee" class="form-label">Class Fee</label>
                        <input type="number" class="form-control" id="class_fee" name="class_fee" placeholder="Enter class fee" step="0.01" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="Active">Active</option>
                            <option value="Deactive">Deactive</option>
                            <option value="Graduated">Graduated</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100">Add Class</button>
            </form>
        </div>
    </div>

    <!-- Class List Table -->
    <div class="table-container p-4">
        <h4 class="mb-4">Class List</h4>
        @if ($data->isEmpty())
            <div class="alert alert-info text-center">
                No classes found. Add a new class using the form above.
            </div>
        @else
            <table class="table table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Class Name</th>
                        <th>Class Fee</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $index => $c)
                        <tr>
                            <td>{{ $index + 1 }}</td>
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
                                    <button type="submit" class="btn btn-sm btn-danger" 
                                        onclick="return confirm('Are you sure you want to delete this class?')">
                                        Delete
                                    </button>
                                </form>
                                <!-- Update Button -->
                                <a href="{{ url('update/' . $c->id) }}" class="btn btn-sm btn-warning">Update</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
