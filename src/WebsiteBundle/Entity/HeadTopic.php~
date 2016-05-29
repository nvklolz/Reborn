<?php

namespace WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HeadTopic
 *
 * @ORM\Table(name="head_topic")
 * @ORM\Entity(repositoryClass="WebsiteBundle\Repository\HeadTopicRepository")
 */
class HeadTopic
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
     *
     * @ORM\OneToMany(targetEntity="WebsiteBundle\Entity\Topics", mappedBy="headTopicLink")
     */
    private $topicsLink;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=100)
     */
    private $state = 'public';

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
     * @return HeadTopic
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
     * @return HeadTopic
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
     * Constructor
     */
    public function __construct()
    {
        $this->ratachedTopics = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add ratachedTopic
     *
     * @param \WebsiteBundle\Entity\Topics $ratachedTopic
     *
     * @return HeadTopic
     */
    public function addRatachedTopic(\WebsiteBundle\Entity\Topics $ratachedTopic)
    {
        $this->ratachedTopics[] = $ratachedTopic;

        return $this;
    }

    /**
     * Remove ratachedTopic
     *
     * @param \WebsiteBundle\Entity\Topics $ratachedTopic
     */
    public function removeRatachedTopic(\WebsiteBundle\Entity\Topics $ratachedTopic)
    {
        $this->ratachedTopics->removeElement($ratachedTopic);
    }

    /**
     * Get ratachedTopics
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRatachedTopics()
    {
        return $this->ratachedTopics;
    }

    /**
     * Add topicsLink
     *
     * @param \WebsiteBundle\Entity\Topics $topicsLink
     *
     * @return HeadTopic
     */
    public function addTopicsLink(\WebsiteBundle\Entity\Topics $topicsLink)
    {
        $this->topicsLink[] = $topicsLink;

        return $this;
    }

    /**
     * Remove topicsLink
     *
     * @param \WebsiteBundle\Entity\Topics $topicsLink
     */
    public function removeTopicsLink(\WebsiteBundle\Entity\Topics $topicsLink)
    {
        $this->topicsLink->removeElement($topicsLink);
    }

    /**
     * Get topicsLink
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTopicsLink()
    {
        return $this->topicsLink;
    }

    /**
     * Set state
     *
     * @param string $state
     *
     * @return HeadTopic
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
