<?php
    //no muestra los warnings
    error_reporting(0);

    //obtiene el listado de comics del Heroe 1009718
    $marvel_url = "https://gateway.marvel.com:443/v1/public/characters/1009718/comics?ts=1&apikey=537f732abb59d210e88030733b31298a&&hash=06f30a887940628f6dfe5146cee51452";
    $marvel_json = file_get_contents($marvel_url);
    $marvel_array = json_decode($marvel_json, true);
    
    //el numero de comics a mostrar
    $items = $marvel_array["data"]["count"];


    //var_dump($marvel_array["data"]["results"]);
    
?>



<div class="container">
    <div class="row">
        <?php for($i = 0; $i <= $items; $i++){ 
            $thumbnail = $marvel_array["data"]["results"][$i]["thumbnail"]["path"] . "." . $marvel_array["data"]["results"][$i]["thumbnail"]["extension"]  ?>

            
                <div class="card col-md-4">
                    <a href="<?php echo "comic.php?id=" . $marvel_array["data"]["results"][$i]["id"] ?>" target="_blank" class="img-card" style="text-align:center;">
                        <img src="<?php echo $thumbnail ?>" alt="" class="img-thumbnail">
                    </a>
                    <div class="card-body">
                        <h6 class="card-title"><?php echo $marvel_array["data"]["results"][$i]["title"] ?></h6>
                    </div>
                </div>
            

        <?php } ?>
    </div>
</div>
