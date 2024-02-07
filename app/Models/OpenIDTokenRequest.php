<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OpenIDTokenRequest
 *
 * @package App\Models
 *
 * @property int $id
 * @property string $grant_type
 * @property string $code
 * @property string $client_assertion_type
 * @property string $client_assertion
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 */
class OpenIDTokenRequest extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'grant_type',
        'code',
        'client_assertion_type',
        'client_assertion',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'openid_token_requests';
}
