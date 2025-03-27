<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Repository extends Model
{
    use HasFactory;

    protected $fillable = [
        'language', 'repository_git_id', 'full_name', 'description', 'stargazers_count', 'forks', 'open_issues', 'watchers',
    ];

    /**
     * Get the issues for the repository.
     */
    public function Issues(): hasMany
    {
        return $this->hasMany(Issue::class);
    }
}
