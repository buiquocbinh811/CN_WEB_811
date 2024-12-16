<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;

    // Định nghĩa các cột có thể điền (fillable)
    protected $fillable = ['computer_id', 'reported_by', 'reported_date', 'description', 'urgency', 'status'];

    // Định nghĩa mối quan hệ với Computer (issue thuộc về một máy tính)
    public function computer()
    {
        return $this->belongsTo(Computer::class);
    }
}
