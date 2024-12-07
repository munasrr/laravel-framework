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
      <!-- Add New Class Form -->
      <h1 class="text-center mb-4">Add New Class</h1>
      <form action="{{ url('add-class') }}" method="POST">
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
        <button type="submit" class="btn btn-primary">Add Class</button>
      </form>

      <!-- Class List Table -->
      <h1 class="text-center mt-5">Class List</h1>
      <table class="table table-hover table-bordered">
        <thead>
          <tr>
            <th>Class ID</th>
            <th>Class Name</th>
            <th>Class Fee</th>
            <th>Class Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $c)
            <tr>
              <td>{{ $c->id }}</td>
              <td>{{ $c->class_name }}</td>
              <td>{{ $c->class_fee }}</td>
              <td>{{ $c->status }}</td>
              <td>
                <a href="{{ url('delete/' . $c->id) }}" class="btn btn-danger btn-sm">Delete</a>
                <a href="{{ url('update/' . $c->id) }}" class="btn btn-warning btn-sm">Update</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
