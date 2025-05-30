<?php

class CuentaBancaria
{
    // Constantes
    private const DIAS_EN_ANO = 365;

    // Atributos
    private object $titular;
    private int $numeroDeCuenta;
    private float $saldoActual;
    private float $interesAnual;

    // Constructor
    public function __construct(
        object $titularCuenta,
        int $numCuenta,
        float $saldo,
        float $interes
    ) {
        $this->titular = $titularCuenta;
        $this->numeroDeCuenta = $numCuenta;
        $this->saldoActual = $saldo;
        $this->interesAnual = $interes;
    }

    // Observadoras
    public function getTitular(): object
    {
        return $this->titular;
    }

    public function getNumeroCuenta(): int
    {
        return $this->numeroDeCuenta;
    }

    public function getSaldoActual(): float
    {
        return $this->saldoActual;
    }

    public function getInteresAnual(): float
    {
        return $this->interesAnual;
    }

    // Modificadoras
    public function setNumeroCuenta(int $cuenta): void
    {
        $this->numeroDeCuenta = $cuenta;
    }

    public function setDni(object $titularCuenta): void
    {
        $this->titular = $titularCuenta;
    }

    public function setSaldoActual(float $saldo): void
    {
        $this->saldoActual = $saldo;
    }

    public function setInteresAnual(float $interes): void
    {
        $this->interesAnual = $interes;
    }

    // Métodos

    /**
     * Actualiza el saldo actual basado en el interés anual.
     */
    public function actualizarSaldo(): void
    {
        $this->setSaldoActual(
            $this->getSaldoActual() +
                $this->getInteresAnual() / self::DIAS_EN_ANO
        );
    }

    /**
     * Deposita una cantidad en la cuenta bancaria.
     *
     * @param float $cant La cantidad a depositar.
     * @return bool Retorna true si se pudo depositar, false en caso contrario.
     */
    public function depositar(float $cant): bool
    {
        $depositoRealizado = false;

        if ($cant > 0) {
            $this->setSaldoActual($this->getSaldoActual() + $cant);
            $depositoRealizado = true;
        }

        return $depositoRealizado;
    }

    /**
     * Retira una cantidad de la cuenta bancaria.
     *
     * @param float $cant La cantidad a retirar.
     * @return bool Retorna true si se pudo retirar, false en caso contrario.
     */
    public function retirar(float $cant): bool
    {
        $retiroRealizado = false;
        $saldoRestante = 0;

        if ($cant >= 0) {
            if ($this->getSaldoActual() >= $cant) {
                $saldoRestante = $this->getSaldoActual() - $cant;
                $this->setSaldoActual($saldoRestante);
                $retiroRealizado = true;
            }
        }

        return $retiroRealizado;
    }

    /**
     * Muestra una colección de elementos.
     *
     * @param object $coleccion La colección a mostrar.
     * @return string Retorna una cadena con la representación de la colección.
     */
    private function mostrarColeccion(object $coleccion): string
    {
        $mensaje = "";
        $array = $coleccion;
        $cantidadFunciones = count($array);

        for ($i = 0; $i < $cantidadFunciones; $i++) {
            $mensaje .= $array[$i] . "\n";
            $mensaje .= "---------------\n";
        }

        return $mensaje;
    }

    /**
     * Retorna una representación en cadena de la cuenta bancaria.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "Numero de cuenta: " .
            $this->getNumeroCuenta() .
            "\n Datos Titular: \n" .
            $this->mostrarColeccion($this->getTitular()) .
            "\n";
        "\nEl saldo actual es: $" .
            number_format($this->getSaldoActual(), 2, ",", ".") .
            "\nEl interes es: " .
            number_format($this->getInteresAnual(), 2, ",", ".") .
            "%";
    }
}
