<?php

namespace Networking\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Image
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Networking\Entity
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 *
 * @ORM\Entity
 * @ORM\Table(name="image")
 */
class Image
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="indent_id_seq", allocationSize=1, initialValue=1)
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="content_url", type="string", length=50, nullable=true)
     */
    protected $contentUrl;

    /**
     * @return mixed
     */
    public function getContentUrl()
    {
        return $this->contentUrl;
    }

    /**
     * @param mixed $contentUrl
     *
     * @return void
     */
    public function setContentUrl(mixed $contentUrl)
    {
        $this->contentUrl = $contentUrl;
    }


}
