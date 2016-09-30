<?php
// src/AppBundle/Command/GreetCommand.php
namespace DebitBundle\Command;

use DateTime;
use DebitBundle\Entity\NivEau2;
use DebitBundle\Helper\GeneralHelper;
use Exception;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

//C:\xampp\htdocs\gestion_peche>php bin/console Debit:recup
class RecupDebitCommand extends ContainerAwareCommand
{
	protected function configure()
	{
		$this ->setName('Debit:recup')
			->setDescription('Greet someone')
			->addArgument( 'name', InputArgument::OPTIONAL, 'Who do you want to greet?' )
			->addOption( 'yell', null, InputOption::VALUE_NONE, 'If set, the task will yell in uppercase letters' );
	}
	
	protected function execute(InputInterface $input, OutputInterface $output)
	{
            try {
                $name = $input->getArgument('name');
		if ($name)
		{
			$text = 'Hello '.$name;
		}
		else
		{
			$text = 'Hello';
		}
		
		if ($input->getOption('yell'))
		{
			$text = strtoupper($text);
		}
		
		$output->writeln($text);
                
                //###################################################################
                //###################################################################
                //###################################################################
                $aStation = array();
                //http://www.vigicrues.gouv.fr/niveau3.php?CdEntVigiCru=10&CdStationHydro=K075321001
                //http://www.vigicrues.gouv.fr/niveau3.php?CdStationHydro=K075321001&typegraphe=h&AffProfondeur=168&AffRef=auto&nbrstations=12&ong=1&Submit=Refaire+le+graphique+-+Valider+la+s%C3%A9lection
                //http://www.vigicrues.gouv.fr/niveau3.php?CdStationHydro=K075321001&typegraphe=q&AffProfondeur=168
                $aStation[] = array('id' => 468, 'CdStationHydro' => 'K075321001', 'nom' => "lignon du forez (Boen-sur-Lignon)");
                //CdStationHydro=K077322001
                //http://www.vigicrues.gouv.fr/niveau3.php?CdStationHydro=K077322001&typegraphe=q&AffProfondeur=168
                $aStation[] = array('id' => 469, 'CdStationHydro' => 'K077322001', 'nom' => "lignon du forez (Poncins)");
                //http://www.vigicrues.gouv.fr/niveau3.php?CdStationHydro=K079001010&typegraphe=q&AffProfondeur=168
                $aStation[] = array('id' => 470, 'CdStationHydro' => 'K079001010', 'nom' => "Loire (Balbigny)");
                //http://www.vigicrues.gouv.fr/niveau3.php?CdStationHydro=K069001001&typegraphe=q&AffProfondeur=168
                $aStation[] = array('id' => 463, 'CdStationHydro' => 'K069001001', 'nom' => "Loire (Montrond-les-bains)");
                //http://www.vigicrues.gouv.fr/niveau3.php?CdStationHydro=K060001001&typegraphe=q&AffProfondeur=168
                $aStation[] = array('id' => 455, 'CdStationHydro' => 'K060001001', 'nom' => "Loire (Grangent)");
                //http://www.vigicrues.gouv.fr/niveau3.php?CdStationHydro=V303002002&typegraphe=q&AffProfondeur=168
                $aStation[] = array('id' => 5151, 'CdStationHydro' => 'V303002002', 'nom' => "Rhône (Ternay)");
                //http://www.vigicrues.gouv.fr/niveau3.php?CdStationHydro=V401001002&typegraphe=q&AffProfondeur=24&AffRef=auto&nbrstations=7&ong=1
                $aStation[] = array('id' => 51512, 'CdStationHydro' => 'V401001002', 'nom' => "Rhône (Valence [Pont])");
                //http://www.vigicrues.gouv.fr/niveau3.php?CdStationHydro=K077322001&typegraphe=q&AffProfondeur=168
                //$aStation[] = array('id' => 5151, 'CdStationHydro' => 'K077322001', 'nom' => "Rhône (Pont-Morand)");
                //V163002001 => Lagnieu [Pont de Lagnieu] rhône
                //V401001002 => Valence [Pont] rhône
                //http://www.vigicrues.gouv.fr/niveau3.php?CdStationHydro=V303002002&typegraphe=q&AffProfondeur=168
                $aStation[] = array('id' => 45511, 'CdStationHydro' => 'K055001010', 'nom' => "Bas-en-Basset (Loire)");
                
                
                $aStation[] = array('id' => 0, 'CdStationHydro' => 'K073322001', 'nom' => "lignon du forez (Chalmazel)");
                $aStation[] = array('id' => 0, 'CdStationHydro' => 'K064311001', 'nom' => "la mare (Vérines)");
                
                //$iProfondeur = 24;//1 jour
                //$iProfondeur = 72;//3 jours
                $iProfondeur = 168;//7 jours
                //$iProfondeur = 369;//16 jours //maximum que j'ai pu voir pour sur site
                
                foreach ($aStation as $uneStation)
                {
                        //$stationId = 468;
                        //$stationNom = "lignon du forez (Boen-sur-Lignon)";
                        $stationId = $uneStation['id'];
                        $sCdStationHydro = $uneStation['CdStationHydro'];
                        $stationNom = $uneStation['nom'];

                        //$sUrl = 'http://www.vigicrues.gouv.fr/niveau3.php?idstation='.$stationId.'&typegraphe=q&AffProfondeur='.$iProfondeur.'&AffRef=auto&nbrstations=41&ong=1&Submit=Refaire+le+graphique+-+Valider+la+s%C3%A9lection';
                        $sUrl = 'http://www.vigicrues.gouv.fr/niveau3.php?CdStationHydro='.$sCdStationHydro.'&typegraphe=q&AffProfondeur='.$iProfondeur.'';
                        $output->writeln($sUrl);
                        $homepage = file_get_contents($sUrl);
                        
                        $subject = $homepage;
                        $pattern = '/area.*/';
                        //preg_match($pattern, $subject, $matches, PREG_OFFSET_CAPTURE, 3);
                        preg_match_all($pattern, $subject, $matches, PREG_OFFSET_CAPTURE, 3);
                        //echo '<pre>' . print_r($matches, true) . '</pre>';
                        
                        foreach ($matches[0] as $key => $aValue)
                        {
                            //$output->writeln($key . ' => ' . print_r($aValue, true));
                            
                            $sArea = $aValue[0];
                            $sNumCaract = $aValue[1];
                            
                            //echo $sArea . '<br/>';
                            
                            //$pattern = '/area
                            //$pattern2 = '/title=\"(.*)\" /';
                            //$pattern2 = '/title=\"[0-9a-zA-Z]\"/';
                            $pattern2 = '/title=\"[^\"]*/';
                            //preg_match($pattern, $sArea, $matches, PREG_OFFSET_CAPTURE, 3);
                            preg_match_all($pattern2, $sArea, $matches2, PREG_OFFSET_CAPTURE, 3);
                            //echo '<pre>';var_dump($matches2);
                            foreach ($matches2[0] as $key2 => $aValue2)
                            {
                                    $sTitle = $aValue2[0];
                                    $sNumCaractTitle = $aValue2[1];
                                    
                                    //echo $sTitle . '<br/>';
                                    
                                    $sTitle = str_replace('title="', '', $sTitle);
                                    
                                    $aExplode = explode(' ', $sTitle);
                                    
                                    $sDate = $aExplode[0];
                                    $sHeure = $aExplode[1];
                                    $sMesure = $aExplode[5];
                                    
                                    //Avant le 2016-04-22
                                    //if ($sHeure != '09:00' && $sHeure != '12:00' && $sHeure != '17:00' && $sHeure != '20:00' && $sHeure != '02:00' && $sHeure != '06:00')
                                    if (
                                        $sHeure != '00:00' && $sHeure != '02:00' && $sHeure != '4:00' && $sHeure != '06:00' && 
                                        $sHeure != '08:00' && $sHeure != '10:00' && $sHeure != '12:00' && 
                                        $sHeure != '14:00' && $sHeure != '16:00' && $sHeure != '18:00' && 
                                        $sHeure != '20:00' && $sHeure != '22:00'
                                    )
                                    {
                                            continue;
                                    }
                                    
                                    //echo $sDate . ' ' . $sHeure . ' ' . $sMesure . '<br/>';
                                    $output->writeln($sDate . ' ' . $sHeure . ' ' . $sMesure);
                                    
                                    $aExplodeDate = explode('/', $sDate);
                                    
                                    //$oDateDebit = new \DateTime($aExplodeDate[2].'-'.$aExplodeDate[1].'-'.$aExplodeDate[0]);
                                    //$dateDebit = $oDateDebit->format('Y-m-d') . ' ' . $sHeure;
                                    
                                    $oDateDebit = new DateTime($aExplodeDate[2].'-'.$aExplodeDate[1].'-'.$aExplodeDate[0] . ' ' . $sHeure);
                                    //$dateDebit = $oDateDebit->format('Y-m-d') . ' ' . $sHeure;
                                    
                                    //INSERT INTO `gestionpeche`.`niv_eau_2` (`station_id`, `station_nom`, `date_debit`, `debit`) VALUES ('468', 'lignon du forez (Boen-sur-Lignon)', '2014-04-15 18:00:00', '3');
                                    //$sSql = "INSERT IGNORE INTO `gestionpeche`.`niv_eau_2` (`station_id`, `station_nom`, `date_debit`, `debit`) VALUES ('".$stationId."', '".$stationNom."', '".$dateDebit."', '".$sMesure."');";
                                    //echo $sSql . '<br/>';
                                    //$output->writeln($sSql);
                                    
                                    $em = $this->getContainer()->get('doctrine')->getManager();
                                    
                                    /* @var $generalHelper GeneralHelper */
                                    $generalHelper = $this->getContainer()->get('debit.general_helper');
                                    
                                    //find with criteria
                                    $criteria = array();
                                    $criteria['stationId'] = $stationId;
                                    $criteria['cdstationhydro'] = $sCdStationHydro;
                                    $criteria['dateDebit'] = $oDateDebit;
                                    //findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
                                    $aNivEau2 = $generalHelper->getRepository('DebitBundle:NivEau2')->findBy($criteria);
                                    
                                    if (count($aNivEau2) <= 0)
                                    {
                                        $nivEau2 = new NivEau2();
                                        $nivEau2->setDateDebit($oDateDebit);//new \DateTime()
                                        $nivEau2->setDebit($sMesure);
                                        $nivEau2->setStationId($stationId);
                                        $nivEau2->setCdstationhydro($sCdStationHydro);
                                        $nivEau2->setStationNom($stationNom);
                                        
                                        $output->writeln('nivEau: ' . print_r($nivEau2, true));
                                        
                                        //$em = $this->getDoctrine()->getManager();
                                        
                                        $em->persist($nivEau2);
                                        $em->flush();
                                    }
                                    else
                                    {
                                        $output->writeln('nivEau2: not insert');
                                    }
                                    //$result = connectBase::insert( $sSql );
                            }
                            //echo '<br/>';
                        }
                }
                //###################################################################
                //###################################################################
                //###################################################################
            } catch (Exception $exc) {
                $output->writeln('<error>Message Erreur : ' . $exc->getMessage() . ' </error>');
                $output->writeln('<error>Fichier Erreur : ' . $exc->getFile() . ' </error>');
                $output->writeln('<error>Ligne Erreur : ' . $exc->getLine() . ' </error>');
                //echo $exc->getTraceAsString();
                $output->writeln('<error>getTraceAsString : ' . $exc->getTraceAsString() . ' </error>');
            }
	}
}
?>
