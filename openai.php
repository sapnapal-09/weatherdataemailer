<?php 


function getWeatherDescription($weatherData) {
    $apiKey = "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"; // Replace with your OpenAI API key
    $url = "https://api.openai.com/v1/chat/completions";

    $messages = [
        [
            "role" => "system",
            "content" => "You are a helpful assistant that generates human-readable weather descriptions.",
        ],
        [
            "role" => "user",
            "content" => "Describe the weather conditions: " . json_encode($weatherData),
        ],
    ];

    $data = [
        "model" => "gpt-3.5-turbo",
        "messages" => $messages,
        "max_tokens" => 100,
    ];

    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Content-Type: application/json",
        "Authorization: Bearer $apiKey",
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        die("cURL Error: " . curl_error($ch));
    }

    curl_close($ch);

    $responseData = json_decode($response, true);

  
    // echo "<pre>";
    // print_r($responseData);
    // echo "</pre>";

    return $responseData['choices'][0]['message']['content'] ?? "No description available.";
} 

?>
