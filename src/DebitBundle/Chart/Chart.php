<?php

namespace DebitBundle\Chart;

use CMEN\GoogleChartsBundle\GoogleCharts\Charts\ColumnChart;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\ComboChart;
use CMEN\GoogleChartsBundle\GoogleCharts\Options\ComboChart\Series;
use CMEN\GoogleChartsBundle\GoogleCharts\Options\VAxis;

/**
 * Description of Chart
 *
 * @author acrepet
 */
class Chart
{
    const ANIMATION_STARTUP = true;
    const ANIMATION_DURATION = 1000;
    const CHART_AREA_HEIGHT = '80%';
    const CHART_AREA_WIDTH = '80%';

    private $chartData;


    public function __construct(ChartData $chartData)
    {
        $this->chartData = $chartData;
    }


    /**
     * Crée le graphique du montant des bénéfices par année.
     *
     * @return ComboChart
     */
    public function amountByYear()
    {
        $arrayToDataTable = $this->chartData->dataAmountByYear();

        $chart = new ComboChart();
        $chart->getData()->setArrayToDataTable($arrayToDataTable);
        $chart->getOptions()->getAnimation()->setStartup(self::ANIMATION_STARTUP);
        $chart->getOptions()->getAnimation()->setDuration(self::ANIMATION_DURATION);
        $chart->getOptions()->getChartArea()->setHeight(self::CHART_AREA_HEIGHT);
        $chart->getOptions()->getChartArea()->setWidth(self::CHART_AREA_WIDTH);

        $vAxisAmount = new VAxis();
        $vAxisAmount->setTitle('Montant en €');
        $vAxisEvol = new VAxis();
        $vAxisEvol->setTitle('Evolution en %');
        $chart->getOptions()->setVAxes([$vAxisAmount, $vAxisEvol]);

        $seriesAmount = new Series();
        $seriesAmount->setType('bars');
        $seriesAmount->setTargetAxisIndex(0);
        $seriesEvol = new Series();
        $seriesEvol->setType('line');
        $seriesEvol->setTargetAxisIndex(1);
        $chart->getOptions()->setSeries([$seriesAmount, $seriesEvol]);

        $chart->getOptions()->getHAxis()->setTitle('Année');
        $chart->getOptions()->setColors(['#f6dc12', '#759e1a']);

        return $chart;
    }
    
    public function debitLignonDuForez()
    {
        $arrayToDataTable = $this->chartData->debitLignonDuForez();

        $chart = new ColumnChart();
        $chart->getData()->setArrayToDataTable($arrayToDataTable);
        $chart->getOptions()->getAnimation()->setStartup(self::ANIMATION_STARTUP);
        $chart->getOptions()->getAnimation()->setDuration(self::ANIMATION_DURATION);
        //$chart->getOptions()->getChartArea()->setHeight(self::CHART_AREA_HEIGHT);
        $chart->getOptions()->getChartArea()->setWidth(self::CHART_AREA_WIDTH);
        
        /*$vAxisAmount = new VAxis();
        $vAxisAmount->setTitle('Montant en €');
        $vAxisEvol = new VAxis();
        $vAxisEvol->setTitle('Evolution en %');
        $chart->getOptions()->setVAxes([$vAxisAmount, $vAxisEvol]);*/
        
        $chart->getOptions()->getHAxis()->setTitle('Date (jj/mm/YYYY)');
        $chart->getOptions()->getVAxis()->setTitle('Débit en m²');
        $chart->getOptions()->setTitle('Débit en m² du Lignon du forez');
        

        return $chart;
    }
    
    public function debitLoire()
    {
        $arrayToDataTable = $this->chartData->debitLoire();

        $chart = new ColumnChart();
        $chart->getData()->setArrayToDataTable($arrayToDataTable);
        $chart->getOptions()->getAnimation()->setStartup(self::ANIMATION_STARTUP);
        $chart->getOptions()->getAnimation()->setDuration(self::ANIMATION_DURATION);
        //$chart->getOptions()->getChartArea()->setHeight(self::CHART_AREA_HEIGHT);
        $chart->getOptions()->getChartArea()->setWidth(self::CHART_AREA_WIDTH);
        
        /*$vAxisAmount = new VAxis();
        $vAxisAmount->setTitle('Montant en €');
        $vAxisEvol = new VAxis();
        $vAxisEvol->setTitle('Evolution en %');
        $chart->getOptions()->setVAxes([$vAxisAmount, $vAxisEvol]);*/
        
        $chart->getOptions()->getHAxis()->setTitle('Date (jj/mm/YYYY)');
        $chart->getOptions()->getVAxis()->setTitle('Débit en m²');
        $chart->getOptions()->setTitle('Débit en m² de la Loire');
        

        return $chart;
    }
    
