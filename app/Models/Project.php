<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;

    /**
     * Mass assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'user_id',
        'notes',
    ];

    /**
     * project belongs to a user.
     *
     *  @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Returning path of a single project
     *
     * @return string
     */
    public function path()
    {
        return '/projects/' . $this->id;
    }

    /**
     * project can have many tasks
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    /**
     * Add a task to a project
     *
     * @var array $request
     *
     * @return Model
     */
    public function addTask(array $request)
    {
        return $this->tasks()->create($request);
    }
}
