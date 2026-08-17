<?php

namespace App\Services;

use DateTime;

class TimeService
{
    public function durationHours($from,$to): int
    {
        $time1 = new DateTime($from);
        $time2 = new DateTime($to);
        return $time1->diff($time2)->h + 1;
    }

    public function calculateTime(string $timeStamp): string
    {
        $diff = time() - strtotime($timeStamp);

        $minutes = floor($diff / 60);
        $hours   = floor($diff / 3600);
        $days    = floor($diff / 86400);
        $months  = floor($diff / 2592000);  
        $years   = floor($diff / 31536000); 

        if ($minutes < 1) {
            return __('time.Less than 1 min ago');
        } elseif ($minutes < 60) {
            return "$minutes ". __('time.min ago');
        } elseif ($hours < 24) {
            return "$hours ". __('time.hours ago');
        } elseif ($days < 30) {
            return "$days ". __('time.days ago');
        } elseif ($months < 12) {
            return "$months ". __('time.months ago');
        } else {
            return "$years ". __('time.years ago');
        }
    }
}