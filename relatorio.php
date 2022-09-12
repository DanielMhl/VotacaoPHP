
<?php
require_once('app/Models/Votante.php');
require_once('app/Controllers/ControllerVotante.php');


$votanteDao = new ControllerVotante();
//$result = new Votos();
 
?> 


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css"/>

</head>
<body>


   <?php
  //  $query = "SELECT COUNT(voto) AS total_votos FROM votante WHERE voto='111'";
  //  $result=$conn->prepare($query);
  //  $result->execute();
    ?>

   <div class=" container border border-2 rounded-4 p-4 bg-white mb-3 mt-3" style="max-width: 350px;">
   <div class="row">
     <h2 class="mb-4 text-center">Contagem de votos</h2>
     <div class="col-sm">
     
        <img class="rounded-2" src="images/gates.PNG" alt="Gates" style="max-width:90%;" id="img">
        <p class="text-center fs-5"><?php // if($result->resultadoVoto()){ echo $queryVoto; } ?></p>
    </div>
    <div class="col-sm">
        <img class="rounded-2" src="images/zuck.PNG" alt="Zuck" style="max-width:90%;" id="imge">
        <p class="text-center fs-5"><?php echo 'Teste' ?></p>
     </div>
     </div>
   </div>
   <?php if($votanteDao->readVotante()){ ?>
        <div class="container">
            <h1 class="text-white">Relatório</h1>
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Idade</th>    
                        <th>Voto</th>    
                        <th>Data_Registro</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach($votanteDao->readVotante() as $votante){ ?>
                        <tr class="table-secondary">
                        <td> <?php echo $votante["nome"]; ?></td>
                        <td> <?php echo $votante["cpf"]; ?></td>
                        <td> <?php echo $votante["idade"]; ?></td>  
                        <td> <?php echo $votante["voto"]; ?></td>  
                        <td> <?php echo date ('d/m/Y', strtotime($votante["data_registro"])); ?></td>
                    <?php } ?>
                    </tr>
                </tbody>
            </table>
        </div>
    <?php } ?>
</body>
</html>