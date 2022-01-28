<?php

namespace App\Repositories;

use App\Models\TextLink;


class TextLinkRepository
{
    protected $textLink;
    public function __construct(TextLink $textLink)
    {
        $this->textLink = $textLink;
    }

    public function getTextLink()
    {
        return $this->textLink->where('is_home', 1)->byModel('Home')->get();
    }

}
