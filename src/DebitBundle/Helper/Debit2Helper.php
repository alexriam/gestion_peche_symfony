<?php
namespace DebitBundle\Helper;

/**
 * Description of DebitHelper
 *
 * @author acrepet
 */
class Debit2Helper
{
    protected $em;
    
    function __construct(\Doctrine\ORM\EntityManager $em) {
        $this->em = $em;
    }

    
    public function getRepository()
    {
        return $this->em->getRepository('DebitBundle:NivEau2');
    }
}
