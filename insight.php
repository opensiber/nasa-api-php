<?php

/* By: Mochammad Luthfi Rahmadi */

$apiKey = 'DEMO_KEY';
$apiUrl = "https://api.nasa.gov/insight_weather/?api_key={$apiKey}&feedtype=json&ver=1.0";

$response = file_get_contents($apiUrl);
$data = json_decode($response, true);

if ($data && isset($data['sol_keys'])) {
    $latestSol = end($data['sol_keys']);
    $weather = $data[$latestSol];
    echo "<h2 class='text-2xl font-semibold mb-4'>Data Cuaca Mars untuk Sol {$latestSol}</h2>";
    echo "<div class='p-4 bg-gray-100 rounded-lg shadow-md'>";
    echo "<p><strong>Suhu Maksimum:</strong> " . (isset($weather['AT']['mx']) ? "{$weather['AT']['mx']}&deg;C" : "Data tidak tersedia") . "</p>";
    echo "<p><strong>Suhu Minimum:</strong> " . (isset($weather['AT']['mn']) ? "{$weather['AT']['mn']}&deg;C" : "Data tidak tersedia") . "</p>";
    echo "<p><strong>Tekanan Atmosfer:</strong> " . (isset($weather['PRE']['av']) ? "{$weather['PRE']['av']} Pa" : "Data tidak tersedia") . "</p>";
    echo "<p><strong>Kecepatan Angin Rata-rata:</strong> " . (isset($weather['HWS']['av']) ? "{$weather['HWS']['av']} m/s" : "Data tidak tersedia") . "</p>";
    echo "</div>";
} else {
    echo "<p>Tidak dapat mengambil data cuaca Mars.</p>";
}
?>
