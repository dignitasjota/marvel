<?php
    error_reporting(0);

    $marvel_url = "https://gateway.marvel.com:443/v1/public/characters/1009718/comics?ts=1&apikey=537f732abb59d210e88030733b31298a&&hash=06f30a887940628f6dfe5146cee51452";
    $marvel_json = file_get_contents($marvel_url);
    $marvel_array = json_decode($marvel_json, true);
    
    $items = $marvel_array["data"]["count"];
    //var_dump($marvel_array["data"]["results"]);
?>
