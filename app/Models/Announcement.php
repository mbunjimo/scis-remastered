<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Announcement extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = ['title', 'description', 'image', 'expiry_date', 'created_by', 'status', 'priority'];

    protected $casts = [
        'expiry_date' => 'date'
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
