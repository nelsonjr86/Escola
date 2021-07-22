<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
        <table class="table table-bordered table-responsive">    
            <form method="post" action="add.php"> 

<?php
require_once('header.php');
require_once('connection.php');


    $sql = "SELECT * FROM cursos";//$tabela";
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
            <input class="btn btn-warning" name="enviar" type="button" onclick="location='cursos.php'" value="Voltar"></td></tr>
            </form>
        </table>
        </div>
    </div>
</div>

<?php

if(isset($_POST['enviar'])){
$nome_curso = $_POST['nome_curso'];
$codigo = $_POST['codigo'];

   try{
       $stmte = $pdo->prepare("INSERT INTO cursos (nome_curso,codigo) VALUES (?,?)");
       $stmte->bindParam(1, $nome_curso , PDO::PARAM_STR);
       $stmte->bindParam(2, $codigo , PDO::PARAM_STR);
       $executa = $stmte->execute();
 
       if($executa){
           echo 'Dados inseridos com sucesso';
		   header('location: index.php');
       }
       else{
           echo 'Erro ao inserir os dados';
       }
   }
   catch(PDOException $e){
      echo $e->getMessage();
   }
}
require_once('../footer.php');
?>

