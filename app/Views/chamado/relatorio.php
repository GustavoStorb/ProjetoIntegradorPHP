<?php include('./app/Layouts/header.php');

if(isset($_GET['id'])){
   $chamadoModel = new \App\Models\Chamado();
   $chamado = $chamadoModel->selectByID($_GET['id']);
   $numeroChamado = $chamado[0];
   $chamadoData = date_create($chamado[6]);
   $datas = date_format($chamadoData, "d/m/Y");
   
   $userModel = new \App\Models\Usuario();
   $funcionario = $userModel->selectByID($chamado[4]);
   $funcName = $funcionario[1];
   
   $vehicleModel = new \App\Models\Vehicle();
   $veiculo = $vehicleModel->selectByID($chamado[5]);
   $veiculoTipo = $veiculo[1];
   $veiculoAno = $veiculo[2];
   $veiculos = $veiculoTipo." ($veiculoAno)";
   
   $totalCo2 = ($chamado[3] * $veiculo[3]) * 0.73 * 0.75 * 3.7;
}

if(isset($_GET['ids'])){
   $chamadoModel = new \App\Models\Chamado();
   $userModel = new \App\Models\Usuario();
   $vehicleModel = new \App\Models\Vehicle();
   
   $ids = explode(',', $_GET['ids']);
   $numeroChamado = 0;
   $datas = array();
   $funcName = '';
   $veiculos = '';
   $veiculoAno = '';
   $co2 = array();
   $distanciaTotal = 0;
   foreach ($ids as $id){
      $chamado = $chamadoModel->selectByID($id);
      $numeroChamado++;
      $distanciaTotal += $chamado[3];
      $chamadoData = date_create($chamado[6]);
      $datas[] = $chamado[6];
      $funcionario = $userModel->selectByID($chamado[4]);
      $funcName .= $funcionario[1] . ', ';
      $veiculo = $vehicleModel->selectByID($chamado[5]);
      $veiculos .= $veiculo[1] . '('.$veiculo[2].'), ';
      $co2[] = ($chamado[3] * $veiculo[3]) * 0.73 * 0.75 * 3.7;
   }
   $totalCo2 = array_sum($co2);
   
   usort($datas, function($a, $b) {
      $dateTimestamp1 = strtotime($a);
      $dateTimestamp2 = strtotime($b);
  
      return $dateTimestamp1 < $dateTimestamp2 ? -1: 1;
  });

  $minDate = $datas[0];
  $maxDate = $datas[count($datas) - 1];

  $minDate = date_create($minDate);
  $maxDate = date_create($maxDate);
  $minDate = date_format($minDate, "d/m/Y");
  $maxDate = date_format($maxDate, "d/m/Y");
}
?>

<!DOCTYPE html>
<html lang="en">
   <title>Projeto Integrador - Consulta de Chamado</title>
   <body>
      <div class="mt-30">
         <form class="cadastro-form" method="POST">
             <div class="text-center font-white font-10">
                <h1 class="font-40" style="margin-bottom: 45px;">Relatorio do Chamado</h1>
                <?php if(isset($_GET['id'])){ ?>
                  <h1>N° do chamado: <?php echo $numeroChamado; ?></h1>
                <?php } ?>
                <?php if(isset($_GET['ids'])){ ?>
                  <h1>N° de chamados: <?php echo $numeroChamado; ?></h1>
                <?php } ?>
                <?php if(isset($_GET['id'])){ ?>
                  <h1>Data do chamado: <?php echo $datas; ?></h1>
                  <h1>Funcionario Associado: <?php echo $funcName; ?></h1>
                  <h1>Veiculo Utilizado: <?php echo $veiculos; ?></h1>
                <?php } ?>

                <?php if(isset($_GET['ids'])){ ?>
                  <h1>Data do chamado: <?php echo $minDate." até ".$maxDate; ?></h1>
                  <h1>Distancia total: <?php echo number_format($distanciaTotal, 2); ?> km</h1>
                  <h1>Media de distancia: <?php echo number_format(($distanciaTotal / count($ids)), 2); ?> km</h1>
                  <h1>Media de co2: <?php echo number_format(($totalCo2 / count($ids)), 2); ?></h1>
                <?php } ?>
                <h1>Total de co2 utilizado: <?php echo number_format($totalCo2, 2); ?></h1>
                <button onclick="location.href = '/chamado/find'" class="btn-cadastro active bg-red br-6">
                     VOLTAR
                  </button>
            </div>
         </form>
      </div>
   </body>
</html>