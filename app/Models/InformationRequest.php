<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InformationRequest extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'subject',
        'message',
        'status',
        'admin_response',
        'response_file',
        'objection_reason',
        'objection_status',
        'objection_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getDeadlineAttribute()
    {
        return $this->created_at->addDays(10);
    }

    public function getRemainingDaysAttribute()
    {
        if ($this->status === 'Selesai' || $this->status === 'approved') {
            return null;
        }
        
        $diff = now()->diffInDays($this->deadline, false);
        return (int) $diff;
    }
}
