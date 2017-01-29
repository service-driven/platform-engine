<?php

namespace Vision\Entity;

/**
 * Class Goal
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Vision\Entity
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class Goal
{
    const SLUG = 'goals';

    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(name="title", type="string", length=32)
     * @var string
     */
    private $title;

    /**
     * @ORM\Column(name="category", type="string", length=32)
     * @var string
     */
    private $category;

    /**
     * @ORM\Column(name="description", type="string", length=250)
     * @var string
     */
    private $description;

    /**
     * Goal constructor.
     *
     * @param $title
     * @param $category
     * @param string $description
     */
    public function __construct($title, $category, $description = '')
    {
        $this->title = $title;
        $this->category = $category;
        $this->description = $description;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }



    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
        ];
    }
}
