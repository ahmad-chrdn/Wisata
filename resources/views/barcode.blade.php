<!DOCTYPE html>
<html>

<head>
    <title>Barcode Presensi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 80px;
        }

        .barcode-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .barcode-container img {
            margin-bottom: 20px;
        }

        .barcode-text {
            color: red;
        }
    </style>
</head>

<body>
    <div class="barcode-container">
        <img src="data:image/png;base64,{{ $qrCode }}" alt="QR Code">
        <p class="barcode-text">Scan barcode untuk melakukan absensi</p>
    </div>
</body>

</html>
