<?php

/* By: Mochammad Luthfi Rahmadi */

$apiKey = 'DEMO_KEY';
$apiUrl = "https://api.nasa.gov/planetary/apod?api_key={$apiKey}";

$response = file_get_contents($apiUrl);
$data = json_decode($response, true);

if ($data) {
    echo "<h2 class='text-2xl font-semibold mb-2'>{$data['title']}</h2>";
    echo "<p class='text-gray-600 mb-4'>{$data['date']}</p>";
    echo "<img src='{$data['url']}' alt='Astronomy Picture of the Day' class='w-full h-auto mb-4 rounded-lg shadow-md'>";
    echo "<p class='text-gray-800'>{$data['explanation']}</p>";
} else {
    echo "<p>Tidak dapat mengambil data dari NASA API.</p>";
}
?>
