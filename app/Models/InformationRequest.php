<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InformationRequest extends Model
{
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'status',
    ];

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
