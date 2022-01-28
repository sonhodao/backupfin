<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\TextLinkRepository;

class TextLinkService
{
    protected $textLinkRepository;

    public function __construct(TextLinkRepository $textLinkRepository)
    {
        $this->textLinkRepository = $textLinkRepository;
    }


    public function getTextLink()
    {
        return $this->textLinkRepository->getTextLink();
    }

}
