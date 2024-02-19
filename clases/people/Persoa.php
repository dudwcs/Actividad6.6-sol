<?php

namespace clases\people;

use DateTimeImmutable;

/**
 * Description of Persoa
 *
 * @author maria
 */
abstract class Persoa implements \JsonSerializable
{
    const MAYORIA_EDAD = 18;
    protected $nome;
    protected $apelidos;
    protected $mobil;

    protected DateTimeImmutable $dataNacemento;


    public function __construct(string $nome, string $apelidos, string $mobil)
    {
        $this->nome = $nome;
        $this->apelidos = $apelidos;
        $this->mobil = $mobil;
    }


    public function getNome(): string
    {
        return $this->nome;
    }

    public function getApelidos(): string
    {
        return $this->apelidos;
    }

    public function getMobil(): string
    {
        return $this->mobil;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function setApelidos(string $apelidos): void
    {
        $this->apelidos = $apelidos;
    }

    public function setMobil(string $mobil): void
    {
        $this->mobil = $mobil;
    }



    //    public function verInformacion(){
    //        $cadea = implode (" ", 
    //                [$this->nome,  $this->apelidos, 
    //                    "(".$this->mobil.")<br/>"]);
    //        echo $cadea;
    //    }

    abstract public function verInformacion();

    public function jsonSerialize()
    {

        $nome_apelidos = join(" ", [$this->nome, $this->apelidos],);
        return ["nome_apelidos" => $nome_apelidos, "mobil" => $this->mobil];
    }


    /**
     * Get the value of fechaNacimiento
     *
     * @return DateTimeImmutable
     */
    public function getDataNacemento(): DateTimeImmutable
    {
        return $this->dataNacemento;
    }

    /**
     * Set the value of fechaNacimiento
     *
     * @param DateTimeImmutable $dataNac
     *
     * @return self
     */
    public function setDataNacemento(DateTimeImmutable $dataNac): self
    {
        $this->dataNacemento = $dataNac;

        return $this;
    }
    public function getEdad(): int
    {
        $hoy = new DateTimeImmutable();
        $date_interval = $hoy->diff($this->dataNacemento);
        return $date_interval->y;
    }


}
