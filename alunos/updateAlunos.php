<?php require_once('header.php'); ?>
<style>

</style>
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <form method="post" action="">
                <table class="table table-bordered table-responsive table-hover">

<?php
require_once('connection.php');

$id=$_GET['id'];

$sth = $pdo->prepare("SELECT id,nome_completo, codigo from alunos WHERE id = :id");
$sth->bindValue(':id', $id, PDO::PARAM_STR); // No select e no delete basta um bindValue
$sth->execute();

$reg = $sth->fetch(PDO::FETCH_OBJ);

    $sql = "SELECT * FROM alunos";//$tabela";
    $sth = $pdo->query($sql);
    $numfields = $sth->columnCount();
        
    for($x=0;$x<$numfields;$x++){
        $meta = $sth->getColumnMeta($x);
        $field = $meta['name'];
?>
                <tr><td><b><?=ucfirst($field)?></td><td><input type="text" name="<?=$field?>" value="<?=$reg->$field?>"></td></tr>
<?php
}
?>
                <input name="cliente" type="hidden" value="<?=$cliente?>">
                <tr><td></td><td><input name="enviar" class="btn btn-primary" type="submit" value="Editar">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input name="enviar" class="btn btn-warning" type="button" onclick="location='alunos.php'" value="Voltar"></td></tr>
                </table>
            </form>
        </div>
    <div>
</div>
<?php

if(isset($_POST['enviar'])){
    $id = $_POST['id'];
    $nome_completo = $_POST['nome_completo'];
    $codigo = $_POST['codigo'];

    //$sql = "UPDATE $tabela SET nome = :nome, credito_liberado = :credito_liberado, email=:email, data_nasc=:data_nasc, cpf=:cpf WHERE cliente = :cliente";
    $sql = "UPDATE cursos SET nome_completo = :nome_completo, codigo = :codigo WHERE id = :id";
	$sth = $pdo->prepare($sql);
    $sth->bindParam(':id', $_POST['cliente'], PDO::PARAM_INT);
    $sth->bindParam(':nome_completo', $_POST['nome_completo'], PDO::PARAM_INT);   
    $sth->bindParam(':codigo', $_POST['codigo'], PDO::PARAM_INT);

   if($sth->execute()){
        print "<script>alert('Registro alterado com sucesso!');location='alunos.php';</script>";
    }else{
        print "Erro ao editar o registro!<br><br>";
    }
}
require_once('footer.php');
?>

