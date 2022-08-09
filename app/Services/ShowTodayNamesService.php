<?php

namespace App\Services;

use App\Repositories\PeopleNameDaysRepository;

class ShowTodayNamesService
{
    private PeopleNameDaysRepository $peopleNameDaysRepository;

    public function __construct(PeopleNameDaysRepository $peopleNameDaysRepository)
    {
        $this->peopleNameDaysRepository = $peopleNameDaysRepository;
    }

    public function getTodayNames(): string {
        return $this->peopleNameDaysRepository->getNameDaysFull()[date('n')][date('j')];
    }
}