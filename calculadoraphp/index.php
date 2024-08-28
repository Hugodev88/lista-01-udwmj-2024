<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora PHP</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php
    $operacao = $_POST['operacao'] ?? "+";
    $valor1 = $_POST['v1'] ?? 0;
    $valor2 = $_POST['v2'] ?? 0;
    $resultado = 0;
    ?>

    <main>
        <h1>Calculadora em PHP</h1>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <label for="v1">Valor 1:</label>
            <input type="number" name="v1" id="v1" value="<?= $valor1 ?>">
            <label for="v2">Valor 2: </label>
            <input type="number" name="v2" id="v2" value="<?= $valor2 ?>">
            <div class="operadores">
                <input type="submit" name="operacao" value="+">
                <input type="submit" name="operacao" value="-">
                <input type="submit" name="operacao" value="X">
                <input type="submit" name="operacao" value="/">
            </div>
        </form>
    </main>

    <section>
        <h2>Resultado</h2>
        <?php
        switch ($operacao) {
            case '+':
                $resultado = $valor1 + $valor2;
                echo $resultado;
                break;

            case '-':
                $resultado = $valor1 - $valor2;
                echo $resultado;
                break;
            case 'X':
                $resultado = $valor1 * $valor2;
                echo $resultado;
                break;
            case '/':
                if ($valor2 == 0) {
                    echo "Voce não pode dividir por zero.";
                    break;
                } else {
                    $resultado = $valor1 / $valor2;
                    echo $resultado;
                }
                break;

            default:

                break;
        }
        ?>
    </section>
</body>

</html>