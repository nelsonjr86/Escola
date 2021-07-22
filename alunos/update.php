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

$sth = $pdo->prepare("SELECT id,nome_completo, matricula, situacao_aluno,Cep, curso, imagem from alunos WHERE id = :id");
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
                <input name="id" type="hidden" value="<?=$id?>">
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
    $matricula = $_POST['matricula'];
    $situacao_aluno = $_POST['situacao_aluno'];
    $Cep = $_POST['Cep'];
    $curso = $_POST['curso'];
    $imagem = $_POST['imagem'];

    $sql = "UPDATE alunos SET nome_completo = :nome_completo, matricula=:matricula, situacao_aluno=:situacao_aluno, Cep=:Cep, curso=:curso, imagem=:imagem WHERE id = :id";
	$sth = $pdo->prepare($sql);
    $sth->bindParam(':id', $_POST['id'], PDO::PARAM_INT);
    $sth->bindParam(':nome_completo', $_POST['nome_completo'], PDO::PARAM_INT);   
    $sth->bindParam(':matricula', $_POST['matricula'], PDO::PARAM_INT);   
    $sth->bindParam(':situacao_aluno', $_POST['situacao_aluno'], PDO::PARAM_INT); 
    $sth->bindParam(':Cep', $_POST['Cep'], PDO::PARAM_INT); 
    $sth->bindParam(':curso', $_POST['curso'], PDO::PARAM_INT); 
    $sth->bindParam(':imagem', $_POST['imagem'], PDO::PARAM_INT);      

   if($sth->execute()){
        print "<script>alert('Registro alterado com sucesso!');location='alunos.php';</script>";
    }else{
        print "Erro ao editar o registro!<br><br>";
    }
}
require_once('footer.php');
?>

