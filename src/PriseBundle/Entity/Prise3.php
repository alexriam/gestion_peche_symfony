<?php

namespace PriseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Prise3
 *
 * @ORM\Table(name="prise_3")
 * @ORM\Entity
 */
class Prise3
{
    /**
     * @var integer
     *
     * @ORM\Column(name="prise_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $priseId;

    /**
     * @var integer
     *
     * @ORM\Column(name="session_peche_id", type="smallint", nullable=false)
     */
    private $sessionPecheId;

    /**
     * @var string
     *
     * @ORM\Column(name="poisson", type="string", nullable=false)
     */
    private $poisson;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu", type="string", length=250, nullable=false)
     */
    private $lieu;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu_precis", type="string", length=250, nullable=false)
     */
    private $lieuPrecis;

    /**
     * @var string
     *
     * @ORM\Column(name="pecheur", type="string", length=250, nullable=false)
     */
    private $pecheur;

    /**
     * @var string
     *
     * @ORM\Column(name="appat", type="string", length=200, nullable=false)
     */
    private $appat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_prise", type="datetime", nullable=false)
     */
    private $datePrise;

    /**
     * @var string
     *
     * @ORM\Column(name="technique", type="string", length=200, nullable=false)
     */
    private $technique;

    /**
     * @var string
     *
     * @ORM\Column(name="leurre", type="string", length=255, nullable=false)
     */
    private $leurre;

    /**
     * @var boolean
     *
     * @ORM\Column(name="taille", type="boolean", nullable=false)
     */
    private $taille;

    /**
     * @var integer
     *
     * @ORM\Column(name="poids", type="smallint", nullable=false)
     */
    private $poids;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", type="text", length=65535, nullable=false)
     */
    private $commentaire;

    /**
     * @var string
     *
     * @ORM\Column(name="pos_lat", type="string", length=100, nullable=false)
     */
    private $posLat;

    /**
     * @var string
     *
     * @ORM\Column(name="pos_long", type="string", length=100, nullable=false)
     */
    private $posLong;



    /**
     * Get priseId
     *
     * @return integer
     */
    public function getPriseId()
    {
        return $this->priseId;
    }

    /**
     * Set sessionPecheId
     *
     * @param integer $sessionPecheId
     *
     * @return Prise3
     */
    public function setSessionPecheId($sessionPecheId)
    {
        $this->sessionPecheId = $sessionPecheId;

        return $this;
    }

    /**
     * Get sessionPecheId
     *
     * @return integer
     */
    public function getSessionPecheId()
    {
        return $this->sessionPecheId;
    }

    /**
     * Set poisson
     *
     * @param string $poisson
     *
     * @return Prise3
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
     * @return Prise3
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
     * Set lieuPrecis
     *
     * @param string $lieuPrecis
     *
     * @return Prise3
     */
    public function setLieuPrecis($lieuPrecis)
    {
        $this->lieuPrecis = $lieuPrecis;

        return $this;
    }

    /**
     * Get lieuPrecis
     *
     * @return string
     */
    public function getLieuPrecis()
    {
        return $this->lieuPrecis;
    }

    /**
     * Set pecheur
     *
     * @param string $pecheur
     *
     * @return Prise3
     */
    public function setPecheur($pecheur)
    {
        $this->pecheur = $pecheur;

        return $this;
    }

    /**
     * Get pecheur
     *
     * @return string
     */
    public function getPecheur()
    {
        return $this->pecheur;
    }

    /**
     * Set appat
     *
     * @param string $appat
     *
     * @return Prise3
     */
    public function setAppat($appat)
    {
        $this->appat = $appat;

        return $this;
    }

    /**
     * Get appat
     *
     * @return string
     */
    public function getAppat()
    {
        return $this->appat;
    }

    /**
     * Set datePrise
     *
     * @param \DateTime $datePrise
     *
     * @return Prise3
     */
    public function setDatePrise($datePrise)
    {
        $this->datePrise = $datePrise;

        return $this;
    }

    /**
     * Get datePrise
     *
     * @return \DateTime
     */
    public function getDatePrise()
    {
        return $this->datePrise;
    }

    /**
     * Set technique
     *
     * @param string $technique
     *
     * @return Prise3
     */
    public function setTechnique($technique)
    {
        $this->technique = $technique;

        return $this;
    }

    /**
     * Get technique
     *
     * @return string
     */
    public function getTechnique()
    {
        return $this->technique;
    }

    /**
     * Set leurre
     *
     * @param string $leurre
     *
     * @return Prise3
     */
    public function setLeurre($leurre)
    {
        $this->leurre = $leurre;

        return $this;
    }

    /**
     * Get leurre
     *
     * @return string
     */
    public function getLeurre()
    {
        return $this->leurre;
    }

    /**
     * Set taille
     *
     * @param boolean $taille
     *
     * @return Prise3
     */
    public function setTaille($taille)
    {
        $this->taille = $taille;

        return $this;
    }

    /**
     * Get taille
     *
     * @return boolean
     */
    public function getTaille()
    {
        return $this->taille;
    }

    /**
     * Set poids
     *
     * @param integer $poids
     *
     * @return Prise3
     */
    public function setPoids($poids)
    {
        $this->poids = $poids;

        return $this;
    }

    /**
     * Get poids
     *
     * @return integer
     */
    public function getPoids()
    {
        return $this->poids;
    }

    /**
     * Set commentaire
     *
     * @param string $commentaire
     *
     * @return Prise3
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

    /**
     * Set posLat
     *
     * @param string $posLat
     *
     * @return Prise3
     */
    public function setPosLat($posLat)
    {
        $this->posLat = $posLat;

        return $this;
    }

    /**
     * Get posLat
     *
     * @return string
     */
    public function getPosLat()
    {
        return $this->posLat;
    }

    /**
     * Set posLong
     *
     * @param string $posLong
     *
     * @return Prise3
     */
    public function setPosLong($posLong)
    {
        $this->posLong = $posLong;

        return $this;
    }

    /**
     * Get posLong
     *
     * @return string
     */
    public function getPosLong()
    {
        return $this->posLong;
    }
}
