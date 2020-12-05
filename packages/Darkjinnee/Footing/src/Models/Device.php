<?php

namespace Darkjinnee\Footing\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Laravel\Sanctum\PersonalAccessToken;
use Darkjinnee\Footing\Contracts\Device as DeviceContract;

/**
 * Class Device
 * @package Darkjinnee\Footing\Models
 */
class Device extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'token_id',
        'user_agent',
        'ip'
    ];
    /**
     * @var string
     */
    protected $table = 'devices';

    /**
     * @return BelongsTo
     */
    public function token()
    {
        return $this->belongsTo(PersonalAccessToken::class);
    }

    /**
     * @return MorphTo
     */
    public function user()
    {
        return $this->morphTo('model');
    }
}
