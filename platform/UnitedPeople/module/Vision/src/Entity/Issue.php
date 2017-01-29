<?php

namespace Vision\Entity;

use Doctrine\ORM\Mapping as ORM;
use Entity\IssueInterface;
use JsonSerializable;

/**
 * Class Issue
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Vision\Entity
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 *
 * @ORM\Entity(repositoryClass="IssueRepository")
 * @ORM\Table()
 */
class Issue implements JsonSerializable, IssueInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(name="name", type="string", length=32)
     * @var string
     */
    private $name;

    /**
     * Application constructor.
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
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
            'name' => $this->name
        ];
    }

    public function equals(IssueInterface $issue)
    {
        // TODO: Implement equals() method.
    }

    public function getAffectedVersions()
    {
        // TODO: Implement getAffectedVersions() method.
    }

    public function getFixVersions()
    {
        // TODO: Implement getFixVersions() method.
    }

    public function getDueDate()
    {
        // TODO: Implement getDueDate() method.
    }

    public function getSecurityLevelId()
    {
        // TODO: Implement getSecurityLevelId() method.
    }

    public function getPriority()
    {
        // TODO: Implement getPriority() method.
    }

    public function getPriorityObject()
    {
        // TODO: Implement getPriorityObject() method.
    }

    public function getResolutionId()
    {
        // TODO: Implement getResolutionId() method.
    }

    public function getResolutionObject()
    {
        // TODO: Implement getResolutionObject() method.
    }

    public function getKey()
    {
        // TODO: Implement getKey() method.
    }

    public function getNumber()
    {
        // TODO: Implement getNumber() method.
    }

    public function getVotes()
    {
        // TODO: Implement getVotes() method.
    }

    public function getWatches()
    {
        // TODO: Implement getWatches() method.
    }

    public function getCreated()
    {
        // TODO: Implement getCreated() method.
    }

    public function getUpdated()
    {
        // TODO: Implement getUpdated() method.
    }

    public function getResolutionDate()
    {
        // TODO: Implement getResolutionDate() method.
    }

    public function getWorkflowId()
    {
        // TODO: Implement getWorkflowId() method.
    }

    public function getCustomFieldValue()
    {
        // TODO: Implement getCustomFieldValue() method.
    }

    public function getStatusId()
    {
        // TODO: Implement getStatusId() method.
    }

    public function getStatusObject()
    {
        // TODO: Implement getStatusObject() method.
    }

    public function getOriginalEstimate()
    {
        // TODO: Implement getOriginalEstimate() method.
    }

    public function getEstimate()
    {
        // TODO: Implement getEstimate() method.
    }

    public function getTimeSpent()
    {
        // TODO: Implement getTimeSpent() method.
    }

    public function getExternalFieldValue()
    {
        // TODO: Implement getExternalFieldValue() method.
    }

    public function isSubTask()
    {
        // TODO: Implement isSubTask() method.
    }

    public function getParentId()
    {
        // TODO: Implement getParentId() method.
    }

    public function isCreated()
    {
        // TODO: Implement isCreated() method.
    }

    public function getParentObject()
    {
        // TODO: Implement getParentObject() method.
    }

    public function getSubTaskObjects()
    {
        // TODO: Implement getSubTaskObjects() method.
    }

    public function isEditable()
    {
        // TODO: Implement isEditable() method.
    }

    public function getIssueRenderContext()
    {
        // TODO: Implement getIssueRenderContext() method.
    }

    public function getAttachments()
    {
        // TODO: Implement getAttachments() method.
    }

    public function getLabels()
    {
        // TODO: Implement getLabels() method.
    }

    public function hashCode()
    {
        // TODO: Implement hashCode() method.
    }
}
