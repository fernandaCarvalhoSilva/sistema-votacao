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
        <h1>Cadastro de Enquetes</h1>
    </div>
</div>

<form class="formuser" name="formuser" id="formulario" method="POST" action="cadasterEnquete">

    <div class="form-row">
        <div class="form-group input-text input-group">
            <input type="text" class="input-style" id="titulo" name="titulo" placeholder="Titulo" required="true">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group input-text input-group">
            <input type="text" class="input-style" id="descricao" name="descricao" placeholder="Descrição">
        </div>
    </div>

    <div class="form-row">
        <div id="date" class="form-group date input-date input-group">
            <label class="input-style-label">Data de início</label>
            <input class="input-style" type="date" id="dataIni" name="dataIni">
        </div>
        <div id="date" class="form-group date input-date input-group">
            <label class="input-style-label">Data de fim</label>
            <input class="input-style" type="date" id="dataFim" name="dataFim">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group input-text input-group">
            <input type="text" class="input-style" id="opcao" name="opcao1" placeholder="Opção 1" required="true">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group input-text input-group">
            <input type="text" class="input-style" id="opcao" name="opcao2" placeholder="Opção 2" required="true">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group input-text input-group">
            <input type="text" class="input-style" id="opcao" name="opcao3" placeholder="Opção 3" required="true">
        </div>
    </div>

    <button type="submit" class="btn btn-simple btn-cadaster">Cadastrar</button>


</form>
</body>
</html>