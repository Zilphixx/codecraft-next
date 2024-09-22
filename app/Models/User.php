<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_type'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
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

    //scope for getting all teacher
    public function scopeTeachers($query, $verified)
    {
        return $query->where('user_type', 'Teacher')
        ->whereHas('teacherDetail', function($query) use ($verified) {
            return $query->where('is_verified', $verified);
        });
    }

    //scope for getting all students
    public function scopeStudents($query)
    {
        return $query->where('user_type', 'Student');
    }


    /** Start of Relationships || Relation */
    public function studentDetail(): HasOne
    {
        return $this->hasOne(StudentDetail::class);
    }

    public function teacherDetail(): HasOne
    {
        return $this->hasOne(TeacherDetail::class);
    }
}
