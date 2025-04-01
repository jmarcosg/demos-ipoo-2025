<?php

class Persona
{
    // Atributos
    private string $nombre;
    private string $apellido;
    private string $tipoDoc;
    private int $numDoc;

    // Constructor
    public function __construct(
        string $name,
        string $surname,
        string $typeDoc,
        int $numberDoc
    ) {
        $this->nombre = $name;
        $this->apellido = $surname;
        $this->tipoDoc = $typeDoc;
        $this->numDoc = $numberDoc;
    }

    // Observadoras
    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getApellido(): string
    {
        return $this->apellido;
    }

    public function getTipoDoc(): string
    {
        return $this->tipoDoc;
    }

    public function getNumeroDoc(): int
    {
        return $this->numDoc;
    }

    // Modificadoras
    public function setNombre(string $firstName): void
    {
        $this->nombre = $firstName;
    }

    public function setApellido(string $lastName): void
    {
        $this->apellido = $lastName;
    }

    public function setTipoDoc(string $docType): void
    {
        $this->tipoDoc = $docType;
    }

    public function setNumDoc(int $doc): void
    {
        $this->numDoc = $doc;
    }

    public function __toString(): string
    {
        return "Nombre: " .
            $this->getNombre() .
            ", apellido: " .
            $this->getApellido() .
            ", tipo de documento: " .
            $this->getTipoDoc() .
            ", numero: " .
            $this->getNumeroDoc() .
            "\n";
    }
}

?>
