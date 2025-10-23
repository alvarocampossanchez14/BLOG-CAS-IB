<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Evidence; 

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'start_date',
        'end_date',
        'status',
        'location',
        'supervisor_name',
        'supervisor_contact',
        'creativity',
        'activity',
        'service',
        'evaluation_and_objectives',
        'reflection',
        'lo_1',
        'lo_2',
        'lo_3',
        'lo_4',
        'lo_5',
        'lo_6',
        'lo_7',
        'image',
        'is_published',
    ];  

    public function evidences()
    {
        return $this->hasMany(Evidence::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
