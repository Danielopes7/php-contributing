<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;

    protected $fillable = [
        'url', 'repository_id', 'html_url', 'issue_id', 'number', 'title', 'user_login', 'user_avatar_url',
        'state', 'comments', 'created_at', 'updated_at', 'closed_at', 'body',
    ];

    protected $dates = [
        'created_at', 'updated_at', 'closed_at',
    ];

    /**
     * Get the repository that owns the issue.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function repository()
    {
        return $this->belongsTo(Repository::class);
    }

    /**
     * The labels that belong to the issue.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function labels()
    {
        return $this->belongsToMany(Label::class, 'issue_label');
    }
}
