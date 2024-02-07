<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OpenIDProviderProfile
 *
 * @package App\Models
 *
 * @property int $id
 * @property string $iss
 * @property string $aud
 * @property string $sub
 * @property string|null $vot
 * @property string|null $vtm
 * @property string|null $acr
 * @property string $nonce
 * @property string $jti
 * @property \Illuminate\Support\Carbon|null $auth_time
 * @property int $exp
 * @property int $iat
 * @property int $nbf
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 */
class OpenIDProviderProfile extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'iss',
        'aud',
        'sub',
        'vot',
        'vtm',
        'acr',
        'nonce',
        'jti',
        'auth_time',
        'exp',
        'iat',
        'nbf',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'auth_time' => 'datetime',
    ];
}
