<?php

namespace Victoire\Bundle\TemplateBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\ExecutionContextInterface;
use Victoire\Bundle\CoreBundle\Entity\View;

/**
 * Template
 *
 * @ORM\Entity(repositoryClass="Victoire\Bundle\TemplateBundle\Repository\TemplateRepository")
 */
class Template extends View
{
    const TYPE = 'template';

    /**
     * @var string
     *
     * @ORM\OneToMany(targetEntity="\Victoire\Bundle\PageBundle\Entity\BasePage", mappedBy="template")
     */
    protected $pages;

    /**
     * @var string
     *
     * @ORM\Column(name="layout", type="string", length=255)
     */
    protected $layout;

    /**
     * @var string
     *
     */
    protected $template;

    /**
     * contruct
     **/
    public function __construct()
    {
        parent::__construct();
        $this->widgets = new ArrayCollection();
    }

    /**
     * to string
     *
     * @return string
     **/
    public function __toString()
    {
        return 'Modèle > '.$this->name;
    }

    /**
     * Set page
     * @param string $pages
     *
     * @return Template
     */
    public function setPages($pages)
    {
        $this->pages = $pages;

        return $this;
    }

    /**
     * Get pages (all Pages having this object as Template)
     *
     * @return string
     */
    public function getPages()
    {
        return $this->pages;
    }

    /**
     * Set layout
     * @param string $layout
     *
     * @return Template
     */
    public function setLayout($layout)
    {
        $this->layout = $layout;

        return $this;
    }

    /**
     * Get layout
     *
     * @return string
     */
    public function getLayout()
    {
        return $this->layout;
    }

    /**
     * @Assert\Callback(groups={"victoire"})
     */
    public function validate(ExecutionContextInterface $context)
    {
        $template = $this;
        $templateHasLayout = false;
        while ($template != null) {
            if ($template->getLayout() != null) {
                $templateHasLayout = true;
                break;
            }
            $template = $template->getTemplate();
        }
        if ($templateHasLayout === false
            && $this->getLayout() == null) {
            $context->addViolationAt(
                'layout',
                'data.template.templateform.view.type.template.layout.validator_message',
                array(),
                null
            );

        }
    }
}



