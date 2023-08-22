<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Traits\HasUid;
use App\Traits\HasAddresses;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, HasAddresses, HasUid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'contact_no',
        'role_id',
        'status',
        'password',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    protected $appends = ['name', 'type'];

    public function rules() {
        
        $rules = [
            'email' => 'required|email|unique:users,email,'.$this->id,
            'first_name' => 'required',
            'last_name' => 'required',
        ];

        if (!$this->id) {
            $rules['password'] = 'confirmed';
        }

        return $rules;
    }

    /**
     * Relationships
    */
    public function subscriptions() {
        return $this->hasMany(\App\Models\Subscription::class);
    }

    public function tickets() {
        return $this->hasMany(\App\Models\Ticket::class);
    }

    public function profile() {
        return $this->hasOne(\App\Models\AdvanceProfile::class);
    }
    
    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * Mutators
    */
    public function getTypeAttribute() {
        if(!$this->id) {
            return 'Subscriber';
        } else {
            return $this->roles()->pluck('name')->implode(', ');
        }
    }

    public static function getSubscribersSelectOptions() {
        $options = [];

        $subscribers = self::whereHas('roles', function($query) {
                $query->where('name', 'Customer');
            })->get();

        foreach($subscribers as $subscriber) {
            $options[] = ['label' => $subscriber->name, 'value' => $subscriber->id];
        }

        return $options;
    }
}
