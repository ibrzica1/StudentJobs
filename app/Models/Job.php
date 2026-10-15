<?php

namespace App\Models;

use App\Enums\JobCategories;
use Error;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Job extends Model
{
    use HasFactory;
    
    protected $table = 'jobs';

    protected $fillable = [
        'status','type','category','title','employer_id','location_id','company_id','address','setting_type',
        'weekly_hours','employee_amount','wage','start_date','from','to','duration',
        'urgent','description','tasks','expectation','offer'
    ];

    protected function casts(): array
    {
        return [
            'category' => JobCategories::class,
        ];
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function employer(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }

    public function ratings(): HasMany
    {
        return $this->hasMany(Rating::class);
    }

    public function bills(): HasMany
    {
        return $this->hasMany(Bill::class);
    }

}
