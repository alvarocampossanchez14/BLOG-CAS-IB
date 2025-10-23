<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evidence extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_path',
        'file_name',
        'mime_type',
        'activity_id',
        'project_id',
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
