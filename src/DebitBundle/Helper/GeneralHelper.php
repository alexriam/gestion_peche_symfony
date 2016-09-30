<?php
namespace DebitBundle\Helper;

/**
 * Description of DebitHelper
 *
 * @author acrepet
 */
class GeneralHelper
{
    protected $em;
    
    function __construct(\Doctrine\ORM\EntityManager $em) {
        $this->em = $em;
    }

    /**
     * 
     * @param string $entityName
     * @return \Doctrine\ORM\EntityRepository
     */
    public function getRepository($entityName)
    {
        return $this->em->getRepository($entityName);
    }
}
