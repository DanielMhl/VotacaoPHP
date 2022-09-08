
<?php
require_once('app/Models/Votante.php');
require_once('app/Controllers/ControllerVotante.php');

$votanteDao = new ControllerVotante();
if(!empty($_POST['nome']) && !empty($_POST['cpf']) && !empty($_POST['idade'])  && !empty($_POST['voto'])){
$votante = new Votante($_POST['nome'], $_POST['cpf'], $_POST['idade'], $_POST['voto']);
    
$votante->validarDados();

/* if (empty($usuario->erro)) {
    if ($usuario->getMsg() == "O CPF deve ser um número") {
        $class = "alert-danger";
    } elseif ($usuario->getMsg() == "Idade inválida!") {
        $class = "alert-danger";
    } elseif ($usuario->getMsg() == "Escolha um candidato!") {
        $class = "alert-danger";
    } else {
        $class = "alert-danger";
    }
*/
    $votanteDao->createVotante($votante);


}
?>

<!DOCTYPE html>
<html lang="pt-Br">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema De Votação</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/animate.min.css"/>
    <link rel="stylesheet" href="css/styles.css"/>

</head>

<body class="bg-success p-2 bg-opacity-75" id="index">
    
    <div class="container border border-2 rounded-4 p-4 bg-white mb-5 animate__animated animate__fadeInLeft" style="max-width: 450px;">
        
        <form method="post">
            <h1 class="mb-4 text-center">Votação</h1>
            <div class="">
                <div class="mb-3 bs-success">
                    <label for="nome" class="form-label fw-semibold">Nome do eleitor: </label>
                    <input type="text" name="nome" class="form-control form-control-lg bg-dark bg-opacity-10" value="" required>
                </div>
                <div class="mb-3">
                    <label for="cpf" class="form-label fw-semibold">CPF: </label>
                    <input type="text" name="cpf" class="form-control form-control-lg bg-dark bg-opacity-10" value="" required>
                </div>
                <div class="mb-3">
                    <label for="idade" class="form-label fw-semibold">Idade: </label>
                    <input type="text" name="idade" class="form-control form-control-lg bg-dark bg-opacity-10" value="" required>
                </div>
                <div>
                    <div class="mb-3 ">
                        <label for="gates">
                        <img class="rounded-2" src="images/gates.PNG" alt="Bill Gates" style="width: 35%">
                        <input type="radio" name="voto" id="gates" value="1111">Bill Gates
                        </label>
                    </div>
                    <div class="mb-3">
                        <label for="zuck">
                        <img class="rounded-2" src="images/zuck.PNG" alt="Mark Zuckerberg" style="width: 35%">
                        <input  type="radio" name="voto" id="zuck" value="2222">Mark Zuckerberg
                       </label>
                    </div>
                    <div class="d-grid mt-3">
                    <input type="submit" value="Votar" class="btn btn-primary btn-SL">
                    </div>
                </div>
                <?php if(isset($usuario) && empty($usuario->erro)){  ?>
            <div class="alert text-center fs-4 <?php echo $class ?>" role="alert">
                <span class="d-block fw-bold">IMC: <?php echo round($usuario->getErro()); ?></span>
                <span><?php echo $usuario->getMsg();  ?></span>
            </div>
            <?php }?>
            </form>
        </div>
    </div>
    <a class="button " href="relatorio.php" target="_blank" style="max-width:100% ;">Relátorio</a>



    

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>