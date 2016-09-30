<?php
namespace DebitBundle\Controller;

use DateTime;
use DebitBundle\Chart\Chart;
use DebitBundle\Entity\NivEau;
use DebitBundle\Helper\Debit2Helper;
use DebitBundle\Helper\DebitHelper;
use DebitBundle\Helper\GeneralHelper;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Description of DebitController
 *
 * @author acrepet
 */
class DebitController  extends Controller
{
    public function indexAction()
    {
        return $this->render('DebitBundle:Debit:index.html.twig');
    }
    
    public function listAction()
    {
        return $this->render('DebitBundle:Debit:list.html.twig');
    }
    
    public function addAction()
    {
        $nivEau = new NivEau();
        $nivEau->setDateDebit(new DateTime());
        $nivEau->setDebit(4);
        $nivEau->setStationId(167);
        $nivEau->setStationNom('Test');

        $em = $this->getDoctrine()->getManager();

        $em->persist($nivEau);
        $em->flush();

        return new Response('Created NivEau (niv_eau_2) id '.$nivEau->getId());
        
        //return $this->render('DebitBundle:Debit:index.html.twig');
    }
    
    public function showAction($id)
    {
        $nivEau_version1 = $this->getDoctrine()
            ->getRepository('DebitBundle:NivEau2')
            ->find($id);
        
        /* @var $debitHelper DebitHelper */
        $debitHelper = $this->get('debit.DebitHelper');
        $nivEau_version2 = $debitHelper->find($id);
        
        /* @var $debit2Helper Debit2Helper */
        $debit2Helper = $this->get('debit.Debit2Helper');
        $nivEau_version3 = $debit2Helper->getRepository()->find($id);
        
        /* @var $generalHelper GeneralHelper */
        $generalHelper = $this->get('debit.general_helper');
        $nivEau_version4 = $generalHelper->getRepository('DebitBundle:NivEau2')->find($id);
        
        //find with criteria
        $criteria = array();
        $criteria['stationId'] = 468;
        $criteria['dateDebit'] = new \DateTime('2016-02-26 02:00:00');
        //findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
        $aNiVEau = $generalHelper->getRepository('DebitBundle:NivEau2')->findBy($criteria);
        
        
        if (!$nivEau_version1 || !$nivEau_version2 || !$nivEau_version3 || !$nivEau_version4) {
            throw $this->createNotFoundException(
                'No NivEau (niv_eau_2) found for id '.$id
            );
        }
        
        $paramsView = array();
        $paramsView['nivEau_version1'] = $nivEau_version1;
        $paramsView['nivEau_version2'] = $nivEau_version2;
        $paramsView['nivEau_version3'] = $nivEau_version3;
        $paramsView['nivEau_version4'] = $nivEau_version4;
        $paramsView['aNiVEau'] = $aNiVEau;
        
        // ... do something, like pass the $product object into a template
        return $this->render(
                'DebitBundle:Debit:show.html.twig', 
                $paramsView
            );
    }
    
    public function showAllAction()
    {
        $nivEau = $this->getDoctrine()
            ->getRepository('DebitBundle:NivEau2')
            ->find(1);

        if (!$nivEau) {
            throw $this->createNotFoundException(
                'No NivEau (niv_eau_2) found for id '.$id
            );
        }
        
        // ... do something, like pass the $product object into a template
        return $this->render('DebitBundle:Debit:showAll.html.twig', array('nivEau' => $nivEau));
    }
    
    public function showStatTestAction()
    {
        $chart = $this->get('debit.chart');
        
        return $this->render('DebitBundle:Debit:showStatTest.html.twig', ['amountByYear' => $chart->amountByYear()]);
    }
    
    public function showStat1Action()
    {
        /* @var $chart Chart */
        $chart = $this->get('debit.chart');
        
        $paramsView = [
            //'amountByYear' => $chart->amountByYear(),
            'debitLignonDuForez' => $chart->debitLignonDuForez(),
            'debitLoire' => $chart->debitLoire(),
            'debitRhone' => $chart->debitRhone()
        ];
        
        return $this->render('DebitBundle:Debit:showStat1.html.twig', $paramsView);
    }
}
