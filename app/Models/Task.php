<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'priority',
        'status',
        'due_date',
        'public_token',
        'token_expires_at',
    ];

    protected $casts = [
        'due_date' => 'date',
        'token_expires_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isTokenValid(): bool
    {
        // return $this->public_token && $this->token_expires_at && $this->token_expires_at->isFuture();
        return !empty($this->public_token);
    }
}
