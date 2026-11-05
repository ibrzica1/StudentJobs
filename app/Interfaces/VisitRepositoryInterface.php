<?php

namespace App\Interfaces;

interface VisitRepositoryInterface
{
    public function getThisMonthsVisits(): int;
    public function getTotalVisits(): int;
    public function store(string $date, int $count): void;
}