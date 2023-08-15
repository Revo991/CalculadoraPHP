<!DOCTYPE html>
<html>
<head>
    <title>Calculador de Conversión de Moneda</title>
</head>
<body>
    <h1>Calculadora de Conversión de Moneda</h1>
    <form method="post">
        <label>Ingrese el monto:</label>
        <input type="number" name="valor" step="0.01" required>
        <br>
        <label>Seleccione la moneda de origen:</label>
        <select name="monedaOrigen">
        <option value="USD">Dólares Estadounidenses (USD)</option>
    <option value="EUR">Euros (EUR)</option>
    <option value="GBP">Libras Esterlinas (GBP)</option>
    <option value="JYP">Yenes Japoneses (JYP)</option>
    <option value="ARS">Pesos Argentinos (ARS)</option>
    <option value="AUD">Dólares Australianos (AUD)</option>
    <option value="MXN">Pesos Mexicanos (MXN)</option>
    <option value="COP">Pesos Colombianos (COP)</option>
    <option value="CAD">Dólares Canadienses (CAD)</option>
            
        </select>
        <br>
        <label>Seleccione la moneda de destino:</label>
        <select name="monedaDestino">
        <option value="USD">Dólares Estadounidenses (USD)</option>
    <option value="EUR">Euros (EUR)</option>
    <option value="GBP">Libras Esterlinas (GBP)</option>
    <option value="JYP">Yenes Japoneses (JYP)</option>
    <option value="ARS">Pesos Argentinos (ARS)</option>
    <option value="AUD">Dólares Australianos (AUD)</option>
    <option value="MXN">Pesos Mexicanos (MXN)</option>
    <option value="COP">Pesos Colombianos (COP)</option>
    <option value="CAD">Dólares Canadienses (CAD)</option>
           
        </select>
        <br>
        <button type="submit" name="tipo_conversion" value="Moneda">Convertir</button>
        <button type="reset">Restablecer</button>
    </form>

    <?php
    class MonedaConverter {
        private $currencies = [];

        public function __construct() {
            $this->currencies = [
                'USD' => ['factor' => 0.05, 'nombre' => 'dólares'],
                'EUR' => ['factor' => 0.04, 'nombre' => 'euros'],
                'GBP' => ['factor' => 0.035, 'nombre' => 'libras esterlinas'],
                'JYP' => ['factor' => 0.060, 'nombre' => 'Yenes Japoneses'],
                'ARS' => ['factor' => 0.02, 'nombre' => 'Pesos Argentinos'],
                'AUD' => ['factor' => 0.07, 'nombre' => 'dólares australianos'],
                'MXN' => ['factor' => 0.0025, 'nombre' => 'pesos mexicanos'],
                'COP' => ['factor' => 0.000015, 'nombre' => 'pesos colombianos'],
                'CAD' => ['factor' => 0.06, 'nombre' => 'dólares canadienses'],
                
            ];
        }

        public function convert($valor, $monedaOrigen, $monedaDestino) {
            if (!isset($this->currencies[$monedaOrigen]) || !isset($this->currencies[$monedaDestino])) {
                return "Monedas no válidas para la conversión.";
            }

            $factorOrigen = $this->currencies[$monedaOrigen]['factor'];
            $factorDestino = $this->currencies[$monedaDestino]['factor'];
            $resultado = ($valor * $factorOrigen) / $factorDestino;

            return "Resultado de conversión de $monedaOrigen a $monedaDestino: " . number_format($resultado, 2) . " {$this->currencies[$monedaDestino]['nombre']}.";
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tipo_conversion']) && $_POST['tipo_conversion'] === 'Moneda') {
        $valor = $_POST['valor'];
        $monedaOrigen = $_POST['monedaOrigen'];
        $monedaDestino = $_POST['monedaDestino'];

        $converter = new MonedaConverter();
        $resultado = $converter->convert($valor, $monedaOrigen, $monedaDestino);
        echo "<p>$resultado</p>";
    }
    ?>
</body>
</html>

