<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpenidAdditionalEndUserClaim extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'openid_additional_end_user_claims';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'place_of_birth',
        'nationalities',
        'birth_family_name',
        'birth_given_name',
        'birth_middle_name',
        'salutation',
        'title',
        'msisdn',
        'also_known_as',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'place_of_birth' => 'json',
        'nationalities' => 'json',
    ];
}
