<?php

namespace IsaEken\Hes\Models;

use Illuminate\Support\Carbon;
use IsaEken\Thinks\Model;

/**
 * @property bool   $is_blocked
 * @property Carbon $created_date
 * @property Carbon $expiration_date
 * @property array  $block_info
 * @property string $hes_code
 * @property string $created_by
 * @property string $hes_code_barcode
 * @property string $current_health_status
 * @property string $masked_identity_number
 * @property string $masked_firstname
 * @property string $masked_lastname
 *
 * @method self setIsBlockedAttribute(bool $value)
 * @method self setCreatedDateAttribute(Carbon $value)
 * @method self setBlockInfoAttribute(array $value)
 * @method self setExpirationDateAttribute(Carbon $value)
 * @method self setHesCodeAttribute(string $value)
 * @method self setCreatedByAttribute(string $value)
 * @method self setHesCodeBarcodeAttribute(string $value)
 * @method self setCurrentHealthStatusAttribute(string $value)
 * @method self setMaskedIdentityNumberAttribute(string $value)
 * @method self setMaskedFirstnameAttribute(string $value)
 * @method self setMaskedLastnameAttribute(string $value)
 *
 * @method bool getIsBlockedAttribute()
 * @method Carbon getCreatedDateAttribute()
 * @method array getBlockInfoAttribute()
 * @method Carbon getExpirationDateAttribute()
 * @method string getHesCodeAttribute()
 * @method string getCreatedByAttribute()
 * @method string getHesCodeBarcodeAttribute()
 * @method string getCurrentHealthStatusAttribute()
 * @method string getMaskedIdentityNumberAttribute()
 * @method string getMaskedFirstnameAttribute()
 * @method string getMaskedLastnameAttribute()
 *
 * @method self setIsBlocked(bool $value)
 * @method self setCreatedDate(Carbon $value)
 * @method self setBlockInfo(array $value)
 * @method self setExpirationDate(Carbon $value)
 * @method self setHesCode(string $value)
 * @method self setCreatedBy(string $value)
 * @method self setHesCodeBarcode(string $value)
 * @method self setCurrentHealthStatus(string $value)
 * @method self setMaskedIdentityNumber(string $value)
 * @method self setMaskedFirstname(string $value)
 * @method self setMaskedLastname(string $value)
 *
 * @method bool getIsBlocked()
 * @method Carbon getCreatedDate()
 * @method array getBlockInfo()
 * @method Carbon getExpirationDate()
 * @method string getHesCode()
 * @method string getCreatedBy()
 * @method string getHesCodeBarcode()
 * @method string getCurrentHealthStatus()
 * @method string getMaskedIdentityNumber()
 * @method string getMaskedFirstname()
 * @method string getMaskedLastname()
 */
class HesCode extends Model
{
    public array $casts = [
        'is_blocked' => 'bool',
        'created_date' => 'carbon',
        'block_info' => 'array',
        'expiration_date' => 'carbon',
    ];

    public array $attributes = [
        'is_blocked' => null,
        'created_date' => null,
        'block_info' => null,
        'expiration_date' => null,
        'hes_code' => null,
        'created_by' => null,
        'hes_code_barcode' => null,
        'current_health_status' => null,
        'masked_identity_number' => null,
        'masked_firstname' => null,
        'masked_lastname' => null,
    ];
}
