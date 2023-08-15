<?php

interface UnidadMedida {
    public function convertir($valor);
}

class Milimetro implements UnidadMedida {
    public function convertir($valor) {
        return $valor / 1000;
    }
}

class Centimetro implements UnidadMedida {
    public function convertir($valor) {
        return $valor / 100;
    }
}

class Metro implements UnidadMedida {
    public function convertir($valor) {
        return $valor * 1;
    }
}

class Hectometro implements UnidadMedida {
    public function convertir($valor) {
        return $valor * 100;
    }
}

class Kilometro implements UnidadMedida {
    public function convertir($valor) {
        return $valor * 1000;
    }
}

class Conversor {
    private $unidad;

    public function __construct(UnidadMedida $unidad) {
        $this->unidad = $unidad;
    }

    public function convertir($valor) {
        return $this->unidad->convertir($valor);
    }
}

if(isset($_POST['convertir'])){
    $valor = $_POST['valor'];
    $desde = $_POST['desde'];
    $hasta = $_POST['hasta'];

    $unidad_desde = new $desde();
    $conversor_desde = new Conversor($unidad_desde);

    $unidad_hasta = new $hasta();
    $conversor_hasta = new Conversor($unidad_hasta);

    $calculoDesde = $conversor_desde->convertir($valor);
    $calculoHasta = $conversor_hasta->convertir($calculoDesde);

    $resultado = number_format($calculoHasta, 3);
}
?>