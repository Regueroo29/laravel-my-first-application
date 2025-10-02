<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    // Specify the correct table name for jobs
    protected $table = 'job_listings';

    protected $fillable = [
        'title',
        'salary',
        'employer_id',
    ];

    // Relationship to Employer
    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    // Relationship to Tags (with explicit pivot table and keys)
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'job_listing_tag', 'job_listing_id', 'tag_id');
    }
}
