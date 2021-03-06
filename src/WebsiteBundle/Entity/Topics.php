<?php

namespace WebsiteBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Topics
 *
 * @ORM\Table(name="topics")
 * @ORM\Entity(repositoryClass="WebsiteBundle\Repository\TopicsRepository")
 */
class Topics
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
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * 
     * @ORM\OneToMany(targetEntity="WebsiteBundle\Entity\Reply", mappedBy="sujet")
     */
    private $reply;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbreply", type="integer", nullable=true)
     */
    private $nbReply;

    /**
     * @ORM\ManyToOne(targetEntity="WebsiteBundle\Entity\User", inversedBy="userSujetLink")
     * @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     */
    private $sujetUserLink;

    /**
     * @ORM\ManyToOne(targetEntity="WebsiteBundle\Entity\HeadTopic", inversedBy="topicsLink")
     * @ORM\JoinColumn(name="id_head_topic", referencedColumnName="id")
     */
    private $headTopicLink;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=100)
     */
    private $state = 'normal';



    public function __construct()
    {
        $this->reply = new ArrayCollection();
        $this->createdAt = new \DateTime();
    }

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;


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
     * Set titre
     *
     * @param string $titre
     *
     * @return Topics
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set altTitre
     *
     * @param string $altTitre
     *
     * @return Topics
     */
    public function setAltTitre($altTitre)
    {
        $this->altTitre = $altTitre;

        return $this;
    }

    /**
     * Get altTitre
     *
     * @return string
     */
    public function getAltTitre()
    {
        return $this->altTitre;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Topics
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Topics
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
     * Add reply
     *
     * @param \WebsiteBundle\Entity\Reply $reply
     *
     * @return Topics
     */
    public function addReply(\WebsiteBundle\Entity\Reply $reply)
    {
        $this->reply[] = $reply;

        return $this;
    }

    /**
     * Remove reply
     *
     * @param \WebsiteBundle\Entity\Reply $reply
     */
    public function removeReply(\WebsiteBundle\Entity\Reply $reply)
    {
        $this->reply->removeElement($reply);
    }

    /**
     * Get reply
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReply()
    {
        return $this->reply;
    }

    /**
     * Set nbReply
     *
     * @param integer $nbReply
     *
     * @return Topics
     */
    public function setNbReply($nbReply)
    {
        $this->nbReply = $nbReply;

        return $this;
    }

    /**
     * Get nbReply
     *
     * @return integer
     */
    public function getNbReply()
    {
        return $this->nbReply;
    }

    /**
     * Set retachedHeadTopic
     *
     * @param \WebsiteBundle\Entity\HeadTopic $retachedHeadTopic
     *
     * @return Topics
     */
    public function setRetachedHeadTopic(\WebsiteBundle\Entity\HeadTopic $retachedHeadTopic = null)
    {
        $this->retachedHeadTopic = $retachedHeadTopic;

        return $this;
    }

    /**
     * Get retachedHeadTopic
     *
     * @return \WebsiteBundle\Entity\HeadTopic
     */
    public function getRetachedHeadTopic()
    {
        return $this->retachedHeadTopic;
    }

    /**
     * Set headTopicLink
     *
     * @param \WebsiteBundle\Entity\HeadTopic $headTopicLink
     *
     * @return Topics
     */
    public function setHeadTopicLink(\WebsiteBundle\Entity\HeadTopic $headTopicLink = null)
    {
        $this->headTopicLink = $headTopicLink;

        return $this;
    }

    /**
     * Get headTopicLink
     *
     * @return \WebsiteBundle\Entity\HeadTopic
     */
    public function getHeadTopicLink()
    {
        return $this->headTopicLink;
    }

    /**
     * Set sujetUserLink
     *
     * @param \WebsiteBundle\Entity\User $sujetUserLink
     *
     * @return Topics
     */
    public function setSujetUserLink(\WebsiteBundle\Entity\User $sujetUserLink = null)
    {
        $this->sujetUserLink = $sujetUserLink;

        return $this;
    }

    /**
     * Get sujetUserLink
     *
     * @return \WebsiteBundle\Entity\User
     */
    public function getSujetUserLink()
    {
        return $this->sujetUserLink;
    }

    /**
     * Set state
     *
     * @param string $state
     *
     * @return Topics
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }
}
