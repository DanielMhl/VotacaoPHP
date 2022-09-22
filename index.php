<?php
require_once('app/Models/Votante.php');
require_once('app/Controllers/ControllerVotante.php');

$votanteDao = new ControllerVotante();
if (!empty($_POST['nome']) && !empty($_POST['cpf']) && !empty($_POST['idade'])  && !empty($_POST['voto'])) {
    $votante = new Votante($_POST['nome'], $_POST['cpf'], $_POST['idade'], $_POST['voto']);

    $votante->validarDados();

    if (empty($votante->erro)) {
        $class = "alert-success";
        $votanteDao->createVotante($votante);
        
    }else {
        $class = "alert-danger";
    }
    
}   

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema De Votação</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/animate.min.css" />
    <link rel="stylesheet" href="css/styles.css" />

</head>

<body>
    <div class="container border border-2 rounded-4 p-4 mt-2 bg-white animate__animated animate__fadeInLeft" style="max-width: 400px;">
        <form method="post" id="votacao">
            <h1 class="mb-4 text-center">Votação</h1>
            <div class="row">
                <div class="mb-3 bs-success">
                    <label for="nome" class="form-label fw-semibold">Nome do eleitor: </label>
                    <input type="text" name="nome" class="form-control form-control-lg bg-dark bg-opacity-10" value="" required>
                </div>
                <div class="mb-3">
                    <label for="cpf" class="form-label fw-semibold">CPF: </label>
                    <input type="text" name="cpf" class="form-control form-control-lg bg-dark bg-opacity-10" value="" required placeholder="Somente números" maxlength="11" minlength="11">
                </div>
                <div class="mb-3">
                    <label for="idade" class="form-label fw-semibold">Idade: </label>
                    <input type="text" name="idade" class="form-control form-control-lg bg-dark bg-opacity-10" value="" required>
                    <div class="mt-4">
                        <div class="mb-3 ">
                            <label for="gates" class="fs-5 fw-semibold">
                                <img class="rounded-2" src="images/gates.PNG" alt="Gates" style="max-width:31%;">
                                <input type="radio" name="voto" id="gates" value="111" required> Bill Gates
                            </label>
                        </div>
                        <div>
                            <label for="zuck" class="fs-5 fw-semibold">
                                <img class="rounded-2" src="images/zuck.PNG" alt="Zuck" style="max-width:31%;">
                                <input type="radio" name="voto" id="zuck" value="222" required> Mark Zuckerberg
                            </label>
                        </div>
                        <div class="d-grid mt-4">
                            <input type="submit" value="Votar" class="btn btn-primary btn-lg mb-3">
                        </div>
                    </div>
                    <?php if (isset($votante) && empty($votante->erro)) {  ?>
                        <div class="alert text-center fs-4 <?php echo $class ?>" role="alert">
                            <span><?php echo $votante->getMsg(); ?></span>
                        </div>
                    <?php } ?>
        </form>
    </div>
    </div>
    </div>
    <div class="container text-center mb-3 mt-3 " style="max-width: 450px;">
        <a class="btn btn-primary btn-lg rounded-2 mb-3" href="relatorio.php" target="_blank">Relátorio</a>
    </div>
    <script src="js/bootstrap.bundle.min.js">
       if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
     
    </script>


</body>

</html>