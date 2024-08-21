<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Group extends Model
{
    use HasFactory;

    public function user() {
        return $this->hasMany(User::class, 'user_id');
    }
    
    public function panelInterviews() {
        return $this->hasMany(PanelInterview::class, 'group_id');
    }
}
