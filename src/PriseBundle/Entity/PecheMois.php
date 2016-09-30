<?php

namespace PriseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PecheMois
 *
 * @ORM\Table(name="peche_mois")
 * @ORM\Entity
 */
class PecheMois
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
     * @var boolean
     *
     * @ORM\Column(name="mois_id", type="boolean", nullable=false)
     */
    private $moisId;

    /**
     * @var string
     *
     * @ORM\Column(name="mois_txt", type="string", length=25, nullable=false)
     */
    private $moisTxt;

    /**
     * @var string
     *
     * @ORM\Column(name="poisson", type="string", nullable=false)
     */
    private $poisson;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu", type="string", length=255, nullable=false)
     */
    private $lieu;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", type="string", length=255, nullable=false)
     */
    private $commentaire;



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
     * Set moisId
     *
     * @param boolean $moisId
     *
     * @return PecheMois
     */
    public function setMoisId($moisId)
    {
        $this->moisId = $moisId;

        return $this;
    }

    /**
     * Get moisId
     *
     * @return boolean
     */
    public function getMoisId()
    {
        return $this->moisId;
    }

    /**
     * Set moisTxt
     *
     * @param string $moisTxt
     *
     * @return PecheMois
     */
    public function setMoisTxt($moisTxt)
    {
        $this->moisTxt = $moisTxt;

        return $this;
    }

    /**
     * Get moisTxt
     *
     * @return string
     */
    public function getMoisTxt()
    {
        return $this->moisTxt;
    }

    /**
     * Set poisson
     *
     * @param string $poisson
     *
     * @return PecheMois
     */
    public function setPoisson($poisson)
    {
        $this->poisson = $poisson;

        return $this;
    }

    /**
     * Get poisson
     *
     * @return string
     */
    public function getPoisson()
    {
        return $this->poisson;
    }

    /**
     * Set lieu
     *
     * @param string $lieu
     *
     * @return PecheMois
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * Get lieu
     *
     * @return string
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * Set commentaire
     *
     * @param string $commentaire
     *
     * @return PecheMois
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }
}
