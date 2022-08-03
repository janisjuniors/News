<?php

namespace App\Controllers;

use App\View;

class ContactsController
{
    public function show(): View
    {
        return new View('contact-view.twig', []);
    }
}

