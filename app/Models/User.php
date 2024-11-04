<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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
        'role_id',
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




    //"belongsTo" indicates that a model belongs to another model.
    //For example, if each user belongs to a role, the User model has a Belongsto relationship with the role model.
    public function role() 
    {
        return $this->belongsTo(Role::class);
    }






    public function hasRole($roleName)
    {
        return $this->role()->where('name', $roleName)->exists();
    }

    
    //function for get name of especific role 
    public function getRoleName()
    {
        $role = Role::find($this->role_id);
        return $role ? $role->name : 'N/A';
    }







    //"belongsToMany" indicates that one model belongs to many of another model.
    //For example, a user can belong to many classes.
    public function classes()
    {
        return $this->belongsToMany(ClassModel::class, 'class_user');
    }
}

