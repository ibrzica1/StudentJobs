<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'email',
        'password',
        'firstName',
        'lastName',
        'location_id',
        'telephone',
        'role',
        'profile_picture',
        'street',
        'house_number',
        'car_available',
        'truck_licence',
        'car_licence',
        'university',
        'certificates',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    const STUDENT = 'student';
    const EMPLOYER = 'employer';
    const ADMIN = 'admin';

    const ALLOWED_ROLES = [
        self::STUDENT, self::EMPLOYER, self::ADMIN
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function job(): HasMany
    {
        return $this->hasMany(Job::class,'employer_id','id');
    }

    public function company(): HasMany
    {
        return $this->hasMany(Company::class,'user_id','id');
    }
}
