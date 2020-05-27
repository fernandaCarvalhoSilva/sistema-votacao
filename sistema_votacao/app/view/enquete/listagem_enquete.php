<?php
$enquetes = new Enquete();
$listEnquetes = $enquetes->listEnquetes();
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
        <h1>Sistema de Votação</h1>
    </div>
</div>
<!-- Page Wrapper -->
<div id="wrapper">
    <div id="content-wrapper" class="d-flex flex-column">
        <div>
            <h2>Enquetes disponíveis</h2>
        </div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">Titulo</th>
                <th scope="col">Status</th>
                <th scope="col">Data de início</th>
                <th scope="col">Data de fim</th>
                <th scope="col">Ação</th>
            </tr>
            </thead>
            <?php foreach ($listEnquetes as $enquete):?>
            <tbody>
            <tr>
                <td><?php echo $enquete['titulo'];?></td>
                <td><?php echo $enquete['status_enquete'];?></td>
                <td><?php echo date('d/m/Y', strtotime($enquete['data_inicio']));?></td>
                <td><?php echo date('d/m/Y', strtotime($enquete['data_fim']));?></td>
                <td>
                    <a href="enquete/edit/<?php echo $enquete['id'] ?>" class='btn btn-edit'>
                        <i class='fa fa-pencil'></i>
                    </a>
                    <a href="enquete/delete/<?php echo $enquete['id'] ?>" class='btn btn-trash'>
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
                <?php endforeach; ?>
            </tr>
            </tbody>
        </table>

        <div class="btn-create">
            <a href="Enquete/create" class='btn btn-simple'>Nova enquete</a>
        </div>
    </div>
</div>

</body>
</html>