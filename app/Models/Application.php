<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;

class Application extends Model
{
    protected $table = 'applications';

    protected $fillable = [
        'text','user_id','job_id','accept_status','seen_status'
    ];

    const PENDING = "pending";
    const APPROVED = "approved";
    const REJECTED = "rejected";
    const SEEN = "seen";
    const UNSEEN = "unseen";

    const ALLOWED_ACCEPT_STATUSES = [
        self::PENDING, self::APPROVED, self::REJECTED
    ];

    const ALLOWED_SEEN_STATUSES = [
        self::SEEN, self::UNSEEN
    ];

    public static function getNumberOfUnseenApplications(Collection $collection): int
    {
        $number = 0;

        if($collection){
            $unseenAplications = $collection->filter(function($item) {
                return $item->seen_status === self::UNSEEN;
            });
            $number = $unseenAplications->count();
        }

        return $number;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class);
    }
}
