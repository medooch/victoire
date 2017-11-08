<?php

namespace Victoire\Bundle\SeoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Redirection.
 *
 * @ORM\Entity()
 * @ORM\Table("vic_redirection")
 */
class Redirection
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
     * @ORM\Column(name="input", type="string", nullable=false)
     */
    private $input;

//    /**
//     * @ORM\OneToOne(targetEntity="Victoire\Bundle\CoreBundle\Entity\Link")
//     * @ORM\JoinColumn(name="output", referencedColumnName="id", onDelete="CASCADE")
//     */

    /**
     * @var string
     *
     * @ORM\Column(name="output", type="string", nullable=true)
     */
    private $output;

    /**
     * @var int
     *
     * @ORM\Column(name="status_code", type="integer", nullable=false)
     */
    private $statusCode;

    /**
     * @var int
     *
     * @ORM\Column(name="count", type="integer", nullable=false)
     */
    private $count = 1;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getInput()
    {
        return $this->input;
    }

    /**
     * @param string $input
     *
     * @return Redirection
     */
    public function setInput($input)
    {
        $this->input = $input;

        return $this;
    }

    /**
     * @return string
     */
    public function getOutput()
    {
        return $this->output;
    }

    /**
     * @param string $output
     *
     * @return Redirection
     */
    public function setOutput($output)
    {
        $this->output = $output;

        return $this;
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param int $statusCode
     *
     * @return Redirection
     */
    public function setStatusCode(int $statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param int $count
     *
     * @return Redirection
     */
    public function setCount($count)
    {
        $this->count = $count;

        return $this;
    }

    /**
     * @return $this
     */
    public function increaseCount()
    {
        $this->count += 1;

        return $this;
    }
}