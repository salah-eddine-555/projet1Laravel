<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Document</title>
    <style>
        a{
            text-decoration: none;
            color: white;
        }
    </style>
</head>
<body>
        <div class="container mt-5">
            <h2>Modifier Post</h2>
            <hr>
            <form action="{{ route('posts.update', $post) }}" class="mt-5" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Titre :</label>
                        <input type="text" name="titre" class="form-control" value="{{$post->titre}}" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Content :</label>
                    <input type="text" name="content" class="form-control" value="{{$post->content}}">
                </div>
            <select name="categorie_id" class="form-select" aria-label="Default select example">
                    <option value="{{$post->categorie->name}}" selected>{{$post->categorie->name}}</option>
                    @foreach($categories as $categorie)
                        <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                    @endforeach
                </select>
                <div class="mt-4 w-100">
                    <button type="submit" class="btn btn-primary w-25">Modifier</button>
                    <button class="btn btn-secondary w-25"><a href="{{ route('posts.index') }}">Retour</a></button>
                </div>
            
            </form>
        </div>
    
</body>
</html>