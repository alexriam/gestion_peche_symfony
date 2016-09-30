<?php

namespace PriseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SessionPeche3
 *
 * @ORM\Table(name="session_peche_3")
 * @ORM\Entity
 */
class SessionPeche3
{
    /**
     * @var integer
     *
     * @ORM\Column(name="session_peche_id", type="smallint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $sessionPecheId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_deb", type="datetime", nullable=false)
     */
    private $dateDeb;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin", type="datetime", nullable=false)
     */
    private $dateFin;

    /**
     * @var string
     *
     * @ORM\Column(name="pecheur", type="string", length=200, nullable=false)
     */
    private $pecheur;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu", type="string", length=200, nullable=false)
     */
    private $lieu;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu_precis", type="string", length=250, nullable=false)
     */
    private $lieuPrecis;

    /**
     * @var array
     *
     * @ORM\Column(name="poisson_dominant", type="simple_array", nullable=false)
     */
    private $poissonDominant;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", type="text", length=65535, nullable=false)
     */
    private $commentaire;
    
    /**
     * @var array
     * 
     * @ORM\ManyToMany(targetEntity="Prise3")
     * @ORM\JoinTable(name="prise_3",
     *      joinColumns={@ORM\JoinColumn(name="session_peche_id", referencedColumnName="session_peche_id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="session_peche_id", referencedColumnName="session_peche_id", unique=true)}
     *      )
     */
    private $prises;


    /**
     * Set sessionPecheId
     *
     * @param integer $dateDeb
     *
     * @return SessionPeche3
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
     * Set dateDeb
     *
     * @param \DateTime $dateDeb
     *
     * @return SessionPeche3
     */
    public function setDateDeb($dateDeb)
    {
        $this->dateDeb = $dateDeb;

        return $this;
    }

    /**
     * Get dateDeb
     *
     * @return \DateTime
     */
    public function getDateDeb()
    {
        return $this->dateDeb;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     *
     * @return SessionPeche3
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set pecheur
     *
     * @param string $pecheur
     *
     * @return SessionPeche3
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
     * Set lieu
     *
     * @param string $lieu
     *
     * @return SessionPeche3
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
     * @return SessionPeche3
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
     * Set poissonDominant
     *
     * @param array $poissonDominant
     *
     * @return SessionPeche3
     */
    public function setPoissonDominant($poissonDominant)
    {
        $this->poissonDominant = $poissonDominant;

        return $this;
    }

    /**
     * Get poissonDominant
     *
     * @return array
     */
    public function getPoissonDominant()
    {
        return $this->poissonDominant;
    }

    /**
     * Set commentaire
     *
     * @param string $commentaire
     *
     * @return SessionPeche3
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
     * Set prises
     *
     * @param array $commentaire
     *
     * @return SessionPeche3
     */
    public function setPrises($prises)
    {
        $this->prises = $prises;

        return $this;
    }

    /**
     * Get prises
     *
     * @return array
     */
    public function getPrises()
    {
        return $this->prises;
    }
    
    /**
     * 
     * @return type
     */
    public function getFormSelectName()
    {
        return $this->sessionPecheId . ' ' . $this->getDateDeb()->format('d/m/Y');
    }
}
