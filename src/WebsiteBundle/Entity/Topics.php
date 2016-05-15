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
     * @var string
     *
     * @ORM\Column(name="alt_titre", type="string", length=255)
     */
    private $altTitre;

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
     * @ORM\Column(name="nbreply", type="integer")
     */
    private $nbReply;

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
}
