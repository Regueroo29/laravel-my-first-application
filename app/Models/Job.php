<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    // Tell Laravel to use the 'job_listings' table instead of the default 'jobs'
    protected $table = 'job_listings';

    // Define the relationship to Employer
    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
}
