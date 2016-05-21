<?php

namespace WebsiteBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;


/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 * @Vich\Uploadable
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     *
     * @ORM\OneToMany(targetEntity="WebsiteBundle\Entity\Topics", mappedBy="sujetUserLink")
     */
    private $userSujetLink;

    /**
     *
     * @ORM\OneToMany(targetEntity="WebsiteBundle\Entity\Reply", mappedBy="replyUserLink")
     */
    private $userReplyLink;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="product_image", fileNameProperty="imageName", nullable=true)
     *
     * @var File
     */
    private $imageFile;

    /**
     * @var string
     *
     * @ORM\Column(name="rang", length=255)
     */
    private $rang = "Membre";

    /**
     * @var integer
     *
     * @ORM\Column(name="nbposts", type="integer", nullable=true)
     */
    private $nbPosts;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="joined_at", type="datetime")
     */
    private $joinedAt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @var string
     */
    private $imageName = 'default.jpg';

    /**
     * @ORM\Column(type="datetime", nullable=true)
     *
     * @var \DateTime
     */
    private $updatedAt;

    public function __construct()
    {
        parent::__construct();
        $this->joinedAt = new \DateTime();
    }

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     *
     * @return Product
     */
    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        if ($image) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTime('now');
        }

        return $this;
    }

    /**
     * @return File
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * @param string $imageName
     *
     * @return Product
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;

        return $this;
    }

    /**
     * @return string
     */
    public function getImageName()
    {
        return $this->imageName;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return User
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set reply
     *
     * @param integer $reply
     *
     * @return User
     */
    public function setReply($reply)
    {
        $this->reply = $reply;

        return $this;
    }

    /**
     * Get reply
     *
     * @return integer
     */
    public function getReply()
    {
        return $this->reply;
    }

    /**
     * Add userSujetLink
     *
     * @param \WebsiteBundle\Entity\Topics $userSujetLink
     *
     * @return User
     */
    public function addUserSujetLink(\WebsiteBundle\Entity\Topics $userSujetLink)
    {
        $this->userSujetLink[] = $userSujetLink;

        return $this;
    }

    /**
     * Remove userSujetLink
     *
     * @param \WebsiteBundle\Entity\Topics $userSujetLink
     */
    public function removeUserSujetLink(\WebsiteBundle\Entity\Topics $userSujetLink)
    {
        $this->userSujetLink->removeElement($userSujetLink);
    }

    /**
     * Get userSujetLink
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUserSujetLink()
    {
        return $this->userSujetLink;
    }

    /**
     * Set rang
     *
     * @param string $rang
     *
     * @return User
     */
    public function setRang($rang)
    {
        $this->rang = $rang;

        return $this;
    }

    /**
     * Get rang
     *
     * @return string
     */
    public function getRang()
    {
        return $this->rang;
    }

    /**
     * Set nbPosts
     *
     * @param integer $nbPosts
     *
     * @return User
     */
    public function setNbPosts($nbPosts)
    {
        $this->nbPosts = $nbPosts;

        return $this;
    }

    /**
     * Get nbPosts
     *
     * @return integer
     */
    public function getNbPosts()
    {
        return $this->nbPosts;
    }

    /**
     * Set joinedAt
     *
     * @param \DateTime $joinedAt
     *
     * @return User
     */
    public function setJoinedAt($joinedAt)
    {
        $this->joinedAt = $joinedAt;

        return $this;
    }

    /**
     * Get joinedAt
     *
     * @return \DateTime
     */
    public function getJoinedAt()
    {
        return $this->joinedAt;
    }

    /**
     * Add userReplyLink
     *
     * @param \WebsiteBundle\Entity\Reply $userReplyLink
     *
     * @return User
     */
    public function addUserReplyLink(\WebsiteBundle\Entity\Reply $userReplyLink)
    {
        $this->userReplyLink[] = $userReplyLink;

        return $this;
    }

    /**
     * Remove userReplyLink
     *
     * @param \WebsiteBundle\Entity\Reply $userReplyLink
     */
    public function removeUserReplyLink(\WebsiteBundle\Entity\Reply $userReplyLink)
    {
        $this->userReplyLink->removeElement($userReplyLink);
    }

    /**
     * Get userReplyLink
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUserReplyLink()
    {
        return $this->userReplyLink;
    }
}
