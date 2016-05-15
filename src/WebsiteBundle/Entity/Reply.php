<?php

namespace WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

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
     * @ORM\ManyToOne(targetEntity="WebsiteBundle\Entity\Topics", inversedBy="reply")
     * @ORM\JoinColumn(name="id_topic", referencedColumnName="id")
     */
    private $sujet;

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
     * Constructor
     */
    public function __construct()
    {
        $this->postedAt = new \DateTime();
        $this->sujet = new ArrayCollection();
    }


    /**
     * Set sujet
     *
     * @param \WebsiteBundle\Entity\Topics $sujet
     *
     * @return Reply
     */
    public function setSujet(\WebsiteBundle\Entity\Topics $sujet)
    {
        $this->sujet = $sujet;

        return $this;
    }

    /**
     * Get sujet
     *
     * @return \WebsiteBundle\Entity\Topics
     */
    public function getSujet()
    {
        return $this->sujet;
    }
}
