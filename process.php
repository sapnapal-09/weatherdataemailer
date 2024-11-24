<?php

include 'weather.php';
// userdefined function
function simpleWeatherDescription($weatherData) {
   
    $location = $weatherData['location']['name'] . ", " . $weatherData['location']['region'];
    $condition = $weatherData['current']['condition']['text'];
    $temp = $weatherData['current']['temp_c'] . "°C (" . $weatherData['current']['temp_f'] . "°F)";
    $humidity = $weatherData['current']['humidity'] . "%";
    $wind = $weatherData['current']['wind_kph'] . " km/h (" . $weatherData['current']['wind_dir'] . ")";
    $feelsLike = $weatherData['current']['feelslike_c'] . "°C (" . $weatherData['current']['feelslike_f'] . "°F)";

    // Build a simple description string
    return "The current weather in $location is $condition with a temperature of $temp. The humidity is $humidity, and the wind speed is $wind. It feels like $feelsLike.";
}



$weatherData = getWeatherData("Gujarat"); 

$weatherDescription = simpleWeatherDescription($weatherData);

echo "<h3>Generated Weather Description:</h3>";
echo "<p>" . $weatherDescription . "</p>";


//openapiai calling
//limit access of calling api

// include 'openai.php'; // Updated OpenAI function
// include 'weather.php'; // Weather API function

// $weatherData = getWeatherData("Gujarat"); // Fetch weather data
// // echo "<h3>Weather Data:</h3>";
// // echo "<pre>";
// // print_r($weatherData); // Print weather data for debugging
// // echo "</pre>";

// $weatherDescription = getWeatherDescription($weatherData); // Generate description
// echo "<h3>Generated Weather Description:</h3>";
// echo "<p>" . $weatherDescription . "</p>";

?>
