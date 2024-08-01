<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Services\EncryptionService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Crypt;
use Ramsey\Uuid\Uuid;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'id',
        'is_confirmed',
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

//    protected $casts = [
//        'email_verified_at' => 'datetime',
//        'password' => 'hashed',
//        'id' => 'string', // Ensure id is cast to string
//    ];

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
            'id' => 'string',
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

        // creation of contact
        static::created(function ($model) {
            Contact::create([
                'name' => $model->name,
                'email' => $model->email,
                'is_user' => $model->id,
            ]);
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
        if ($value === null) {
            return null;
        }
        return EncryptionService::decrypt($value);
    }


    //otp
    public function otp()
    {
        return $this->hasMany(OTPverifiction::class);
    }

    //contact logs
    public function contactLogs()
    {
        return $this->hasMany(ContactLog::class);
    }

    //contact
    public function contact()
    {
        return $this->hasOne(Contact::class , 'is_user'  , 'id');
    }
}
