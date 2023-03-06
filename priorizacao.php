<link href="./assets/bootstrap.min.css" rel="stylesheet">
<?php 
require_once "alteraPrioridade.php";
require_once "protect.php";
require_once "queries.php";
verificaIntersolid($_SESSION['id']);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prioriza - <?php echo $_SESSION['usuario'] ?></title>
    <link rel="stylesheet" href="assets/styles.css">
    <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon"/>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <link href="../assets/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<header class="container-fluid d-flex justify-content-center mb-3">
        <nav class="navbar">
        <h1 class="display-5 p-3">Priorização de Tarefas<img src="./assets/Logo.png" alt="logo"></h1>
        </nav>
    </header>
    <div class="container mt-5">
    <div class="row">
    <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb" class="col d-flex justify-content-start ">
                <ol class="breadcrumb fs-5">
                    <li class="breadcrumb-item"><a href="alterarSenha.php">Alterar Senha</a></li>
                    <li class="breadcrumb-item active">Home</li>
                </ol>
    </nav>
            <div class="col d-flex justify-content-end ">
                <span>
                    Você está logado como <span class="text-uppercase"><?php echo $_SESSION['usuario'] ?></span><a onclick="return confirm('Deseja realmente sair do sistema?')" class="btn btn-sm btn-danger ms-3" href="sair.php">Sair</a>
                </span>
            </div>
        </div>
                <table class="table table-striped table-sm shadow p-3 mb-5">
                    <thead class="table-warning align-middle ">
                            <td>Prioridade</td> 
                            <td>Cliente</td>
                            <td>Chamado</td>
                            <td>Tarefa</td>
                            <td>Titulo</td>
                            <td>Natureza</td>
                            <td>Abertura</td>
                            <td>Responsável</td>
                            <td>Estágio</td> 
                            <td>V.Liberação - Previsão</td>
                    </thead>
                    <tbody>
                            <?php 
                                while($Tarefa = $resulttarefas->fetch(PDO::FETCH_ASSOC)) {
                                    
                                    //Query para pegar dataprevisaoliberacao
                                    
                                    $previsao = "SELECT VerDataPrevLib as dataprev FROM tipoversao
                                    WHERE
                                        proid = 1
                                    AND
                                        versao = '" . $Tarefa['Versaolib'] . "'"; $resultprevisao =            
                                            $conn->prepare($previsao);
                                            $resultprevisao->execute();
                                            $DataPrev = $resultprevisao->fetch(PDO::FETCH_ASSOC);



                                    echo '
                                        <tr data-index="'.$Tarefa['TarefaID'].'" data-position="'.$Tarefa['Prioridade'].'">
                                            <td>'.$Tarefa['Prioridade'].'</td>
                                            <td>'.$Tarefa['Cliente'].'</td>   
                                            <td>'.$Tarefa['Chamado'].'</td>   
                                            <td>'.$Tarefa['TarefaID'].'</td>   
                                            <td>'.$Tarefa['Titulo'].'</td>   
                                            <td>'.$Tarefa['Natureza'].'</td>   
                                            <td>'.date("d/m/Y", strtotime($Tarefa['Abertura'])).'</td>   
                                            <td>'.$Tarefa['Responsavel'].'</td>   
                                            <td>'.$Tarefa['Estagio'].'</td> 
                                            <td>'.$Tarefa['Versaolib'] . " - " . $DataPrev['dataprev'] = isset($DataPrev['dataprev']) ? date("d/m/Y", strtotime($DataPrev['dataprev'])) : '';'</td> 
                                        </tr>  
                                    ';
                                }
                            ?>
                            
                                                                    
                    </tbody>
                </table>
            </div>
</body>
</html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
<script src="./js/scripts.js"></script>
