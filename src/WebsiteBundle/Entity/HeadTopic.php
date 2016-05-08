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
}

