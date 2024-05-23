<?php

interface Figura {
  public function calcularArea();
}



class Triangulo implements Figura {
  public $base;
  public $altura;



  public function __construct($b, $h) {
    $this->base = $b;
    $this->altura = $h;
  }


  public function calcularArea() {
    $area = ($this->base * $this->altura) / 2;
    return $area;
  }

}


class Rectangulo implements Figura {
  public $base;
  public $altura;

  public function __construct($b, $a) {
    $this->base = $b;
    $this->altura = $a;
  }

  public function calcularArea() {
    $area = $this->base * $this->altura;
    return $area;
  }
}

class Cuadrado implements Figura {
  public $lado;

  public function __construct($l) {
    $this->lado = $l;
  }


  public function calcularArea() {
    $area = $this->lado * $this->lado;
    return $area;
  }
}


class Circulo implements Figura {
  public $radio;

  public function __construct($r) {
    $this->radio = $r;
  }


  public function calcularArea() {
    $area = M_PI * $this->radio * $this->radio;
    return $area;
  }
}

echo "AREA DE TRIANGULO\n";
echo "INGRESE LA BASE :";
$b = trim(fgets(STDIN));
echo "INGRESE LA ALTURA :";
$h = trim(fgets(STDIN));
$triangulo = new Triangulo($b, $h);
$areaTriangulo = $triangulo->calcularArea();
echo "EL AREA DEL TRIANGULO ES " . $areaTriangulo . "\n";


echo "AREA DE RECTANGULO\n";
echo "INGRESE LA BASE :";
$b = trim(fgets(STDIN));
echo "INGRESE LA ALTURA :";
$a = trim(fgets(STDIN));
$rectangulo = new Rectangulo($b, $a);
$areaRectangulo = $rectangulo->calcularArea();
echo "EL AREA DEL RECTANGULO ES " . $areaRectangulo . "\n";


echo "AREA DE CUADRADO\n";
echo "INGRESE EL LADO :";
$l = trim(fgets(STDIN));
$cuadrado = new Cuadrado($l);
$areaCuadrado = $cuadrado->calcularArea();
echo "EL AREA DEL CUADRADO ES " . $areaCuadrado . "\n";


echo "AREA DE CIRCULO\n";
echo "INGRESE EL RADIO :";
$r = trim(fgets(STDIN));
$circulo = new Circulo($r);
$areaCirculo = $circulo->calcularArea();
echo "EL AREA DEL CIRCULO ES " . $areaCirculo . "\n";

?>