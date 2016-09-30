<?php

namespace PriseBundle\Controller;

use DebitBundle\Chart\Chart;
use PriseBundle\Entity\Prise3;
use PriseBundle\Form\Prise3Form;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PriseController extends Controller
{
    public function indexAction()
    {
        return $this->render('PriseBundle:Prise:index.html.twig');
    }
    
    public function showAllAction()
    {
        /*$prise3 = $this->getDoctrine()
            ->getRepository('PriseBundle:Prise3')
            ->find(1);
        
        if (!$prise3) {
            throw $this->createNotFoundException(
                'No Prise3 found for id '.$id
            );
        }
        
        // ... do something, like pass the $product object into a template
        return $this->render('PriseBundle:Prise:showAll.html.twig', array('prise3' => $prise3));*/
        
        $criteria = array();
        $orderBy = array('sessionPecheId' => 'DESC');
        $limit = 5;
        $offset = 0;
        $sessionPeche3All = $this->getDoctrine()
            ->getRepository('PriseBundle:SessionPeche3')
            ->findBy($criteria, $orderBy, $limit, $offset);
        
        $criteria = array();
        $orderBy = array();
        $limit = 20;
        $offset = 0;
        $prise3All = $this->getDoctrine()
            ->getRepository('PriseBundle:Prise3')
            ->findBy($criteria, $orderBy, $limit, $offset);
        
         if (!$prise3All) {
            throw $this->createNotFoundException(
                'No Prise3 found for id '.$id
            );
        }
        
        // ... do something, like pass the $product object into a template
        return $this->render('PriseBundle:Prise:showAll.html.twig', array(
                'sessionPeche3All' => $sessionPeche3All,
                'sessionPeche3' => $sessionPeche3All[0],
                'prise3All' => $prise3All,
                'prise3' => $prise3All[0]
            )
        );
    }
    
    public function showStat1Action()
    {
        /* @var $chart Chart */
        $chart = $this->get('debit.chart');
        
        $paramsView = [
            //'amountByYear' => $chart->amountByYear(),
            //'debitLignonDuForez' => $chart->debitLignonDuForez(),
            //'debitLoire' => $chart->debitLoire(),
            'poissonOnYear' => $chart->poissonOnYear(0)
        ];
        
        return $this->render('PriseBundle:Prise:showStat1.html.twig', $paramsView);
    }
    
    public function showStatPoissonAnneeAction()
    {
        /* @var $chart Chart */
        $chart = $this->get('debit.chart');
        
        $paramsView = [
            //'amountByYear' => $chart->amountByYear(),
            //'debitLignonDuForez' => $chart->debitLignonDuForez(),
            //'debitLoire' => $chart->debitLoire(),
            'poissonOnYear' => $chart->poissonOnYear(date('Y')),
            'poissonOnYearPrec' => $chart->poissonOnYear(date('Y')-1),
            'poissonOnYearPrec2' => $chart->poissonOnYear(date('Y')-2),
            'poissonOnYearPrec3' => $chart->poissonOnYear(date('Y')-3)
        ];
        
        return $this->render('PriseBundle:Prise:showStatPoissonAnnee.html.twig', $paramsView);
    }
    
    public function showStatPoissonMoyTailleAnneeAction()
    {
        /* @var $chart Chart */
        $chart = $this->get('debit.chart');
        
        $paramsView = [
            //'amountByYear' => $chart->amountByYear(),
            //'debitLignonDuForez' => $chart->debitLignonDuForez(),
            //'debitLoire' => $chart->debitLoire(),
            'poissonOnYear' => $chart->poissonMoyTailleOnYear(date('Y')),
            'poissonOnYearPrec' => $chart->poissonMoyTailleOnYear(date('Y')-1),
            'poissonOnYearPrec2' => $chart->poissonMoyTailleOnYear(date('Y')-2),
            'poissonOnYearPrec3' => $chart->poissonMoyTailleOnYear(date('Y')-3)
        ];
        
        return $this->render('PriseBundle:Prise:showStatPoissonMoyTailleAnnee.html.twig', $paramsView);
    }
    
    public function addAction(Request $request)
    {
        $sMessageSurForm = '';
        
        // 1) build the form
    	$prise = new Prise3();
        
        $choices          = ['' => ''];
        
        /*$choices = array(
                    'yes' => true,
                    'no' => false,
                    'maybe' => null,
                    'yes2' => 'true2',
                    'no2' => 'false2',
                    'maybe2' => 'null2',
                    'yes3' => 'true3',
                    'no3' => 'false3',
                    'maybe3' => 'null3',
                );*/
        $table2Repository = $this->getDoctrine()->getRepository('PriseBundle:SessionPeche3');
        //$table2Objects    = $table2Repository->findAll();
        $criteria = array();
        $orderBy = array('sessionPecheId' => 'DESC');
        $limit = 10;
        $offset = 0;
        $table2Objects    = $table2Repository->findBy($criteria, $orderBy, $limit, $offset);

        foreach ($table2Objects as $table2Obj) {
            //$choices[$table2Obj->getSessionPecheId()] = $table2Obj->getLieu() . ' - ' . $table2Obj->getPecheur();
            //$choices[$table2Obj->getLieu() . ' - ' . $table2Obj->getPecheur()] = $table2Obj->getSessionPecheId();
            $choices[$table2Obj->getSessionPecheId() . ' ' . $table2Obj->getDateDeb()->format('d/m/Y')] = $table2Obj->getSessionPecheId();
        }
        
        $form = $this->createForm(Prise3Form::class, $prise);
        $form->add('sessionpecheid', ChoiceType::class, array(
                'required' => true,
                'label' => 'Session peche id: ',
                'choices' => $choices,
                'attr' => array('class' => 'form-control'),
            )
        );
        //echo '$form: ' . get_class($form) . '<br/>';
        //echo '$form sessionpecheid: ' . get_class($form->get('sessionpecheid')) . '<br/>';
        //echo '$form sessionpecheid: ' . get_class($form->get('sessionpecheid')) . '<br/>';
        //$form = $this->createForm('prise.prise3form', $prise);
        //$form = $this->createForm(new Prise3Form(), $prise);
        /* @var $prise3form Prise3Form */
        //$prise3form = $this->get('prise.prise3form');
        //$form = $prise3form->buildForm($this->createFormBuilder(), array());
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            // ... perform some action, such as saving the task to the database
                        
            $em = $this->getDoctrine()->getManager();
            
            //echo '<pre>' . print_r($prise, true);
            //die();
            
            if (empty($prise->getLieuPrecis()))$prise->setLieuPrecis('');
            if (empty($prise->getAppat()))$prise->setAppat('');
            if (empty($prise->getTechnique()))$prise->setTechnique('');
            if (empty($prise->getLeurre()))$prise->setLeurre('');
            if (empty($prise->getTaille()))$prise->setTaille('');
            if (empty($prise->getPoids()))$prise->setPoids('');
            if (empty($prise->getCommentaire()))$prise->setCommentaire('');
            if (empty($prise->getPosLat()))$prise->setPosLat('');
            if (empty($prise->getPosLong()))$prise->setPosLong('');
            
            // tells Doctrine you want to (eventually) save the Product (no queries yet)
            $em->persist($prise);

            // actually executes the queries (i.e. the INSERT query)
            $em->flush();
            
            return $this->redirectToRoute('prise_prise_index');
        }
        
        $paramsView = [
            'sMessageSurForm' => $sMessageSurForm,
            'form' => $form->createView()
        ];
        
        return $this->render('PriseBundle:Prise:add.html.twig', $paramsView);
    }
    
    public function priseAjaxInfosSessionPecheAction($idSessionPeche)
    {
        /*
        //alert(msgjson.dateDeb);
                                //var d = new Date("July 21, 1983 01:15:00");
                                $("input[name='datePrise']").val(msgjson.dateDeb);
                                //$("input[name='datePrise']").val(standardPeriod(-6));
                                //$("input[name='datePrise']").val('2016-04-10');
                                $("input[name='lieu']").val(msgjson.lieu);
                                $("input[name='lieuPrecis']").val(msgjson.lieuPrecis);
                                $("textarea[name='commentaire']").val(msgjson.commentaire);
                                $("input[name='pecheur']").val(msgjson.pecheur);
                                $("select[name='poisson']").val(msgjson.poissonDominant[0]);
                                $("#span_nb_prises").html(msgjson.nbPrises);
        */
        
        /*$aResponseJson = [];
        $aResponseJson['dateDeb'] = '2016-08-08';
        $aResponseJson['lieu'] = 'aa';
        $aResponseJson['lieuPrecis'] = 'bb';
        $aResponseJson['commentaire'] = 'cc';
        $aResponseJson['pecheur'] = 'dd';
        $aResponseJson['poissonDominant'] = ['ee'];
        $aResponseJson['nbPrises'] = 'ff';*/
        
        //return $this->json($aResponseJson);
        
        /*$response = new Response();
        $response->setContent($aResponseJson);
        $response->headers->set('Content-Type', 'application/json');*/
        
        /*$response = new JsonResponse();
        $response->setData(array(
            'data' => 123
        ));*/
        //$response->send();
        //return $response;
        
        //requête
            //Session peche id
        $table2Repository = $this->getDoctrine()->getRepository('PriseBundle:SessionPeche3');
        $criteria = array('sessionPecheId' => $idSessionPeche);
        $orderBy = array('sessionPecheId' => 'DESC');
        $limit = null;
        $offset = null;
        $table2Objects    = $table2Repository->findBy($criteria, $orderBy, $limit, $offset);
        
        foreach ($table2Objects as $table2Obj) {
            //$choices[$table2Obj->getSessionPecheId()] = $table2Obj->getLieu() . ' - ' . $table2Obj->getPecheur();
            //$choices[$table2Obj->getLieu() . ' - ' . $table2Obj->getPecheur()] = $table2Obj->getSessionPecheId();
            //$choices[$table2Obj->getSessionPecheId() . ' ' . $table2Obj->getDateDeb()->format('d/m/Y')] = $table2Obj->getSessionPecheId();
            
            /* @var $oSessionPeche \PriseBundle\Entity\SessionPeche3 */
            $oSessionPeche = $table2Obj;
        }
        
        $repoPrise3 = $this->getDoctrine()->getRepository('PriseBundle:Prise3');
        $criteria = array('sessionPecheId' => $idSessionPeche);
        
        $priseObject = $repoPrise3->findBy($criteria);
        $nbPrises = count($priseObject);
        
        $aResponseJson = [];
        $aResponseJson['dateDeb'] = $oSessionPeche->getDateDeb()->format('Y-m-d');
        $aResponseJson['lieu'] = $oSessionPeche->getLieu();
        $aResponseJson['lieuPrecis'] = $oSessionPeche->getLieuPrecis();
        $aResponseJson['commentaire'] = $oSessionPeche->getCommentaire();
        $aResponseJson['pecheur'] = $oSessionPeche->getPecheur();
        $aResponseJson['poissonDominant'] = $oSessionPeche->getPoissonDominant();
        $aResponseJson['nbPrises'] = $nbPrises;
        
        return new JsonResponse($aResponseJson);
    }
}
