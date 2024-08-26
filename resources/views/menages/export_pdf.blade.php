<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Ménages</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Liste des Ménages</h1>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                {{-- <th>Email</th> --}}
                <th>Contact</th>
                <th>Secteur</th>
                <th>Code</th>
                <th>Type de Ménage</th>
                <th>Localisation</th>
                <th>Date d'Abonnement</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menages as $menage)
                <tr>
                    <td>{{ $menage->user->name }}</td>
                    {{-- <td>{{ $menage->user->email }}</td> --}}
                    <td>{{ $menage->user->contact }}</td>
                    <td>{{ $menage->secteur->nomSecteur }}</td>
                    <td>{{ $menage->code }}</td>
                    <td>{{ $menage->type_menage }}</td>
                    <td>
                        {{ json_decode($menage->localisation)->latitude }}<br>
                        {{ json_decode($menage->localisation)->longitude }}
                    </td>
                    {{-- <td>{{ }}</td> --}}n
                    <td>{{ $menage->date_abonnement }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
