<?php
include_once "CuentaBancaria.php";

//PROGRAMA PRINCIPAL
//int $numCuenta, $dni
//float $saldo, $interes, $cant, $montoRetiro
//bool $depositoRealizado, $retiroRealizado

echo "Ingrese su numero de cuenta: ";
$numCuenta = trim(fgets(STDIN));

echo "Ingrese su DNI: ";
$dni = trim(fgets(STDIN));

echo "Ingrese su saldo actual: ";
$saldo = trim(fgets(STDIN));

echo "Ingrese su interes anual: ";
$interes = trim(fgets(STDIN));

$cuenta = new CuentaBancaria($numCuenta, $dni, $saldo, $interes);
$cuenta->actualizarSaldo();
echo $cuenta;

echo "\n----------------------\n";

echo "\n Ingrese la cantidad de dinero que deposita: ";
$cant = trim(fgets(STDIN));
$depositoRealizado = $cuenta->depositar($cant);
echo $depositoRealizado
    ? "Deposito realizado. Saldo actual: $" .
        number_format($cuenta->getSaldoActual(), 2, ",", ".") .
        "\n"
    : "Deposito no realizado. Saldo actual: $" .
        number_format($cuenta->getSaldoActual(), 2, ",", ".") .
        "\n";
echo $cuenta;

echo "\n----------------------\n";

echo "\n Ingrese la cantidad de dinero que retira: ";
$montoRetiro = trim(fgets(STDIN));
$retiroRealizado = $cuenta->retirar($montoRetiro);
echo $retiroRealizado
    ? "Retiro realizado. Saldo actual: $" .
        number_format($cuenta->getSaldoActual(), 2, ",", ".") .
        "\n"
    : "Retiro no realizado. Saldo actual: $" .
        number_format($cuenta->getSaldoActual(), 2, ",", ".") .
        "\n";
echo $cuenta;

echo "\n----------------------\n";
