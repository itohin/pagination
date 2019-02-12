<?php

namespace App\Pagination\Renderers;


class PlainRenderer extends RendererAbstract
{
    public function render()
    {
        $iterator = $this->pages();

        $html = '<ul>';

        foreach ($iterator as $page) {
            if ($iterator->isCurrentPage()) {
                $html .= '<li>
                    <strong><a href="">' . $page . '</a></strong>
                </li>';
            } else {
                $html .= '<li>
                    <a href="">' . $page . '</a>
                </li>';
            }
        }

        $html .= '</ul>';

        return $html;
    }

    
}