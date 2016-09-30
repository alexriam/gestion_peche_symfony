<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace DebitBundle\Helper;

use DebitBundle\Entity\Station;

/**
 * Description of StationHelper
 *
 * @author acrepet
 */
class StationHelper 
{
    //protected $em;
    
    protected $stationLignonBoen;
    protected $stationLignonPoncins;
    protected $stationLignonLoireBalbigny;
    protected $stationLignonLoireMontrond;
    protected $stationLignonLoireGrangent;
    protected $stationLignonLoireBasEnBasset;
    protected $stationRhoneTernay;
    protected $stationRhoneValence;
    
    //function __construct(\Doctrine\ORM\EntityManager $em)
    function __construct(\Doctrine\ORM\EntityManager $em)
    {
        //$this->em = $em;
        
        $this->stationLignonBoen = new Station();
        $this->stationLignonBoen->setId(1);
        $this->stationLignonBoen->setStationId(468);
        $this->stationLignonBoen->setStationCode('K075321001');
        $this->stationLignonBoen->setStationNom('lignon du forez (Boen-sur-Lignon)');
        
        $this->stationLignonPoncins = new Station();
        $this->stationLignonPoncins->setId(2);
        $this->stationLignonPoncins->setStationId(469);
        $this->stationLignonPoncins->setStationCode('K077322001');
        $this->stationLignonPoncins->setStationNom('lignon du forez (Poncins)');
        
        $this->stationLignonLoireBalbigny = new Station();
        $this->stationLignonLoireBalbigny->setId(3);
        $this->stationLignonLoireBalbigny->setStationId(470);
        $this->stationLignonLoireBalbigny->setStationCode('K079001010');
        $this->stationLignonLoireBalbigny->setStationNom('Loire (Balbigny)');
        
        $this->stationLignonLoireMontrond = new Station();
        $this->stationLignonLoireMontrond->setId(4);
        $this->stationLignonLoireMontrond->setStationId(463);
        $this->stationLignonLoireMontrond->setStationCode('K069001001');
        $this->stationLignonLoireMontrond->setStationNom('Loire (Montrond-les-bains)');
        
        $this->stationLignonLoireGrangent = new Station();
        $this->stationLignonLoireGrangent->setId(5);
        $this->stationLignonLoireGrangent->setStationId(455);
        $this->stationLignonLoireGrangent->setStationCode('K060001001');
        $this->stationLignonLoireGrangent->setStationNom('Loire (Grangent)');
        
        $this->stationLignonLoireBasEnBasset = new Station();
        $this->stationLignonLoireBasEnBasset->setId(6);
        $this->stationLignonLoireBasEnBasset->setStationId(45511);
        $this->stationLignonLoireBasEnBasset->setStationCode('K055001010');
        $this->stationLignonLoireBasEnBasset->setStationNom('Loire (Bas-en-Basset)');
        
        $this->stationRhoneTernay = new Station();
        $this->stationRhoneTernay->setId(7);
        $this->stationRhoneTernay->setStationId(5151);
        $this->stationRhoneTernay->setStationCode('V303002002');
        $this->stationRhoneTernay->setStationNom('Rhône (Ternay)');
        
        $this->stationRhoneValence = new Station();
        $this->stationRhoneValence->setId(8);
        $this->stationRhoneValence->setStationId(51512);
        $this->stationRhoneValence->setStationCode('V401001002');
        $this->stationRhoneValence->setStationNom('Rhône (Valence [Pont])');
    }
    
    public function getStationAll()
    {
        return [
            $this->stationLignonBoen,
            $this->stationLignonPoncins,
            $this->stationLignonLoireBalbigny,
            $this->stationLignonLoireMontrond,
            $this->stationLignonLoireGrangent,
            $this->stationLignonLoireBasEnBasset,
            $this->stationRhoneTernay,
            $this->stationRhoneValence
        ];
    }
    
    public function getStationLignon()
    {
        return [
            $this->stationLignonBoen,
            $this->stationLignonPoncins
        ];
    }
    
    public function getStationLoire()
    {
        return [
            $this->stationLignonLoireBalbigny,
            $this->stationLignonLoireMontrond,
            $this->stationLignonLoireGrangent,
            $this->stationLignonLoireBasEnBasset
        ];
    }
    
    public function getStationRhone()
    {
        return [
            $this->stationRhoneTernay,
            $this->stationRhoneValence
        ];
    }
}
