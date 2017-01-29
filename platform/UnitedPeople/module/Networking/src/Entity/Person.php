<?php

namespace Networking\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Db\Sql\Ddl\Column\Date;

/**
 * Class Person
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
 * @ORM\Table(name="person")
 */
class Person extends Thing
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     *
     * @var int
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=200)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="given_name", type="string", length=200)
     */
    protected $givenName;

    /**
     * @var Image
     *
     * @ORM\OneToOne(targetEntity="Image")
     * @ORM\JoinColumn(name="image_id", referencedColumnName="id")
     */
    protected $image;

    /**
     * @var Address
     *
     * @ORM\OneToOne(targetEntity="Address")
     * @ORM\JoinColumn(name="address_id", referencedColumnName="id")
     */
    protected $address;

    /**
     * @var Organization
     *
     * @ORM\ManyToOne(targetEntity="Organization")
     * @ORM\JoinColumn(name="address_id", referencedColumnName="id")
     */
    protected $worksFor;

    /**
     * @var Organization
     *
     *
     * @ORM\ManyToMany(targetEntity="Organization")
     * @ORM\JoinTable(name="person_memberships",
     *    joinColumns={@ORM\JoinColumn(name="person_id", referencedColumnName="id")},
     *    inverseJoinColumns={@ORM\JoinColumn(name="organization_id", referencedColumnName="id")}
     * )
     */
    protected $memberOf;

    /**
     * @var string
     *
     * @ORM\Column(name="job_title", type="string", length=200)
     */
    protected $jobTitle;

    /**
     * @var Person
     *
     * @ORM\ManyToMany(targetEntity="Person")
     * @ORM\JoinTable(name="person_connections",
     *    joinColumns={@ORM\JoinColumn(name="person_id", referencedColumnName="id")},
     *    inverseJoinColumns={@ORM\JoinColumn(name="connection_id", referencedColumnName="id")}
     * )
     */
    protected $knows;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=200)
     */
    protected $gender;

    /**
     * @var Person
     *
     * @ORM\ManyToMany(targetEntity="Person")
     * @ORM\JoinTable(name="person_followers",
     *    joinColumns={@ORM\JoinColumn(name="person_id", referencedColumnName="id")},
     *    inverseJoinColumns={@ORM\JoinColumn(name="follower_id", referencedColumnName="id")}
     * )
     */
    protected $follows;

    /**
     * @var Date
     *
     * @ORM\Column(name="birth_date", type="string", length=200)
     */
    protected $birthDate;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=200)
     */
    protected $email;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return void
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return void
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getGivenName(): string
    {
        return $this->givenName;
    }

    /**
     * @param string $givenName
     *
     * @return void
     */
    public function setGivenName(string $givenName)
    {
        $this->givenName = $givenName;
    }

    /**
     * @return Image
     */
    public function getImage(): Image
    {
        return $this->image;
    }

    /**
     * @param Image $image
     *
     * @return void
     */
    public function setImage(Image $image)
    {
        $this->image = $image;
    }

    /**
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->address;
    }

    /**
     * @param Address $address
     *
     * @return void
     */
    public function setAddress(Address $address)
    {
        $this->address = $address;
    }

    /**
     * @return Organization
     */
    public function getWorksFor(): Organization
    {
        return $this->worksFor;
    }

    /**
     * @param Organization $worksFor
     *
     * @return void
     */
    public function setWorksFor(Organization $worksFor)
    {
        $this->worksFor = $worksFor;
    }

    /**
     * @return Organization
     */
    public function getMemberOf(): Organization
    {
        return $this->memberOf;
    }

    /**
     * @param Organization $memberOf
     *
     * @return void
     */
    public function setMemberOf(Organization $memberOf)
    {
        $this->memberOf = $memberOf;
    }

    /**
     * @return string
     */
    public function getJobTitle(): string
    {
        return $this->jobTitle;
    }

    /**
     * @param string $jobTitle
     *
     * @return void
     */
    public function setJobTitle(string $jobTitle)
    {
        $this->jobTitle = $jobTitle;
    }

    /**
     * @return Person
     */
    public function getKnows(): Person
    {
        return $this->knows;
    }

    /**
     * @param Person $knows
     *
     * @return void
     */
    public function setKnows(Person $knows)
    {
        $this->knows = $knows;
    }

    /**
     * @return string
     */
    public function getGender(): string
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     *
     * @return void
     */
    public function setGender(string $gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return Person
     */
    public function getFollows(): Person
    {
        return $this->follows;
    }

    /**
     * @param Person $follows
     *
     * @return void
     */
    public function setFollows(Person $follows)
    {
        $this->follows = $follows;
    }

    /**
     * @return Date
     */
    public function getBirthDate(): Date
    {
        return $this->birthDate;
    }

    /**
     * @param Date $birthDate
     *
     * @return void
     */
    public function setBirthDate(Date $birthDate)
    {
        $this->birthDate = $birthDate;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return void
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }




}
