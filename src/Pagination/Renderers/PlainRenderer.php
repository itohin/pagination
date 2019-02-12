<?php

namespace App\Pagination\Renderers;


class PlainRenderer extends RendererAbstract
{
    public function render()
    {
        return $this->pages();
    }
}