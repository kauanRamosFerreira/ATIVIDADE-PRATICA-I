<?php

function cadastro_Alunos(){

    $alunos = [];

    for ($i = 0; $i < 3; $i++) {

        $nome = readline("Digite o nome do aluno: ");

        $notas = [];

        for ($j = 0; $j < 3; $j++) {

            $nota = readline("Digite a nota: ");
            $notas[] = $nota;

        }

        $alunos[$nome] = $notas;
    }

    return $alunos;
}

function calcularMedia($alunos){

    $medias = [];

    foreach ($alunos as $nome => $notas){

        $media = array_sum($notas) / count($notas);

        $medias[$nome] = $media;
    }

    return $medias;
}

function analisarMedias($medias){

    $maiorMedia = max($medias);
    $menorMedia = min($medias);

    $alunoMaior = "";
    $alunoMenor = "";

    foreach ($medias as $nome => $media){

        if ($media == $maiorMedia){
            $alunoMaior = $nome;
        }

        if ($media == $menorMedia){
            $alunoMenor = $nome;
        }

    }

    echo "\nAluno com MAIOR média:) $alunoMaior ($maiorMedia)\n";
    echo "Aluno com MENOR média: $alunoMenor ($menorMedia)\n";

}

$alunos = cadastro_Alunos();

$medias = calcularMedia($alunos);

analisarMedias($medias);

?>