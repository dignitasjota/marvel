<?php    
    //obtiene el comic a mostrar de la URL
    $comic = $_GET["id"];

    //no muestra los warnings
    error_reporting(0);

    //obtiene el comic de la API
    $comic_url = "https://gateway.marvel.com:443/v1/public/comics/" . $comic . "?ts=1&apikey=537f732abb59d210e88030733b31298a&&hash=06f30a887940628f6dfe5146cee51452";
    $comic_json = file_get_contents($comic_url);
    $comic_array = json_decode($comic_json, true);
    
    //Genera una num aleatorio entre el nº de imagenes del comic
    $imagen_aleatoria = rand(0, count($comic_array["data"]["results"][0]["images"])-1);
    $imagen_comic = $comic_array["data"]["results"][0]["images"][$imagen_aleatoria]["path"] . "." . $comic_array["data"]["results"][0]["images"][$imagen_aleatoria]["extension"];


include_once("header.html");
?>


<div class="container">
    <div class="row">
        <div class="card" style="width: 50%;">
            <img class="card-img-top" src="<?php echo $imagen_comic; ?>" alt="<?php echo $comic_array["data"]["results"][0]["title"] ?>">
            <div class="card-body">
                <h5 class="card-title"><?php echo $comic_array["data"]["results"][0]["title"] ?></h5>
                <p class="card-text"><?php echo $comic_array["data"]["results"][0]["description"] ?></p>
                <a href="<?php echo $comic_array["data"]["results"][0]["urls"][0]["url"]; ?>" class="btn btn-primary" target="_black">Ir a la URL</a>
            </div>
        </div>      
    </div>        
</div>


<?php include_once("footer.html"); ?>