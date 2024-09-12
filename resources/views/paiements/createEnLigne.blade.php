<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de Paiement</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9fafb;
            color: #333;
        }
        .container {
            max-width: 900px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .header h2 {
            font-size: 24px;
            color: #333;
        }
        .content h3 {
            font-size: 18px;
            margin-bottom: 10px;
        }
        .content p {
            margin: 5px 0;
        }
        .form-container {
            margin-top: 20px;
        }
        .form-container form {
            display: flex;
            flex-direction: column;
        }
        .form-container button {
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .form-container button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h2>Paiement</h2>
    </div>
    <div class="content">
        <h3>Détails de l'organisme</h3>
        <p>Nom : {{ $menage->user->name }}</p>
        <p>Organisme : {{ $menage->service->type_service }}</p>
        <p>Secteur : {{ $menage->secteur->nomSecteur }}</p>
        <p>Tarif : {{ $menage->tariff->montant }} F CFA - {{ $menage->tariff->designation }}</p>
    </div>
    <div class="form-container">
        <form action="{{ route('paiements.store', $menage->id) }}" method="POST">
            @csrf
            <input type="hidden" name="payment_method" value="mobileMoney">
            <input type="hidden" name="menage_id" value="{{ $menage->id }}">
            <input type="hidden" name="personnel_id" value="{{ Auth::user()->id }}">
            <button type="submit">Continuer</button>
        </form>
    </div>
</div>

</body>
</html>
