<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Class List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      .light-blue-bg {
        background-color: #e0f7fa; /* Light blue background */
      }
    </style>
  </head>
  <body>
    <div class="container mt-4">
      <h1 class="text-center mb-4">Class List</h1>
      <table class="table table-hover table-bordered light-blue-bg">
        <thead class="table-primary">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+k/xDkl3ed5ibBejyKL+pZWcYSFvGFq/lDph4tmnWpg6vmUOE3c84WkMfiO4Ny" crossorigin="anonymous"></script>
  </body>
</html>
