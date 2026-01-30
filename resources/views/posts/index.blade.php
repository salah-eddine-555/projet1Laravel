<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Liste des Posts</title>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            padding-top: 50px;
        }

        h1 {
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 40px;
            letter-spacing: -1px;
        }

        /* Barre de recherche/action */
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        /* Style des Cartes */
        .post-card {
            background: #ffffff;
            border: none;
            border-radius: 15px;
            padding: 0; /* On gère le padding via les colonnes internes */
            margin-bottom: 25px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            overflow: hidden; /* Pour que l'image respecte l'arrondi */
            display: flex;
            flex-direction: row;
            align-items: stretch;
        }

        .post-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        }

        /* Image à gauche */
        .post-image-container {
            width: 200px;
            min-height: 150px;
            overflow: hidden;
        }

        .post-image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Contenu au milieu */
        .post-info {
            flex-grow: 1;
            padding: 20px 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .post-info h3 {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 8px;
            color: #0f172a;
        }

        .post-info h4 {
            font-size: 0.95rem;
            color: #64748b;
            font-weight: 400;
            margin-bottom: 12px;
            line-height: 1.5;
        }

        .badge-category {
            background-color: #e2e8f0;
            color: #475569;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            display: inline-block;
            width: fit-content;
        }

        /* Boutons à droite */
        .post-actions {
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 10px;
            background-color: #fafbfc;
            border-left: 1px solid #f1f5f9;
        }

        .btn-custom {
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 600;
            padding: 8px 20px;
            transition: all 0.2s;
        }

        /* Responsive : Empiler sur mobile */
        @media (max-width: 768px) {
            .post-card {
                flex-direction: column;
            }
            .post-image-container {
                width: 100%;
                height: 200px;
            }
            .post-actions {
                flex-direction: row;
                border-left: none;
                border-top: 1px solid #f1f5f9;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="top-bar">
        <h1>Mes Publications</h1>
        <div class="filter-group">
            <form action="/filter" method="GET" class="d-flex align-items-center">
                <select name="category_id" class="form-select shadow-sm" style="border-radius: 8px; min-width: 200px;" onchange="this.form.submit()">
                    <option value="">Toutes les catégories</option>
                   
                    
                        <option>
                           categorie1
                        </option>
                
                </select>
            </form>
        </div>
        <a href="{{ route('posts.create') }}" class="btn btn-success btn-custom shadow-sm">+ Ajouter un Post</a>

    </div>

    @foreach($posts as $post)
        <div class="post-card">
            <div class="post-image-container">
               <img src="{{ asset('storage/' . ($post->image ?? 'images/DefaultImage.jpg')) }}" alt="{{ $post->titre }}">
            </div>

            <div class="post-info">
                <span class="badge-category mb-2">{{ $post->categorie->name }}</span>
                <h3>{{ $post->titre }}</h3>
                <h4>{{ Str::limit($post->content, 120) }}</h4> </div>

            <div class="post-actions">
                <a href="{{ route('posts.edit', $post) }}" class="btn btn-outline-primary btn-custom">Modifier</a>
                
                <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce post ?');" class="m-0">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger btn-custom w-100">Supprimer</button>
                </form>
            </div>
        </div>
    @endforeach
</div>

</body>
</html>