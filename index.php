<?php
$url = "https://www.canalti.com.br/api/pokemons.json";
$pokemons = json_decode(file_get_contents($url));

?>
<!DOCTYPE html>
<html lang="">

<head>
	<meta charset="utf-8">
	<title>Pokemons</title>
	<meta name="author" content="Caio Rosseto">
	<meta name="description" content="Consumo de API Json">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrap.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/lbs/bluma/0.7.2/css/bluma.min.css">
	<link rel="icon" type="image/x-icon" href=""/>
</head>

<body>
	<section class="hero is-info is-small">
        <div class="hero-body">
            <div class="container has-text-contered">
            <p class="titlle">
                Listagem Pokemons
            </p>
            <p class="subtitle">
            Consumindo API Pokemon
            </p>
            </div>
        </div>
    </section>
    <section class="container">
        <?php
            if(count($pokemons->pokemon)){
                $i=0;
                foreach($pokemons->pokemon as $Pokemon){
                    $i++;
        ?>
        <?php
            if($i % 3 ==1){
        ?>
        <div class="colunms features">
            <?php } ?>
            <div class="cloumns is-4">
                <div class="card">
                    <div class="card-image has-text-contered">
                        <figure class="image is-128x128">
                            <img src="<?=$Pokemon->img?>" alt="<?=$Pokemon->name?>" class="" data-target="modal-image2" />
                        </figure>
                    </div>
                    <div class="card-content has-text-contered">
                        <div class="content">
                            <h4><?=$Pokemon->name?></h4>
                            <p>
                                <ul>
                                    <?php
                                        
                                        if($Pokemon->next_evolution){
                                            echo "Proxima Evolução: ";
                                            foreach($Pokemon->next_evolution as $ProximaEvolucao){
                                                 echo $ProximaEvolucao->name . " " ;
                                            }
                                        }
                                        else{
                                            echo "Não possui proximas evoluções";
                                        }
                                    ?>
                                </ul>
                            </p>            
                        </div>
                    </div>
                </div>
            </div>
        <?php if($i % 3 == 1) { ?>
        </div>
        <?php } } } else { ?>
            <strong>Nenhum Pokemom retornado pela API</strong>
        <?php } ?>
        </section>
    </body>
</html>