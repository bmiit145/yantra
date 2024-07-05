<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Services\EncryptionService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Crypt;
use Ramsey\Uuid\Uuid;

class User extends Authenticatable
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
        'role'
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

//    protected static function boot()
//    {
//        parent::boot();
//
//        // Automatically generate UUID for primary key
//        static::creating(function ($model) {
//            if (empty($model->id)) {
//                $model->id = (string)Uuid::uuid4();
//            }
//        });
//    }

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->id = Uuid::uuid4()->toString();
        });
    }

    //give the

    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return 'id';
    }



    public function setEmailAttribute($value)
    {
//        $this->attributes['email'] = Crypt::encryptString($value);
        $this->attributes['email'] = EncryptionService::encrypt($value);
    }

    public function getEmailAttribute($value)
    {
//        return Crypt::decryptString($value);
        return EncryptionService::decrypt($value);
    }

}
