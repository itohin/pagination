<?php

namespace App\Pagination;

use App\Pagination\Renderers\PlainRenderer;

class Results
{
    /**
     * @var array
     */
    protected $results;

    /**
     * @var Meta
     */
    protected $meta;

    /**
     * Results constructor.
     * @param $results
     * @param $meta
     */
    public function __construct(array $results, Meta $meta)
    {
        $this->results = $results;
        $this->meta = $meta;
    }

    /**
     * @return array
     */
    public function get()
    {
        return $this->results;
    }


    public function render(array $extra = [])
    {
        return (new PlainRenderer($this->meta))->render($extra);
    }
}