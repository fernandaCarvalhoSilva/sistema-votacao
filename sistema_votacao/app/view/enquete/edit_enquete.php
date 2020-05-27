<?php
$opcoes = new Opcoes();
$id = $opcoes->formatIdToEditOptions();
$listOpcoes = $opcoes->listOpcoes($id);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enquetes</title>
    <style>
        <?php
        include 'css/enquete.css';
        ?>
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
<div class="topbar">
    <div>
        <h1>Votação</h1>
    </div>
</div>
            <form class="vote" name="formuser" id="formulario" method="POST" action="/sistema_votacao/Enquete/votar">
                <?php foreach ($listOpcoes as $opcao):?>
                    <?php if ($opcao["status_enquete"] === "Em andamento"):?>
                        <input type="checkbox" name="checkbox" onclick="checkOnly(this.value)" id="<?php echo $opcao["id"]; ?>" value="<?php echo $opcao["id"]; ?>">
                    <?php endif;?>
                    <label><?php echo $opcao["opcao"]; ?> - <?php echo $opcao["votos"]?> Votos</label><br><br>
                <?php endforeach;?>

                <button type="submit" class="btn btn-simple">Finalizar</button>
            </form>


</body>
<script>
    function checkOnly(value){

        var checkbox = document.getElementsByName('checkbox');
        var i;

        for (i = 0; i < checkbox.length; i++) {
            if(checkbox[i].value !== value) checkbox[i].checked = false;
        }
    }
</script>
</html>