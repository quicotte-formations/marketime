<?php

namespace MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="MainBundle\Repository\UserRepository")
 */
class User
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
     * @ORM\Column(name="email", type="string", length=32, unique=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=32)
     */
    private $password;

    /**
     * @ORM\OneToMany(targetEntity="User", mappedBy="userEmitter")
     */
    private $messagesSent;
    
    /**
     * @ORM\OneToMany(targetEntity="Message", mappedBy="userReceiver")
     */
    private $messagesReceived;

    /**
     * ORM\OneToMany(targetEntity="Ad", mappedBy="ads")
     */
    private $ads;
    
    /**
     * ORM\OneToMany(targetEntity="Payment", mappedBy="userEmitter")
     */
    private $paymentsSent;
    
    /**
     * ORM\OneToMany(targetEntity="Payment", mappedBy="userReceiver")
     */
    private $paymentsReceived;
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->messagesSent = new \Doctrine\Common\Collections\ArrayCollection();
        $this->messagesReceived = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add messagesSent
     *
     * @param \MainBundle\Entity\User $messagesSent
     * @return User
     */
    public function addMessagesSent(\MainBundle\Entity\User $messagesSent)
    {
        $this->messagesSent[] = $messagesSent;

        return $this;
    }

    /**
     * Remove messagesSent
     *
     * @param \MainBundle\Entity\User $messagesSent
     */
    public function removeMessagesSent(\MainBundle\Entity\User $messagesSent)
    {
        $this->messagesSent->removeElement($messagesSent);
    }

    /**
     * Get messagesSent
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMessagesSent()
    {
        return $this->messagesSent;
    }

    /**
     * Add messagesReceived
     *
     * @param \MainBundle\Entity\Message $messagesReceived
     * @return User
     */
    public function addMessagesReceived(\MainBundle\Entity\Message $messagesReceived)
    {
        $this->messagesReceived[] = $messagesReceived;

        return $this;
    }

    /**
     * Remove messagesReceived
     *
     * @param \MainBundle\Entity\Message $messagesReceived
     */
    public function removeMessagesReceived(\MainBundle\Entity\Message $messagesReceived)
    {
        $this->messagesReceived->removeElement($messagesReceived);
    }

    /**
     * Get messagesReceived
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMessagesReceived()
    {
        return $this->messagesReceived;
    }
}
