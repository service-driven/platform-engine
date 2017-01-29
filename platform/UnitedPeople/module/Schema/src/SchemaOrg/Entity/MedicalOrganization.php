<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A medical organization (physical or not), such as hospital, institution or clinic.
 *
 * @see http://schema.org/MedicalOrganization Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class MedicalOrganization extends Organization
{
}
