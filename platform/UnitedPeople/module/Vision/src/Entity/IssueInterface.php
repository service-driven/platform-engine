<?php

namespace Entity;

/**
 * Interface IssueInterface
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Entity
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
interface IssueInterface
{
    public function equals(IssueInterface $issue);

    public function getAffectedVersions();

    public function getFixVersions();

    public function getDueDate();

    public function getSecurityLevelId();

    public function getPriority();

    public function getPriorityObject();

    public function getResolutionId();

    public function getResolutionObject();

    public function getKey();

    public function getNumber();

    public function getVotes();

    public function getWatches();

    public function getCreated();

    public function getUpdated();

    public function getResolutionDate();

    public function getWorkflowId();

    public function getCustomFieldValue();

    public function getStatusId();

    public function getStatusObject();

    public function getOriginalEstimate();

    public function getEstimate();

    public function getTimeSpent();

    public function getExternalFieldValue();

    public function isSubTask();

    public function getParentId();

    public function isCreated();

    public function getParentObject();

    public function getSubTaskObjects();

    public function isEditable();

    public function getIssueRenderContext();

    public function getAttachments();

    public function getLabels();

    public function hashCode();
}
