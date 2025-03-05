<!-- resources/views/user/profile.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">User Profile</h1>
        
        <div class="card mx-auto" style="width: 50%;">
            <div class="card-body">
                <h5 class="card-subtitle mb-2 text-muted">User ID: {{ $id }}</h5>
                <h5 class="card-subtitle mb-2 text-muted">Name: {{ $name }}</h5>
            </div>
        </div>

    </div>
</body>
</html>
