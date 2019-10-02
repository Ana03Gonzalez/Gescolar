<?php
try 
{
    include 'includes/conexao.php';
    $sql = "SELECT a.id, a.nome, a.cpt, cs.nome  AS curso, t.descricao AS turma,
                    DATE_FORMAT(a.data_nascimento, '%d/%m/%Y') AS data_nasc,
                    DATE_FORMAT(c.data_matricula, '%d/%m/%Y')  AS data_mat
            FROM aluno a
            JOIN matricula c ON (c.id_aluno = a.id)
            JOIN turma     t ON (t.id = C.id_turma)
            JOIN curso    CS ON (cs.id = t.id_curso)
            ORDER BY nome ASC ";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
      
}  catch(Exception $e) { 
        echo $e->getMessage();
}
?>
<link href="css/estilos.css" Type="text/css" rel="stylesheet" />

<?php include_once 'includes/cabecalho.php'?>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Data Nascimento</th>
            <th>Curso</th>
            <th>Turma</th>
            <th>Data Matricula</th>
        </tr>
    </thead>
    <tbody>
    <?php while($matricula = $stmt->fetchObject()): ?>
    <tr>
        <td><?= $matricula->id ?></td>
        <td><?= $matricula->nome ?></td>
        <td><?= $matricula->cpf ?></td>
        <td><?= $matricula->data_nasc ?></td>
        <td><?= $matricula->curso ?></td>
        <td><?= $matricula->turma ?></td>
        <td><?= $matricula->data_mat ?></td>
    </tr>
    <?php endwhile ?>
    </tbody>
</table>