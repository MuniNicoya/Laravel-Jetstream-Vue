<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OpenIDToken
 *
 * @package App\Models
 *
 * @property int $id
 * @property string $iss
 * @property string $aud
 * @property int $exp
 * @property int $iat
 * @property int $nbf
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 */
class OpenIDToken extends Model
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
        'exp',
        'iat',
        'nbf',
    ];
}
