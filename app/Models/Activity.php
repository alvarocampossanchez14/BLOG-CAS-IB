<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Evidence;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'title',
        'description',
        'date',
        'location',
        'supervisor_name',
        'supervisor_contact',
        'creativity',
        'activity',
        'service',
        'evaluation',
        'reflection',
        'lo_1',
        'lo_2',
        'lo_3',
        'lo_4',
        'lo_5',
        'lo_6',
        'lo_7',
        'image',
        'evidence'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function evidences()
    {
        return $this->hasMany(Evidence::class);
    }
}
