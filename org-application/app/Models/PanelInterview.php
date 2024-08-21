<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PanelInterview extends Model
{
    use HasFactory;

    public function group() {
        return $this->belongsTo(Group::class, 'group_id');
    }
}
