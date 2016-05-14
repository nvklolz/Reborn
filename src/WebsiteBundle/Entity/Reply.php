<?php

namespace WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reply
 *
 * @ORM\Table(name="reply")
 * @ORM\Entity(repositoryClass="WebsiteBundle\Repository\ReplyRepository")
 */
class Reply
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="posted_at", type="datetime")
     */
    private $postedAt;

    /**
     * @var string
     * @ORM\OneToMany(targetEntity="WebsiteBundle\Entity\User", mappedBy="reply")
     */
    private $userName;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Reply
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set postedAt
     *
     * @param \DateTime $postedAt
     *
     * @return Reply
     */
    public function setPostedAt($postedAt)
    {
        $this->postedAt = $postedAt;

        return $this;
    }

    /**
     * Get postedAt
     *
     * @return \DateTime
     */
    public function getPostedAt()
    {
        return $this->postedAt;
    }

    /**
     * Set userName
     *
     * @param string $userName
     *
     * @return Reply
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;

        return $this;
    }

    /**
     * Get userName
     *
     * @return string
     */
    public function getUserName()
    {
        return $this->userName;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->postedAt = new \DateTime();
        $this->userName = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add userName
     *
     * @param \WebsiteBundle\Entity\User $userName
     *
     * @return Reply
     */
    public function addUserName(\WebsiteBundle\Entity\User $userName)
    {
        $this->userName[] = $userName;

        return $this;
    }

    /**
     * Remove userName
     *
     * @param \WebsiteBundle\Entity\User $userName
     */
    public function removeUserName(\WebsiteBundle\Entity\User $userName)
    {
        $this->userName->removeElement($userName);
    }
}
