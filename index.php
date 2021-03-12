<?php
$url = "https://www.canalti.com.br/api/pokemons.json";
$getJson = file_get_contents($url);
$pokemons = json_decode($getJson, true);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-cquiv="X-UA-Compatible" content="IE=edge">
    <meta name="view" content="width=device-width, initial-scale=1">
    <link>
    <title>Pokemons</title>

</head>

<body>
    <section class="hero is-info is-small">
        <div class="hero-body">
            <div class="container has-text-centered">
                <p class="title">
                    Listagem de Pokemons
                </p>
                <p class="subtitle">
                    Consumo de API
                </p>
            </div>
        </div>
    </section>



    <section class="container">
        <?php
            if($pokemons['pokemon']){
                $i=0;
                foreach($pokemons['pokemon'] as $Pokemon){
                    $i++;
        ?>
        <?php if($i % 3 ==1) { ?>
        <div class="columns features">
            <?php } ?>
            <div class="column is-4">
                <div class="card">
                    <div class="card-iamge has-text-centered">
                        <figure class="image is-128x128">
                            <img src="<?=$Pokemon['img']?>" alt="<?=$Pokemon['name']?>" class="" data-target="modal-image2" />
                        </figure>
                    </div>
                    <div class="card-content has-text-centred">
                        <div class="content">
                            <h4><?=$Pokemon['name']?></h4>
                            <p><?=$Pokemon['height']?>.</p>
                            <p><?=$Pokemon['weight']?>.</p>
                            <?php
                                foreach($Pokemon['type'] as $tipo){
                                    echo "<p> {$tipo}</p>";
                                }
                                
                            
                            
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php if($i % 3 == 1) { ?>
        </div>
        <?php } } } else { ?>
        <strong> Nenhum Pokemon retornado pela API</strong>
        <?php } ?>
    </section>
</body>

</html>
