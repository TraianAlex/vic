<?php

namespace App\Traits;

trait Cacheable
{
    public function getCacheKey()
    {
        // App\Link/1-13241234125
        return sprintf("%s/%s-%s", get_class($this), $this->id, $this->updated_at->timestamp);
    }
}
