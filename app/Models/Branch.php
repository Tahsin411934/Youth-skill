<?php

// app/Models/Branch.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Devfaysal\BangladeshGeocode\Models\Division;
use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Upazila;
class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'branch_name',
        'email',
        'address',
        'upazila_id',
        'district_id',
        'division_id',
        'phone',
        'login_username',
        'password_hash',
        'is_active'
    ];

    protected $hidden = [
        'password_hash'
    ];

    // public function setPasswordHashAttribute($value)
    // {
    //     $this->attributes['password_hash'] = Hash::make($value);
    // }

    public static function authenticate($username, $password)
    {
        $branch = self::where('login_username', $username)->first();
    
        if (!$branch || !$branch->is_active) {
            return null;
        }
    
        return $branch;
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }
    
    // Relationship with District
    public function district()
    {
        return $this->belongsTo(District::class);
    }
    
    // Relationship with Upazila
    public function upazila()
    {
        return $this->belongsTo(Upazila::class);
    }
}