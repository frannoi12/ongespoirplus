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
        <span>{{ $receipt_number ?? '_ _ _ _' }}</span>
        <label style="margin-left: 100px;">Date de Versement:</label>
        <span>{{ $payment_date ?? ' _ _ _ _ ' }}</span>
    </div>

    <!-- Payment Method Section -->
    <div class="section">
        <label>Mode de Paiement:</label>
        <span>Espèce [ ] T-Money [ ] Flooz [ ]</span>
    </div>

    <!-- Subscriber Reference Section -->
    <div class="section">
        <label>Réf Abonné:</label>
        <span>{{ $subscriber_ref ?? '____' }}</span>
        <label style="margin-left: 100px;">Quartier:</label>
        <span>{{ $subscriber_quarter ?? '____' }}</span>
    </div>

    <!-- Object Section -->
    <div class="object-section">
        <table>
            <thead>
                <tr>
                    <th>Objet</th>
                    <th>Montant Versé</th>
                    <th>Mode de Paiement</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>FCFA</td>
                    <td>{{ $amount ?? '____' }}</td>
                    <td>{{ $payment_mode ?? '____' }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Footer Section -->
    <div class="footer">
        <p>Nom et Signature de l'Agent: ________________________</p>
    </div>
</div>

</body>
</html>
