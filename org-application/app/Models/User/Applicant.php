<?php

namespace App\Models\User;

use App\Models\Scopes\ApplicantScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    protected $table = "users";
    protected static function booted(): void
    {
        parent::booted();
        static::addGlobalScope(new ApplicantScope());
    }
}
