<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Liste des Posts</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f6fa;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #2f3640;
        }

        .top-bar {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 20px;
        }

        .btn {
            padding: 8px 15px;
            margin-left: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            color: #fff;
            font-weight: bold;
            transition: 0.3s;
            text-decoration: none;
        }
        .post-card {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 15px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .post-info {
            max-width: 70%;
        }

        .post-info h3 {
            margin: 5px 0;
            color: #2f3640;
        }

        .post-actions {
            display: flex;
            gap: 10px;
        }
    </style>
</head>
<body>
    <h1>Liste des Posts</h1>

    <div class="top-bar">
        <a href="{{ route('posts.create') }}" class="btn btn-success">Ajouter Post</a>
    </div>

    @foreach($posts as $post)
        <div class="container post-card">
            <div class="card-head h-25">
               <img src="{{ asset('storage/' . ($post->image ?? 'images/DefaultImage.jpg')) }}" alt="{{ $post->titre }}" />
>
            </div>
            <div class="post-info">
                <h3>Titre: {{ $post->titre }}</h3>
                <h4>Contenu: {{ $post->content }}</h4>
                <h5>Catégorie: {{ $post->categorie->name }}</h5>
            </div>
            <div class="post-actions">
                <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary">Modifier</a>
                <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce post ?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    @endforeach
</body>
</html>
