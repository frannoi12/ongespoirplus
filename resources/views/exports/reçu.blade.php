<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reçu de Paiement</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            margin: 0;
            padding: 0;
        }
        .receipt-container {
            border: 1px dashed #000;
            padding: 20px;
            width: 700px;
            margin: 0 auto;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h2 {
            margin: 0;
            font-size: 18px;
        }
        .header p {
            margin: 0;
            font-size: 14px;
        }
        .section {
            margin-bottom: 10px;
        }
        .section label {
            display: inline-block;
            width: 150px;
            font-weight: bold;
        }
        .section span {
            border-bottom: 1px dotted #000;
            padding: 2px 5px;
        }
        .object-section {
            margin: 20px 0;
        }
        .object-section table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .object-section th, .object-section td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        .object-section th {
            background-color: #f2f2f2;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="receipt-container">
    <!-- Header Section -->
    <div class="header">
        <h2>ONG ESPOIR PLUS</h2>
        <p>Tchawandar, route de Bassar, BP: 226-Togo</p>
        <p>Email: ong.espoirplus11@gmail.com | Tel: (+228) 70479664</p>
    </div>

    <!-- Receipt Number and Date Section -->
    <div class="section">
        <label>Reçu N°:</label>
        <span>{{ $liquide->id }}</span>
        <label style="margin-left: 100px;">Date de Versement:</label>
        <span>{{ now()->format('d/m/Y') }}</span>
    </div>

    <!-- Payment Method Section -->
    <div class="section">
        <label>Mode de Paiement:</label>
        <span>Espèce</span>
    </div>

    <!-- Subscriber Reference Section -->
    <div class="section">
        <label>Réf Abonné:</label>
        <span>{{ $liquide->paiement_id }}</span>
        <label style="margin-left: 100px;">Quartier:</label>
        <span>____</span>
    </div>

    <!-- Object Section -->
    <div class="object-section">
        <h3>Détails du Paiement</h3>
        <table>
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Quantité</th>
                    <th>Montant Unitaire</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Paiement en Liquidee</td>
                    <td>1</td>
                    <td>{{ $liquide->paiement->menage->tariff->montant }} FCFA</td>
                    <td>{{ $liquide->montant }} FCFA</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Amount in Words Section -->
    <div class="section">
        <label>Montant en Lettres:</label>
        <span>{{ $liquide->montant_lettre }}</span>
    </div>

    <!-- Footer Section -->
    <div class="footer">
        <p>Merci pour votre paiement!</p>
        <p>Signature:</p>
        <p>________________________</p>
    </div>
</div>

</body>
</html>
