<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Label extends Model
{
    use HasFactory;

    protected $fillable = [
        'issue_id', 'name', 'color'
    ];

    /**
     * Get the issue that owns the label.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Issue(): BelongsTo
    {
        return $this->belongsTo(Issue::class);
    }

    /**
     * The issues that belong to the label.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Issues()
    {
        return $this->belongsToMany(Issue::class, 'issue_label');
    }
}
