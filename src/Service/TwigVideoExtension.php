<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class TwigVideoExtension extends AbstractExtension
{
    
    
    public function __construct(array $embedUrlTemplates)
    {
        $this->embedUrlTemplates = $embedUrlTemplates;
    }
    public function getFilters()
    {
        return [new TwigFilter('formatVideo', [$this, 'formatVideo'])];
    }

    public function formatVideo($url)
    {
        if (preg_match('#youtube\.com#', $url)) {

            $url = preg_replace('#/watch\?v=#', '/embed/', $url);
        }

        if (preg_match('#youtu\.be#', $url)) {

            $url = preg_replace('#youtu\.be#', 'youtube.com/embed', $url);
        }
        
        if (preg_match('#dailymotion#', $url)) {
            $url = preg_replace('#video/#', 'embed/video/', $url);
        }

        return $url;
    }
}
