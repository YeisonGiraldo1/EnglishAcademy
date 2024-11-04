<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;

    // Table name
    protected $table = 'classes';

    // Mass assignable attributes
    protected $fillable = [
        'name', 
        'level', 
        'teacher_id', 
        'date', 
        'start_time', 
        'end_time', 
        'headquarters', 
        'classroom', 
        'status',
    ];

    /**
     * Get the teacher that owns the class.
     */
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    /**
     * Scope to get only active classes.
     */
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    /**
     * Scope to get only inactive classes.
     */
    public function scopeInactive($query)
    {
        return $query->where('status', false);
    }





    //"belongsToMany" indicates that one model belongs to many of another model.
    //For example, a class can belong to many users.
    public function students()
    {
        return $this->belongsToMany(User::class, 'class_user');
    }
}

