<?php


namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * The basic data types such as Integers, Strings, etc.
 * 
 * @see http://schema.org/DataType Documentation on Schema.org
 * 
 * @ORM\Entity
 */
class DataType
{

    /**
     * @var integer 
     * 
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * Sets id.
     * 
     * @param  integer $id
     * 
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets id.
     * 
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

}
