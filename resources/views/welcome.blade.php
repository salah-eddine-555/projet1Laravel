<!-- resources/views/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .btn-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
            gap: 30px;
        }
        .btn-custom {
            padding: 20px 40px;
            font-size: 1.5rem;
            border-radius: 12px;
        }
    </style>
</head>
<body>
    <div class="btn-container">
       
                <a href="{{ route('categories.index') }}" class="btn btn-primary btn-custom">
                    Catégories
                </a>
            <a href="{{ route('posts.index') }}" class="btn btn-success btn-custom">
                Posts
            </a>
    </div>


</body>
</html>
