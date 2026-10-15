<?php

namespace App\Models;

use App\Enums\ApplicationSeenStatusesEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;

class Application extends Model
{
    use HasFactory;
    
    protected $table = 'applications';

    protected $fillable = [
        'text','user_id','job_id','accept_status','seen_status'
    ];

    public static function getNumberOfUnseenApplications(Collection $collection): int
    {
        $number = 0;

        if($collection){
            $unseenAplications = $collection->filter(function($item) {
                return $item->seen_status === ApplicationSeenStatusesEnum::UNSEEN->value;
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
