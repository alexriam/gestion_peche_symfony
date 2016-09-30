<?php

namespace DebitBundle\Chart;

use ArrayObject;
use DebitBundle\Entity\Station;
use DebitBundle\Helper\StationHelper;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\DependencyInjection\Container;
use DoctrineExtensions\Query\Mysql\Year;

/**
 * Description of ChartData
 *
 * @author acrepet
 */
class ChartData
{
    private $em;
    private $container;
    
    public function __construct(ObjectManager $em, Container $container)
    {
        $this->em = $em;
        $this->container = $container;
    }
    
    /**
     * Formate un montant dans le format français.
     *
     * @param float $amount Montant à formater
     *
     * @return string Le montant formaté
     */
    private function formatMoney($amount)
    {
        return number_format($amount, 2, ',', ' ');
    }
    
    /**
     * Récupère et organise les données pour le graphique des bénéfices par année.
     *
     * @return array
     */
    public function dataAmountByYear()
    {
        //$stats = $this->em->getRepository('AppBundle:Transaction')->amountByYear();
        
        $stats = array();
        $stats[] = array('amount' =>2200, 'date' => 2012);
        $stats[] = array('amount' =>2450, 'date' => 2013);
        $stats[] = array('amount' =>3500, 'date' => 2014);
        $stats[] = array('amount' =>1800, 'date' => 2015);
        
        $arrayToDataTable[] = ['Année', 'Montant', ['role' => 'tooltip'], 'Evolution', ['role' => 'tooltip']];
        $previousAmount = 0;
        foreach ($stats as $stat) {
            if ($previousAmount != 0) {
                $evolution = round((($stat['amount'] * 100) / $previousAmount) - 100, 2);
            } else {
                $evolution = 0;
            }
            $previousAmount = $stat['amount'];

            $tooltipAmount = $this->formatMoney($stat['amount']) . '€';
            $tooltipEvol = "$evolution %";

            $arrayToDataTable[] = [$stat['date'], floatval($stat['amount']), $tooltipAmount, $evolution, $tooltipEvol];
        }

        return $arrayToDataTable;
    }
    
    public function debitLignonDuForez()
    {
        /* @var $stationHelper StationHelper */
        $stationHelper = $this->container->get('debit.station_helper');
        
        /* @var $aStation ArrayObject */
        $aStation = $stationHelper->getStationLignon();//getStationAll();
        
        return $this->debitGeneral($aStation);
        
        /*$aInfos = [];
        $aInfosEntete = [];
        $aInfosEntete[] = 'Date';
        
        $arrayToDataTable = [];
        /* @var $uneStation Station *//*
        foreach($aStation as $uneStation)
        {
             $criteria = [
                'stationId' => $uneStation->getStationId()
            ];
            $stats = $this->em->getRepository('DebitBundle:NivEau2')->findBy($criteria, array(), 15);
            
            $aInfosEntete[] = $uneStation->getStationNom();
            foreach($stats as $stat)
            {
                $aInfos[$stat->getDateDebit()->format('d/m H')][] = floatval($stat->getDebit());
            }
        }
        
        $arrayToDataTable[] = $aInfosEntete;//['Date', 'Débit Boen', 'Débit Poncins'];
        foreach($aInfos as $uneInfoKey => $aInfoValue)
        {
            //$arrayToDataTable[] = [$stat->getDateDebit()->format('d/m H'), floatval($stat->getDebit()), floatval($stats2Filtrees[$stat->getDateDebit()->format('d/m H')])];//$stat->getDateDebit()->format('d')
            $aTemp = [];
            $aTemp[] = $uneInfoKey;
            
            foreach ($aInfoValue as $uneValue)
            {
                $aTemp[] = $uneValue;
            }
            
            $arrayToDataTable[] = $aTemp;
        }
        
        return $arrayToDataTable;*/
        
        /*
        /* @var $oStationFirst Station *//*
        $oStationFirst = $aStation[0];
        /* @var $oStationSecond Station *//*
        $oStationSecond = $aStation[1];
        
        $criteria = [
            'stationId' => $oStationFirst->getStationId()
        ];
        $stats = $this->em->getRepository('DebitBundle:NivEau2')->findBy($criteria, array(), 15);//debitLignonDuForez();
        
        $criteria = [
            'stationId' => $oStationSecond->getStationId()
        ];
        $stats2 = $this->em->getRepository('DebitBundle:NivEau2')->findBy($criteria, array(), 15);//debitLignonDuForez();
        
        $stats2Filtrees = [];
        
        foreach ($stats2 as $unDebit)
        {
            $stats2Filtrees[$unDebit->getDateDebit()->format('d/m H')] = $unDebit->getDebit();
        }
        
        /*$stats = array();
        $stats[] = array('date' =>'22/09/2015', 'debit' => 20);
        $stats[] = array('date' =>'23/09/2015', 'debit' => 25);
        $stats[] = array('date' =>'24/09/2015', 'debit' => 35);
        $stats[] = array('date' =>'25/09/2015', 'debit' => 15);*//*
        
        $arrayToDataTable[] = ['Date', 'Débit Boen', 'Débit Poncins'];
        $previousAmount = 0;
        foreach ($stats as $stat) {
            //$arrayToDataTable[] = [$stat['date'], floatval($stat['debit'])];
            $arrayToDataTable[] = [$stat->getDateDebit()->format('d/m H'), floatval($stat->getDebit()), floatval($stats2Filtrees[$stat->getDateDebit()->format('d/m H')])];//$stat->getDateDebit()->format('d')
        }
        
        return $arrayToDataTable;*/
        
        /*$arrayToDataTable = [
            ['Element', 'Density', [ 'role' => 'style' ]],
            ['Copper', 8.94, '#b87333'],            // RGB value
            ['Silver', 10.49, 'silver'],            // English color name
            ['Gold', 19.30, 'gold'],
            ['Platinum', 21.45, 'color: #e5e4e2' ], // CSS-style declaration
        ];
         
        return $arrayToDataTable;*/
    }
    
