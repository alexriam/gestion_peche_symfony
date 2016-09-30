<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace DebitBundle\Entity;

/**
 * Description of Station
 *
 * @author acrepet
 */
class Station 
{
    protected $id;
    protected $stationId;
    protected $stationNom;
    protected $stationCode;
    
    function getId() {
        return $this->id;
    }
    
    function getStationId() {
        return $this->stationId;
    }
    
    function getStationNom() {
        return $this->stationNom;
    }
    
    function getStationCode() {
        return $this->stationCode;
    }
    
    function setId($id) {
        $this->id = $id;
    }
    
    function setStationId($stationId) {
        $this->stationId = $stationId;
    }
    
    function setStationNom($stationNom) {
        $this->stationNom = $stationNom;
    }
    
    function setStationCode($stationCode) {
        $this->stationCode = $stationCode;
    }
    
    
}
