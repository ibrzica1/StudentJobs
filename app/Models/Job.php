<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Job extends Model
{
    protected $table = 'jobs';

    protected $fillable = [
        'title','employer_id','location_id','address','setting_type',
        'weekly_hours','employee_amount','wage','start_date','duration',
        'urgent','description','tasks','expectetion','offer'
    ];

    public function employer(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
