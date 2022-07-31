<?php

namespace App\Entity;

use App\Repository\MenuItemRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass=MenuItemRepository::class)
 */
class MenuItem
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $label;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=Route::class, inversedBy="menuItems")
     */
    private $route;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created;

    /**
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updated;

    /**
     * @Gedmo\Slug(fields={"label"})
     * @ORM\Column(length=128, unique=true)
     */
    private $slug;

    /**
     * @ORM\ManyToOne(targetEntity=MenuType::class, inversedBy="menuItems")
     */
    private $menuType;

    /**
     * @ORM\ManyToOne(targetEntity=MenuItem::class, inversedBy="menuItems")
     */
    private $parent;

    /**
     * @ORM\OneToMany(targetEntity=MenuItem::class, mappedBy="parent")
     */
    private $menuItems;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $priority;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $hasPage;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $hasArticle;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $hasLink;

    /**
     * @ORM\ManyToOne(targetEntity=Page::class, inversedBy="menuItems")
     */
    private $pageSlug;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $link;

    public function __construct()
    {
        $this->menuItems = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->label;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(?string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getRoute(): ?Route
    {
        return $this->route;
    }

    public function setRoute(?Route $route): self
    {
        $this->route = $route;

        return $this;
    }


    public function getCreated()
    {
        return $this->created;
    }

    public function getUpdated()
    {
        return $this->updated;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function getMenuType(): ?MenuType
    {
        return $this->menuType;
    }

    public function setMenuType(?MenuType $menuType): self
    {
        $this->menuType = $menuType;

        return $this;
    }

    public function getParent(): ?self
    {
        return $this->parent;
    }

    public function setParent(?self $parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getMenuItems(): Collection
    {
        return $this->menuItems;
    }

    public function addMenuItem(self $menuItem): self
    {
        if (!$this->menuItems->contains($menuItem)) {
            $this->menuItems[] = $menuItem;
            $menuItem->setParent($this);
        }

        return $this;
    }

    public function removeMenuItem(self $menuItem): self
    {
        if ($this->menuItems->removeElement($menuItem)) {
            // set the owning side to null (unless already changed)
            if ($menuItem->getParent() === $this) {
                $menuItem->setParent(null);
            }
        }

        return $this;
    }

    public function getPriority(): ?int
    {
        return $this->priority;
    }

    public function setPriority(?int $priority): self
    {
        $this->priority = $priority;

        return $this;
    }

    public function hasPage(): ?bool
    {
        return $this->hasPage;
    }

    public function setHasPage(?bool $hasPage): self
    {
        $this->hasPage = $hasPage;

        return $this;
    }

    public function isHasArticle(): ?bool
    {
        return $this->hasArticle;
    }

    public function setHasArticle(?bool $hasArticle): self
    {
        $this->hasArticle = $hasArticle;

        return $this;
    }

    public function isHasLink(): ?bool
    {
        return $this->hasLink;
    }

    public function setHasLink(?bool $hasLink): self
    {
        $this->hasLink = $hasLink;

        return $this;
    }

    public function getPageSlug(): ?Page
    {
        return $this->pageSlug;
    }

    public function setPageSlug(?Page $pageSlug): self
    {
        $this->pageSlug = $pageSlug;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): self
    {
        $this->link = $link;

        return $this;
    }
}
