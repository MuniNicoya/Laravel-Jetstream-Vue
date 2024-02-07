<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OpenIDAuthorizationRequest
 *
 * @package App\Models
 *
 * @property int $id
 * @property string $client_id
 * @property string $response_type
 * @property string $scope
 * @property string $redirect_uri
 * @property string $state
 * @property string $nonce
 * @property string|null $vtr
 * @property string|null $acr_values
 * @property string|null $code_challenge
 * @property string|null $code_challenge_method
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 */
class OpenIDAuthorizationRequest extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_id',
        'response_type',
        'scope',
        'redirect_uri',
        'state',
        'nonce',
        'vtr',
        'acr_values',
        'code_challenge',
        'code_challenge_method',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'openid_authorization_requests';
}