    public function debitLoire()
    {
        /* @var $stationHelper StationHelper */
        $stationHelper = $this->container->get('debit.station_helper');
        
        /* @var $aStation ArrayObject */
        $aStation = $stationHelper->getStationLoire();
        
        return $this->debitGeneral($aStation);
    }
    
    public function debitRhone()
    {
        /* @var $stationHelper StationHelper */
        $stationHelper = $this->container->get('debit.station_helper');
        
        /* @var $aStation ArrayObject */
        $aStation = $stationHelper->getStationRhone();
        
        return $this->debitGeneral($aStation);
    }
    
    private function debitGeneral($aStation)
    {
        $aInfos = [];
        $aInfosEntete = [];
        $aInfosEntete[] = 'Date';
        
        $arrayToDataTable = [];
        /* @var $uneStation Station */
        foreach($aStation as $uneStation)
        {
            $criteria = [
                'stationId' => $uneStation->getStationId()
            ];
            
            $aOrderBy = array();
            $aOrderBy['dateDebit'] = 'DESC';
            $stats = $this->em->getRepository('DebitBundle:NivEau2')->findBy($criteria, $aOrderBy, 15);
            
            $aInfosEntete[] = $uneStation->getStationNom();
            foreach($stats as $stat)
            {
                $aInfos[$stat->getDateDebit()->format('d/m H')][$uneStation->getStationId()] = floatval($stat->getDebit());
            }
        }
        
        ksort($aInfos);
        
        $arrayToDataTable[] = $aInfosEntete;//['Date', 'Débit Boen', 'Débit Poncins'];
        foreach($aInfos as $uneInfoKey => $aInfoValue)
        {
            //$arrayToDataTable[] = [$stat->getDateDebit()->format('d/m H'), floatval($stat->getDebit()), floatval($stats2Filtrees[$stat->getDateDebit()->format('d/m H')])];//$stat->getDateDebit()->format('d')
            $aTemp = [];
            $aTemp[] = $uneInfoKey;
            
            /*foreach ($aInfoValue as $uneValue)
            {
                $aTemp[] = $uneValue;
            }*/
            
            foreach($aStation as $uneStation)
            {
                if (isset($aInfoValue[$uneStation->getStationId()]))
                {
                    $aTemp[] = $aInfoValue[$uneStation->getStationId()];
                }
                else
                {
                    $aTemp[] = 0;
                }
            }
            
            $arrayToDataTable[] = $aTemp;
        }
        
        return $arrayToDataTable;
    }
    
