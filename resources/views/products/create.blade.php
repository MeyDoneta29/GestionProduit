<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un produit</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f5f5f5; padding: 20px; }
        .container { max-width: 500px; margin: 0 auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        h1 { color: #333; margin-bottom: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: 500; color: #333; }
        input, textarea { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; font-family: Arial; font-size: 14px; }
        input:focus, textarea:focus { outline: none; border-color: #0066cc; box-shadow: 0 0 0 3px rgba(0, 102, 204, 0.1); }
        textarea { resize: vertical; min-height: 80px; }
        .button-group { display: flex; gap: 10px; margin-top: 20px; }
        button { padding: 10px; border: none; border-radius: 4px; font-size: 14px; font-weight: 500; cursor: pointer; flex: 1; }
        .btn-submit { background: #007bff; color: white; }
        .btn-submit:hover { background: #0056b3; }
        .btn-cancel { background: #6c757d; color: white; text-decoration: none; display: flex; align-items: center; justify-content: center; }
        .btn-cancel:hover { background: #5a6268; }
        .alert { padding: 12px; margin-bottom: 15px; border-radius: 4px; }
        .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .alert-error { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .error-text { color: #dc3545; font-size: 12px; margin-top: 3px; }
        .required { color: #dc3545; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Ajouter un produit</h1>

        @if (session('success'))
            <div class="alert alert-success">
                ✓ {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-error">
                <strong>Erreurs :</strong>
                <ul style="margin: 8px 0 0 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nom <span class="required">*</span></label>
                <input type="text" id="name" name="name" required>
                @error('name') <div class="error-text">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description"></textarea>
                @error('description') <div class="error-text">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="price">Prix <span class="required">*</span></label>
                <input type="number" id="price" name="price"  required>
                @error('price') <div class="error-text">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="quantity">Quantité <span class="required">*</span></label>
                <input type="number" id="quantity" name="quantity" required>
                @error('quantity') <div class="error-text">{{ $message }}</div> @enderror
            </div>

            <div class="button-group">
                <button type="submit" class="btn-submit">Enregistrer</button>
                <a href="/" class="btn-cancel">Retour</a>
            </div>
        </form>
    </div>
</body>
</html>