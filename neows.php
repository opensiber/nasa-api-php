<?php
$apiKey = 'DEMO_KEY';
$today = date('Y-m-d');
$apiUrl = "https://api.nasa.gov/neo/rest/v1/feed?start_date={$today}&end_date={$today}&api_key={$apiKey}";

$response = file_get_contents($apiUrl);
$data = json_decode($response, true);

if ($data && isset($data['near_earth_objects'][$today])) {
    echo "<h2 class='text-2xl font-semibold mb-4'>Asteroid Terdekat pada {$today}</h2>";
    echo "<ul class='space-y-2'>";
    foreach ($data['near_earth_objects'][$today] as $asteroid) {
        echo "<li class='p-4 bg-gray-100 rounded-lg shadow-md'>";
        echo "<p><strong>Nama:</strong> {$asteroid['name']}</p>";
        echo "<p><strong>Diameter:</strong> " . round($asteroid['estimated_diameter']['meters']['estimated_diameter_max'], 2) . " meter</p>";
        echo "<p><strong>Kecepatan:</strong> " . round($asteroid['close_approach_data'][0]['relative_velocity']['kilometers_per_hour'], 2) . " km/jam</p>";
        echo "<p><strong>Jarak:</strong> " . round($asteroid['close_approach_data'][0]['miss_distance']['kilometers'], 2) . " km</p>";
        echo "</li>";
    }
    echo "</ul>";
} else {
    echo "<p>Tidak ada data asteroid terdekat yang tersedia untuk hari ini.</p>";
}
?>
