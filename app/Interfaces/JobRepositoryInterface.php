<?php

namespace App\Interfaces;

use App\Models\Job;

interface JobRepositoryInterface
{
    public function storeHelperJob(array $request): Job;
    public function storeJob(array $request): Job;
    public function update(int $jobId, array $request): void;
    public function updateStatus(int $jobId, string $status): void;
    public function getLatestJobs(): object;
    public function getLatestJobsByCategory(string $category): object;
    public function getLatestJobsByType(string $type): object;
    public function similarJobs(int $limit, string $category, int $id): object;
    public function getMyJobs(?string $status): object;
    public function getJob(int $id): Job;
    public function getThisMonthsJobCount(): int;
    public function getTodaysJobCount(): int;
    public function delete(Job $job): void;
}