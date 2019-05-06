<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contactos
 *
 * @ORM\Table(name="contactos")
 * @ORM\Entity
 */
class Contactos
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=45, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="correo", type="string", length=100, nullable=false)
     */
    private $correo;

    /**
     * @var string
     *
     * @ORM\Column(name="mensaje", type="string", length=300, nullable=false)
     */
    private $mensaje;

    public function getId(){
        return $this->id;
    }
    public function getNombre(){
        return $this->nombre;
    }

    public function getCorreo(){
        return $this->correo;
    }

    public function getMensaje(){
        return $this->mensaje;
    }

    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    public function setCorreo($correo){
        $this->correo=$correo;
    }
    public function setMensaje($mensaje){
        $this->mensaje=$mensaje;
    }
}
