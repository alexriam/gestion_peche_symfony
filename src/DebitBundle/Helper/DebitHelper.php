<?php
namespace DebitBundle\Helper;

/**
 * Description of DebitHelper
 *
 * @author acrepet
 */
class DebitHelper 
{
    protected $em;
    
    function __construct(\Doctrine\ORM\EntityManager $em) {
        $this->em = $em;
    }

    
    public function find($id)
    {
        return $this->em->getRepository('DebitBundle:NivEau2')->find($id);
    }
}
