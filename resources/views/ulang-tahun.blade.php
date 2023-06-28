<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ucapan Selamat Ulang Tahun</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h1 {
            font-size: 30px;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Ucapan Selamat Ulang Tahun</h1>

        <form method="post" action="{{ route('store') }}">
            @csrf
            <label for="birthday">Masukkan Nama:</label>
            <input type="text" id="nama" name="nama">
            <label for="birthday">Masukkan tanggal ulang tahun:</label>
            <input type="date" id="birthday" name="birthday">
            <button type="submit">Submit</button>
        </form>

        <div id="message">
            @isset($message)
                <p>{{ $message }}</p>
            @endisset

            @isset($hadiah)
                <h2>Spin the Wheel</h2>
                <button onclick="spinWheel()">Spin</button>
                <div id="spinResult"></div>
            @endisset

        </div>
    </div>
    <script>
        function spinWheel() {
            var hadiah = @json($hadiah ?? []);
            if (hadiah.length === 0) {
                return;
            }
            var randomIndex = Math.floor(Math.random() * hadiah.length);
            var spinResult = document.getElementById('spinResult');
            spinResult.innerHTML = "<p>You won: " + hadiah[randomIndex].name + "</p>";
        }
    </script>
</body>
</html>
