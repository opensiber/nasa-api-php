<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Aplikasi Interaktif NASA</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4 text-center">Aplikasi Interaktif NASA</h1>
        <nav class="mb-6">
            <ul class="flex justify-center space-x-4">
                <li><a href="index.php?page=apod" class="text-blue-500 hover:text-blue-700">Astronomy Picture of the Day</a></li>
                <li><a href="index.php?page=neows" class="text-blue-500 hover:text-blue-700">Asteroid Terdekat (NeoWs)</a></li>
                <li><a href="index.php?page=insight" class="text-blue-500 hover:text-blue-700">Data Cuaca Mars (InSight)</a></li>
            </ul>
        </nav>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <?php
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                if (file_exists($page . '.php')) {
                    include($page . '.php');
                } else {
                    echo "<p>Halaman tidak ditemukan.</p>";
                }
            } else {
                echo "<p>Selamat datang di Aplikasi Interaktif NASA. Pilih fitur dari menu di atas.</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>
