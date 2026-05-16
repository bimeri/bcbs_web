<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

/**
 * User
 *
 * @mixin Builder
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'profile',
        'password',
        'contact',
        'user_name',
        'reason',
        'expires',
        'activation_code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public static function getLang(): void
    {
        $locale = session()->get('lang', 'en');
        config(['app.locale' => $locale]);
    }

    public static function homeP(){
        return Event::getAll();
    }

    public static function getDirectorDetail(): Director{
        return Director::getDirectorSpeach();
    }

    public final function userinfo(): HasOne {
        return $this->hasOne(Userinfo::class);
    }

    public final function payments() : HasMany{
        return $this->hasMany(Payment::class);
    }

    public final function application(): HasOne{
        return $this->hasOne(Application::class);
    }
}
