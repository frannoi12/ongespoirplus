<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Ménages</title>
</head>
<body>
    <h1>Liste des Ménages</h1>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Adresse</th>
                <!-- Ajoute d'autres colonnes selon tes besoins -->
            </tr>
        </thead>
        <tbody>
            @foreach($menages as $menage)
                <tr>
                    <td>{{ $menage->nom }}</td>
                    <td>{{ $menage->adresse }}</td>
                    <!-- Ajoute d'autres colonnes selon tes besoins -->
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
