<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora PHP</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="calculator">
        <form method="POST">
            <input type="text" name="num1" placeholder="Número 1" required>
            <input type="text" name="num2" placeholder="Número 2" required>

            <select name="operation">
                <option value="add">+</option>
                <option value="subtract">-</option>
                <option value="multiply">*</option>
                <option value="divide">/</option>
            </select>

            <button type="submit">Calcular</button>
        </form>

        <div class="result">
            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $num1 = $_POST['num1'];
                    $num2 = $_POST['num2'];
                    $operation = $_POST['operation'];

                    if (is_numeric($num1) && is_numeric($num2)) {
                        switch ($operation) {
                            case "add":
                                $result = $num1 + $num2;
                                break;
                            case "subtract":
                                $result = $num1 - $num2;
                                break;
                            case "multiply":
                                $result = $num1 * $num2;
                                break;
                            case "divide":
                                if ($num2 == 0) {
                                    $result = "No se puede dividir por cero";
                                } else {
                                    $result = $num1 / $num2;
                                }
                                break;
                            default:
                                $result = "Operación no válida";
                                break;
                        }
                        echo "Resultado: " . $result;
                    } else {
                        echo "Por favor ingrese números válidos.";
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>
