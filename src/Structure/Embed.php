<?php
declare(strict_types=1);

namespace DiscordHooks\Structure;

class Embed
{
    /**
     * @var int | null
     */
    private $color;

    /**
     * @var Author | null
     */
    private $author;

    /**
     * @var string | null
     */
    private $title;

    /**
     * @var string | null
     */
    private $url;

    /**
     * @var string | null
     */
    private $description;

    /**
     * @var FieldCollection | null
     */
    private $fields;

    /**
     * @var Thumbnail | null
     */
    private $thumbnail;

    /**
     * @var Image | null
     */
    private $image;
    /**
     * @var Footer | null
     */
    private $footer;

    /**
     * @var \DateTimeInterface | null
     */
    private $timestamp;

    public function __construct(bool $withTimestamp = false)
    {
        if ($withTimestamp) {
            $this->timestamp = new \DateTime();
        }
    }

    public function setColor(int $color): self
    {
        $this->color = $color;
        return $this;
    }

    public function getColor(): ?int
    {
        return $this->color;
    }

    public function setAuthor(Author $author): self
    {
        $this->author = $author;
        return $this;
    }

    public function getAuthor(): ?Author
    {
        return $this->author;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;
        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function addField(Field $field): self
    {
        if (!$this->fields instanceof FieldCollection) {
            $this->fields = new FieldCollection();
        }
        $this->fields->append($field);
        return $this;
    }

    public function getFields(): ?FieldCollection
    {
        return $this->fields;
    }

    public function setThumbnail(Thumbnail $thumbnail): self
    {
        $this->thumbnail = $thumbnail;
        return $this;
    }

    public function getThumbnail(): ?Thumbnail
    {
        return $this->thumbnail;
    }

    public function setImage(Image $image): self
    {
        $this->image = $image;
        return $this;
    }

    public function getImage(): ?Image
    {
        return $this->image;
    }

    public function getTimestamp(): ?\DateTimeInterface
    {
        return $this->timestamp;
    }

    public function setFields(FieldCollection $fields): self
    {
        $this->fields = $fields;
        return $this;
    }

    public function getFooter(): ?Footer
    {
        return $this->footer;
    }

    public function serialize(): array
    {
        $array = [];
        $rc = new \ReflectionClass(__CLASS__);
        $properties = $rc->getProperties();
        foreach ($properties as $property) {
            if ($this->{$property->getName()} instanceof \ArrayObject) {
                if (count($this->{$property->getName()}) === 0) {
                    continue;
                }
            }
            if ($this->{$property->getName()} instanceof \DateTimeInterface) {
                $array[$property->getName()] = $this->{$property->getName()}->format(DATE_RFC3339);
                continue;
            }
            if (is_object($this->{$property->getName()})) {
                $array[$property->getName()] = $this->{$property->getName()}->serialize();
            }
            if (!empty($this->{$property->getName()})) {
                $array[$property->getName()] = $this->{$property->getName()};
            }
        }
        return $array;
    }
}