    public function poissonOnYear($year)
    {
        $arrayToDataTable = array();
        $aInfosEntete = array();
        $aInfos = [];
        $aTemp = [];
        
        /*$arrayToDataTable[] = ['Poisson', 'Nombre'];
        $arrayToDataTable[] = ['Brochet', 12];
        $arrayToDataTable[] = ['Silure', 24];*/
        
        $arrayToDataTableToTest = array();
        $arrayToDataTableToTest[] = ['Poisson', 'Brochet', 'Silure'];
        $arrayToDataTableToTest[] = ['', 12, 24];
        //echo '<pre>';
        //print_r($arrayToDataTableToTest);
        
       /* //1
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT p
            FROM AppBundle:Product p
            WHERE p.price > :price
            ORDER BY p.price ASC'
        )->setParameter('price', '19.99');

        $products = $query->getResult();

        //2
        $db = $this->createQueryBuilder();
        $db
            ->select('count(s)')
            ->groupBy('s.email')
            //->orderBy('s.id', 'DESC')
            ->setMaxResults(1);

        $qb->getQuery()->getSingleScalarResult();*/
        
        //$this->em->getRepository('PriseBundle:Prise3');
        
        
        /* @var $em EntityRepository */
        
        if ($year > 0)
        {
            $db = $this->em->getRepository('PriseBundle:Prise3')->createQueryBuilder('p');
            $query  = $db->select('p.poisson, count(p) as nb')
                ->where('YEAR(p.datePrise) = :year')
                ->groupBy('p.poisson')
                ->setParameter('year', $year)
                ->getQuery();
        }
        else
        {
            $db = $this->em->getRepository('PriseBundle:Prise3')->createQueryBuilder('p');
            $query  = $db->select('p.poisson, count(p) as nb')
                ->groupBy('p.poisson')
                ->getQuery();
        }
        
        $aPoissons = $query->getResult();
        
        //print_r($aPoissons);
        
        $aInfosEntete[] = 'Poisson';
        $aInfos[] = 0;
        foreach($aPoissons as $unpoisson)
        {
            $aInfosEntete[] = $unpoisson['poisson'];
            $aTemp[] = $unpoisson['nb'];
            //$aInfos[] = $aTemp;
            $aInfos[] = intval($unpoisson['nb']);
        }
        
        $arrayToDataTable[] = $aInfosEntete;//['Date', 'Débit Boen', 'Débit Poncins'];
        $arrayToDataTable[] = $aInfos;
        
        //echo '<pre>';
        //print_r($arrayToDataTable);
        //echo '</pre>';
        //$arrayToDataTable = $arrayToDataTableToTest;
        
        return $arrayToDataTable;
    }
    
    public function poissonMoyTailleOnYear($year)
    {
        $arrayToDataTable = array();
        $aInfosEntete = array();
        $aInfos = [];
        //$aTemp = [];
        
        $arrayToDataTableToTest = array();
        $arrayToDataTableToTest[] = ['Poisson', 'Brochet', 'Silure'];
        $arrayToDataTableToTest[] = ['', 12, 24];
        
        if ($year > 0)
        {
            $db = $this->em->getRepository('PriseBundle:Prise3')->createQueryBuilder('p');
            $query  = $db->select('p.poisson, avg(p.taille) as moyTaille')
                ->where('YEAR(p.datePrise) = :year')
                ->groupBy('p.poisson')
                ->setParameter('year', $year)
                ->getQuery();
        }
        else
        {
            $db = $this->em->getRepository('PriseBundle:Prise3')->createQueryBuilder('p');
            $query  = $db->select('p.poisson, avg(p.taille) as moyTaille')
                ->groupBy('p.poisson')
                ->getQuery();
        }
        
        $aPoissons = $query->getResult();
        
        $aInfosEntete[] = 'Poisson';
        $aInfos[] = 0;
        foreach($aPoissons as $unpoisson)
        {
            $aInfosEntete[] = $unpoisson['poisson'];
            //$aTemp[] = $unpoisson['moyTaille'];
            $aInfos[] = intval($unpoisson['moyTaille']);
        }
        
        $arrayToDataTable[] = $aInfosEntete;//['Date', 'Débit Boen', 'Débit Poncins'];
        $arrayToDataTable[] = $aInfos;
        
        //echo '<pre>';
        //print_r($arrayToDataTable);
        //echo '</pre>';
        //$arrayToDataTable = $arrayToDataTableToTest;
        
        return $arrayToDataTable;
    }
}
