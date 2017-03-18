<?php
namespace In2code\In2contact\Domain\Model;

use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Single contact
 */
class Contact extends AbstractEntity
{
    /**
     * @var int
     */
    protected $gender = 0;

    /**
     * @var string
     */
    protected $title = '';

    /**
     * @var string
     * @validate NotEmpty
     */
    protected $firstName = '';

    /**
     * @var string
     * @validate NotEmpty
     */
    protected $lastName = '';

    /**
     * @var string
     */
    protected $company = '';

    /**
     * @var string
     */
    protected $phone = '';

    /**
     * @var string
     */
    protected $fax = '';

    /**
     * @var string
     */
    protected $email = '';

    /**
     * @var string
     */
    protected $link = '';

    /**
     * @var string
     */
    protected $description = '';

    /**
     * @var \DateTime
     */
    protected $dateOfBirth = null;

    /**
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @cascade remove
     */
    protected $image = null;

    /**
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @cascade remove
     */
    protected $attachments = null;

    /**
     * @return int $gender
     */
    public function getGender(): int
    {
        return $this->gender;
    }

    /**
     * @param int $gender
     * @return Contact
     */
    public function setGender(int $gender): Contact
    {
        $this->gender = $gender;
        return $this;
    }

    /**
     * @return string $title
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Contact
     */
    public function setTitle(string $title): Contact
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string $firstName
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return Contact
     */
    public function setFirstName(string $firstName): Contact
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string $lastName
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return Contact
     */
    public function setLastName(string $lastName): Contact
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitleAndName(): string
    {
        return $this->getTitle() . ' ' . $this->getFirstName() . ' ' . $this->getLastName();
    }

    /**
     * @return string $company
     */
    public function getCompany(): string
    {
        return $this->company;
    }

    /**
     * @param $company
     * @return Contact
     */
    public function setCompany($company): Contact
    {
        $this->company = $company;
        return $this;
    }

    /**
     * @return string $phone
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     * @return Contact
     */
    public function setPhone(string $phone): Contact
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return string $fax
     */
    public function getFax(): string
    {
        return $this->fax;
    }

    /**
     * @param string $fax
     * @return Contact
     */
    public function setFax(string $fax): Contact
    {
        $this->fax = $fax;
        return $this;
    }

    /**
     * @return string $email
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Contact
     */
    public function setEmail(string $email): Contact
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string $link
     */
    public function getLink(): string
    {
        return $this->link;
    }

    /**
     * @param string $link
     * @return Contact
     */
    public function setLink($link): Contact
    {
        $this->link = $link;
        return $this;
    }

    /**
     * @return string $description
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Contact
     */
    public function setDescription(string $description): Contact
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return \DateTime $dateOfBirth
     */
    public function getDateOfBirth(): \DateTime
    {
        return $this->dateOfBirth;
    }

    /**
     * @param \DateTime $dateOfBirth
     * @return Contact
     */
    public function setDateOfBirth(\DateTime $dateOfBirth): Contact
    {
        $this->dateOfBirth = $dateOfBirth;
        return $this;
    }

    /**
     * @return FileReference $image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param FileReference $image
     * @return Contact
     */
    public function setImage(FileReference $image): Contact
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return FileReference $attachments
     */
    public function getAttachments()
    {
        return $this->attachments;
    }

    /**
     * @param FileReference $attachments
     * @return Contact
     */
    public function setAttachments(FileReference $attachments): Contact
    {
        $this->attachments = $attachments;
        return $this;
    }
}
