<?php

namespace Labstag\Entity\Traits;

use Doctrine\Common\Collections\Collection;
use Labstag\Entity\Tags as TagsEntity;

trait Tags
{
    /**
     * @return Collection|TagsEntity[]
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    public function addTag(TagsEntity $tag): self
    {
        if (!$this->tags->contains($tag)) {
            $this->tags[] = $tag;
        }

        return $this;
    }

    public function removeTag(TagsEntity $tag): self
    {
        if ($this->tags->contains($tag)) {
            $this->tags->removeElement($tag);
        }

        return $this;
    }
}