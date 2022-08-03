<?php

namespace App\Controllers;

use App\View;

class AboutUsController
{
    public function show(): View
    {
        return new View('about-us-view.twig', []);
    }
}

