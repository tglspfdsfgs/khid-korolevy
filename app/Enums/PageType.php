<?php

namespace App\Enums;

enum PageType: string
{
    case article = 'article';
    case tournament = 'tournament';
    case gallery = 'gallery';
    case education = 'education';
    case comp_dev = 'comp_dev';
}
