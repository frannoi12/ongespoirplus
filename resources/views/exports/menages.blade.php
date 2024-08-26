<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Secteur</th>
            <th>Tarif</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($menages as $menage)
            <tr>
                <td>{{ $menage->name }}</td>
                <td>{{ $menage->secteur->name }}</td>
                <td>{{ $menage->tariff->name }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
