<?php
// api/config.php

// 1. Define your global community metadata elements
define('BRAND_NAME', 'TechForge Community');
define('BRAND_TAGLINE', 'Learn. Build. Innovate. Collaborate.');

// 2. PASTE YOUR GOOGLE SHEET WEB APP URL HERE:
define('GOOGLE_API_URL', 'https://script.google.com/macros/s/AKfycbxs4WPytsG9Ik_HUOIY3ZjO2y_G2J9jUPlxWBPOr5cwXsIF22LcsrL7Oau2sIsoC53H/exec');

/**
 * Fetch dynamic data layers directly out of Google Sheets
 */
function get_community_data() {
    $target_url = GOOGLE_API_URL . "?action=get_data";
    
    // Set up a quick timeout limit wrapper so the page never hangs
    $options = [
        "http" => [
            "method" => "GET",
            "timeout" => 5,
            "header" => "User-Agent: VercelPHP-App\r\n"
        ]
    ];
    
    $context = stream_context_create($options);
    $response = @file_get_contents($target_url, false, $context);
    
    if ($response === FALSE) {
        // Fallback safety arrays if the API call fails or encounters an outage
        return [
            "name" => BRAND_NAME,
            "tagline" => BRAND_TAGLINE,
            "values" => ["Dedication", "Consistency", "Curiosity"],
            "team" => [],
            "projects" => []
        ];
    }
    
    $data = json_decode($response, true);
    
    return [
        "name" => BRAND_NAME,
        "tagline" => BRAND_TAGLINE,
        "values" => $data['values'] ?? [],
        "team" => $data['team'] ?? [],
        "projects" => $data['projects'] ?? []
    ];
}

// Automatically instantiate the data tree variable globally
$community = get_community_data();
