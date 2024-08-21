<?php

namespace App\Models\User;

use App\Models\Scopes\DeveloperScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    use HasFactory;

    protected $table = "users";
    protected static function booted(): void
    {
        parent::booted();
        static::addGlobalScope(new DeveloperScope());
    }
}
