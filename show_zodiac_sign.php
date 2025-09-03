<?php include('layout/header.php'); ?>

<div class="container mt-5">
    <h1>🔮 Qual é o seu signo?</h1>

<?php
if (isset($_POST['data_nascimento'])) {
    $data_nascimento = $_POST['data_nascimento'];
    $signos = simplexml_load_file("signos.xml");
    $data_nascimento = new DateTime($data_nascimento);
    $signo_encontrado = false;

    foreach ($signos->signo as $signo) {
        $data_inicio = DateTime::createFromFormat('d/m', (string)$signo->dataInicio);
        $data_fim = DateTime::createFromFormat('d/m', (string)$signo->dataFim);

        $data_inicio->setDate($data_nascimento->format('Y'), $data_inicio->format('m'), $data_inicio->format('d'));
        $data_fim->setDate($data_nascimento->format('Y'), $data_fim->format('m'), $data_fim->format('d'));

        if ($data_inicio > $data_fim) {
            $data_fim->modify('+1 year');
            if ($data_nascimento < $data_inicio && $data_nascimento > $data_fim) {
                continue;
            }
        }

        if ($data_nascimento >= $data_inicio && $data_nascimento <= $data_fim) {
            $classe_signo = strtolower($signo->signoNome); // Classe CSS do signo
            echo "<div class='card shadow p-4 mt-4 $classe_signo'>";
            echo "<h2 data-icone='{$signo->icone}'>{$signo->signoNome}</h2>";
            echo "<p class='mt-3'>{$signo->descricao}</p>";
            echo "</div>";
            $signo_encontrado = true;
            break;
        }
    }

    if (!$signo_encontrado) {
        echo "<p class='text-danger mt-3'>Não foi possível determinar seu signo. Verifique a data informada.</p>";
    }
} else {
    echo "<p class='text-warning mt-3'>⚠ Nenhuma data foi enviada. Volte e preencha o formulário.</p>";
}
?>

    <a href="index.php" class="btn mt-3">⬅ Voltar</a>
</div>

<?php include('layout/footer.php'); ?>