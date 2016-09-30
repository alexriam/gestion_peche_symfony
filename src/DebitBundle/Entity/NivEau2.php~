<?php

namespace DebitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NivEau2
 *
 * @ORM\Table(name="niv_eau_2")
 * @ORM\Entity
 */
class NivEau2
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="station_id", type="integer", nullable=false)
     */
    private $stationId;

    /**
     * @var string
     *
     * @ORM\Column(name="CdStationHydro", type="string", length=25, nullable=false)
     */
    private $cdstationhydro;

    /**
     * @var string
     *
     * @ORM\Column(name="station_nom", type="string", length=255, nullable=false)
     */
    private $stationNom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_debit", type="datetime", nullable=false)
     */
    private $dateDebit;

    /**
     * @var string
     *
     * @ORM\Column(name="debit", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $debit;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set stationId
     *
     * @param integer $stationId
     *
     * @return NivEau2
     */
    public function setStationId($stationId)
    {
        $this->stationId = $stationId;

        return $this;
    }

    /**
     * Get stationId
     *
     * @return integer
     */
    public function getStationId()
    {
        return $this->stationId;
    }

    /**
     * Set cdstationhydro
     *
     * @param string $cdstationhydro
     *
     * @return NivEau2
     */
    public function setCdstationhydro($cdstationhydro)
    {
        $this->cdstationhydro = $cdstationhydro;

        return $this;
    }

    /**
     * Get cdstationhydro
     *
     * @return string
     */
    public function getCdstationhydro()
    {
        return $this->cdstationhydro;
    }

    /**
     * Set stationNom
     *
     * @param string $stationNom
     *
     * @return NivEau2
     */
    public function setStationNom($stationNom)
    {
        $this->stationNom = $stationNom;

        return $this;
    }

    /**
     * Get stationNom
     *
     * @return string
     */
    public function getStationNom()
    {
        return $this->stationNom;
    }

    /**
     * Set dateDebit
     *
     * @param \DateTime $dateDebit
     *
     * @return NivEau2
     */
    public function setDateDebit($dateDebit)
    {
        $this->dateDebit = $dateDebit;

        return $this;
    }

    /**
     * Get dateDebit
     *
     * @return \DateTime
     */
    public function getDateDebit()
    {
        return $this->dateDebit;
    }

    /**
     * Set debit
     *
     * @param string $debit
     *
     * @return NivEau2
     */
    public function setDebit($debit)
    {
        $this->debit = $debit;

        return $this;
    }

    /**
     * Get debit
     *
     * @return string
     */
    public function getDebit()
    {
        return $this->debit;
    }
}
