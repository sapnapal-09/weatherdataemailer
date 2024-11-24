<?php
function getWeatherData($location) {
    $apiKey = "2a11bac150f54ed1a27155857242311";
    $url = "http://api.weatherapi.com/v1/current.json?key=$apiKey&q=$location&aqi=no";

    $response = file_get_contents($url);
    $data = json_decode($response, true);

    if (isset($data['error'])) {
        // Log or display the error message
        die("Error: " . $data['error']['message']);
    }

    return $data;
}


//$weatherData = getWeatherData("gujarat");
//print_r($weatherData);

?>
