<?php

namespace App\Models\contacts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function addresses()
    {
        return $this->hasMany(BusinessAddresses::class);
    }
}
