<?php

namespace RichanFongdasen\EloquentBlameableTest\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use RichanFongdasen\EloquentBlameable\BlameableTrait;

class Comment extends Model
{
    use BlameableTrait;
    use SoftDeletes;
    
    protected static $blameable = [
        'createdBy' => 'user_id',
        'updatedBy' => 'updater_id',
        'deletedBy' => 'eraser_id',
    ];

    protected $fillable = [
        'content'
    ];

    protected $touches = [
        'post'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
