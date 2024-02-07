<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OpenIDDiscoveryEndpoint
 *
 * @package App\Models
 *
 * @property int $id
 * @property string $issuer
 * @property string $authorization_endpoint
 * @property string $token_endpoint
 * @property string|null $introspection_endpoint
 * @property string|null $revocation_endpoint
 * @property string $jwks_uri
 * @property array $scopes_supported
 * @property array $claims_supported
 * @property array|null $vot
 * @property array|null $acr_values_supported
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 */
class OpenIDDiscoveryEndpoint extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'issuer',
        'authorization_endpoint',
        'token_endpoint',
        'introspection_endpoint',
        'revocation_endpoint',
        'jwks_uri',
        'scopes_supported',
        'claims_supported',
        'vot',
        'acr_values_supported',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'scopes_supported' => 'array',
        'claims_supported' => 'array',
        'vot' => 'array',
        'acr_values_supported' => 'array',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'openid_discovery_endpoints';
}