    public function debitRhone()
    {
        $arrayToDataTable = $this->chartData->debitRhone();

        $chart = new ColumnChart();
        $chart->getData()->setArrayToDataTable($arrayToDataTable);
        $chart->getOptions()->getAnimation()->setStartup(self::ANIMATION_STARTUP);
        $chart->getOptions()->getAnimation()->setDuration(self::ANIMATION_DURATION);
        //$chart->getOptions()->getChartArea()->setHeight(self::CHART_AREA_HEIGHT);
        $chart->getOptions()->getChartArea()->setWidth(self::CHART_AREA_WIDTH);
        
        /*$vAxisAmount = new VAxis();
        $vAxisAmount->setTitle('Montant en €');
        $vAxisEvol = new VAxis();
        $vAxisEvol->setTitle('Evolution en %');
        $chart->getOptions()->setVAxes([$vAxisAmount, $vAxisEvol]);*/
        
        $chart->getOptions()->getHAxis()->setTitle('Date (jj/mm/YYYY)');
        $chart->getOptions()->getVAxis()->setTitle('Débit en m²');
        $chart->getOptions()->setTitle('Débit en m² du Rh$one');
        

        return $chart;
    }
    
    public function poissonOnYear($year)
    {
        $arrayToDataTable = $this->chartData->poissonOnYear($year);

        $chart = new ColumnChart();
        $chart->getData()->setArrayToDataTable($arrayToDataTable);
        $chart->getOptions()->getAnimation()->setStartup(self::ANIMATION_STARTUP);
        $chart->getOptions()->getAnimation()->setDuration(self::ANIMATION_DURATION);
        $chart->getOptions()->getChartArea()->setHeight(self::CHART_AREA_HEIGHT);
        $chart->getOptions()->getChartArea()->setWidth(self::CHART_AREA_WIDTH);
        
        /*$vAxisAmount = new VAxis();
        $vAxisAmount->setTitle('Montant en €');
        $vAxisEvol = new VAxis();
        $vAxisEvol->setTitle('Evolution en %');
        $chart->getOptions()->setVAxes([$vAxisAmount, $vAxisEvol]);*/
        
        $chart->getOptions()->getHAxis()->setTitle('Poisson ' . $year);
        $chart->getOptions()->getVAxis()->setTitle('Nombre');
        $chart->getOptions()->setTitle('Poisson sur l\'année ' . $year);
        

        return $chart;
    }
    
    public function poissonMoyTailleOnYear($year)
    {
        $arrayToDataTable = $this->chartData->poissonMoyTailleOnYear($year);

        $chart = new ColumnChart();
        $chart->getData()->setArrayToDataTable($arrayToDataTable);
        $chart->getOptions()->getAnimation()->setStartup(self::ANIMATION_STARTUP);
        $chart->getOptions()->getAnimation()->setDuration(self::ANIMATION_DURATION);
        $chart->getOptions()->getChartArea()->setHeight(self::CHART_AREA_HEIGHT);
        $chart->getOptions()->getChartArea()->setWidth(self::CHART_AREA_WIDTH);
        
        /*$vAxisAmount = new VAxis();
        $vAxisAmount->setTitle('Montant en €');
        $vAxisEvol = new VAxis();
        $vAxisEvol->setTitle('Evolution en %');
        $chart->getOptions()->setVAxes([$vAxisAmount, $vAxisEvol]);*/
        
        $chart->getOptions()->getHAxis()->setTitle('Poisson ' . $year);
        $chart->getOptions()->getVAxis()->setTitle('Moy taille en cm');
        $chart->getOptions()->setTitle('Poisson sur l\'année ' . $year);
        

        return $chart;
    }
}
