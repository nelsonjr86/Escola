<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
        <table class="table table-bordered table-responsive">    
            <form method="post" action="add.php"> 

<?php
require_once('header.php');
require_once('connection.php');

    $sql = "SELECT * FROM alunos";//$tabela";
    $sth = $pdo->query($sql);
    $numfields = $sth->columnCount();
        
    for($x=0;$x<$numfields;$x++){
        $meta = $sth->getColumnMeta($x);
        $field = $meta['name'];
?>
        <tr><td><b><?=ucfirst($field)?></td><td><input type="text" name="<?=$field?>"></td></tr>

<?php
    }
?>
            <tr><td></td><td><input class="btn btn-primary" name="enviar" type="submit" value="Cadastrar">&nbsp;&nbsp;&nbsp;
            <input class="btn btn-warning" name="enviar" type="button" onclick="location='alunos.php'" value="Voltar"></td></tr>
            </form>
        </table>
        </div>
    </div>
</div>

<?php

if(isset($_POST['enviar'])){
$nome_completo = $_POST['nome_completo'];
$matricula = $_POST['matricula'];
$situacao_aluno = $_POST['situacao_aluno'];
$Cep = $_POST['Cep'];
$curso = $_POST['curso'];
$imagem = $_POST['imagem'];

   try{
       $stmte = $pdo->prepare("INSERT INTO alunos (nome_completo, matricula, situacao_aluno,Cep, curso, imagem) VALUES (?,?,?,?,?,?)");
       $stmte->bindParam(1, $nome_completo , PDO::PARAM_STR);
       $stmte->bindParam(2, $matricula , PDO::PARAM_STR);
       $stmte->bindParam(2, $situacao_aluno , PDO::PARAM_STR);
       $stmte->bindParam(2, $Cep , PDO::PARAM_STR);
       $stmte->bindParam(2, $curso , PDO::PARAM_STR);
       $stmte->bindParam(2, $imagem , PDO::PARAM_STR);
       $executa = $stmte->execute();
 
       if($executa){
           echo 'Dados inseridos com sucesso';
		   header('location: alunos.php');
       }
       else{
           echo 'Erro ao inserir os dados';
       }
   }
   catch(PDOException $e){
      echo $e->getMessage();
   }
}
require_once('footer.php');
?>

