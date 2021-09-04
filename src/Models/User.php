<?php

namespace IsaEken\Hes\Models;

use Illuminate\Support\Carbon;
use IsaEken\Hes\Traits\HasPhone;
use IsaEken\Hes\Traits\HasToken;
use IsaEken\Thinks\Model;

/**
 * @property mixed  $lastQATime
 * @property mixed  $mutantText
 *
 * @property Carbon $dob
 * @property Carbon $isolationBeingDate
 * @property Carbon $isolationEndDate
 * @property Carbon $isolationBeginTime
 * @property Carbon $isolationEndTime
 *
 * @property float  $remainingQATime
 * @property float  $numberOfDaysInIsolation
 * @property float  $numberOfMinutesInIsolation
 * @property float  $clarificationTextVersion
 *
 * @property bool   $mernisChecked
 * @property bool   $riskInfoSubmitted
 * @property bool   $homeInfoSubmitted
 * @property bool   $isolationStatus
 * @property bool   $mutant
 * @property bool   $speechValidationActive
 * @property bool   $faceValidationActive
 * @property bool   $inTemporaryIsolation
 * @property bool   $homeIsolated
 * @property bool   $wristbandActive
 *
 * @property string id_token
 * @property string user_id
 * @property string phone
 * @property string refresh_token
 * @property string firstname
 * @property string lastname
 * @property string gender
 * @property string healthStatus
 * @property string identityNumberHash
 *
 * @method  mixed  getLastQATime()
 * @method  mixed  getLutantText()
 * @method  Carbon getDob()
 * @method  Carbon getIsolationBeingDate()
 * @method  Carbon getIsolationEndDate()
 * @method  Carbon getIsolationBeginTime()
 * @method  Carbon getIsolationEndTime()
 * @method  float  getRemainingQATime()
 * @method  float  getNumberOfDaysInIsolation()
 * @method  float  getNumberOfMinutesInIsolation()
 * @method  float  getClarificationTextVersion()
 * @method  bool   getMernisChecked()
 * @method  bool   getRiskInfoSubmitted()
 * @method  bool   getHomeInfoSubmitted()
 * @method  bool   getIsolationStatus()
 * @method  bool   getMutant()
 * @method  bool   getSpeechValidationActive()
 * @method  bool   getFaceValidationActive()
 * @method  bool   getInTemporaryIsolation()
 * @method  bool   getHomeIsolated()
 * @method  bool   getWristbandActive()
 * @method  string getIdToken()
 * @method  string getUserId()
 * @method  string getPhone()
 * @method  string getRefreshToken()
 * @method  string getFirstname()
 * @method  string getLastname()
 * @method  string getGender()
 * @method  string getHealthStatus()
 * @method  string getIdentityNumberHash()
 *
 * @method  static setLastQATime(mixed $value)
 * @method  static setLutantText(mixed $value)
 * @method  static setDob(Carbon $value)
 * @method  static setIsolationBeingDate(Carbon $value)
 * @method  static setIsolationEndDate(Carbon $value)
 * @method  static setIsolationBeginTime(Carbon $value)
 * @method  static setIsolationEndTime(Carbon $value)
 * @method  static setRemainingQATime(float $value)
 * @method  static setNumberOfDaysInIsolation(float $value)
 * @method  static setNumberOfMinutesInIsolation(float $value)
 * @method  static setClarificationTextVersion(float $value)
 * @method  static setMernisChecked(bool $value)
 * @method  static setRiskInfoSubmitted(bool $value)
 * @method  static setHomeInfoSubmitted(bool $value)
 * @method  static setIsolationStatus(bool $value)
 * @method  static setMutant(bool $value)
 * @method  static setSpeechValidationActive(bool $value)
 * @method  static setFaceValidationActive(bool $value)
 * @method  static setInTemporaryIsolation(bool $value)
 * @method  static setHomeIsolated(bool $value)
 * @method  static setWristbandActive(bool $value)
 * @method  static setIdToken(string $value)
 * @method  static setUserId(string $value)
 * @method  static setPhone(string $value)
 * @method  static setRefreshToken(string $value)
 * @method  static setFirstname(string $value)
 * @method  static setLastname(string $value)
 * @method  static setGender(string $value)
 * @method  static setHealthStatus(string $value)
 * @method  static setIdentityNumberHash(string $value)
 *
 * @method  mixed  getLastQATimeAttribute()
 * @method  mixed  getLutantTextAttribute()
 * @method  Carbon getDobAttribute()
 * @method  Carbon getIsolationBeingDateAttribute()
 * @method  Carbon getIsolationEndDateAttribute()
 * @method  Carbon getIsolationBeginTimeAttribute()
 * @method  Carbon getIsolationEndTimeAttribute()
 * @method  float  getRemainingQATimeAttribute()
 * @method  float  getNumberOfDaysInIsolationAttribute()
 * @method  float  getNumberOfMinutesInIsolationAttribute()
 * @method  float  getClarificationTextVersionAttribute()
 * @method  bool   getMernisCheckedAttribute()
 * @method  bool   getRiskInfoSubmittedAttribute()
 * @method  bool   getHomeInfoSubmittedAttribute()
 * @method  bool   getIsolationStatusAttribute()
 * @method  bool   getMutantAttribute()
 * @method  bool   getSpeechValidationActiveAttribute()
 * @method  bool   getFaceValidationActiveAttribute()
 * @method  bool   getInTemporaryIsolationAttribute()
 * @method  bool   getHomeIsolatedAttribute()
 * @method  bool   getWristbandActiveAttribute()
 * @method  string getIdTokenAttribute()
 * @method  string getUserIdAttribute()
 * @method  string getPhoneAttribute()
 * @method  string getRefreshTokenAttribute()
 * @method  string getFirstnameAttribute()
 * @method  string getLastnameAttribute()
 * @method  string getGenderAttribute()
 * @method  string getHealthStatusAttribute()
 * @method  string getIdentityNumberHashAttribute()
 *
 * @method  static setLastQATimeAttribute(mixed $value)
 * @method  static setLutantTextAttribute(mixed $value)
 * @method  static setDobAttribute(Carbon $value)
 * @method  static setIsolationBeingDateAttribute(Carbon $value)
 * @method  static setIsolationEndDateAttribute(Carbon $value)
 * @method  static setIsolationBeginTimeAttribute(Carbon $value)
 * @method  static setIsolationEndTimeAttribute(Carbon $value)
 * @method  static setRemainingQATimeAttribute(float $value)
 * @method  static setNumberOfDaysInIsolationAttribute(float $value)
 * @method  static setNumberOfMinutesInIsolationAttribute(float $value)
 * @method  static setClarificationTextVersionAttribute(float $value)
 * @method  static setMernisCheckedAttribute(bool $value)
 * @method  static setRiskInfoSubmittedAttribute(bool $value)
 * @method  static setHomeInfoSubmittedAttribute(bool $value)
 * @method  static setIsolationStatusAttribute(bool $value)
 * @method  static setMutantAttribute(bool $value)
 * @method  static setSpeechValidationActiveAttribute(bool $value)
 * @method  static setFaceValidationActiveAttribute(bool $value)
 * @method  static setInTemporaryIsolationAttribute(bool $value)
 * @method  static setHomeIsolatedAttribute(bool $value)
 * @method  static setWristbandActiveAttribute(bool $value)
 * @method  static setIdTokenAttribute(string $value)
 * @method  static setUserIdAttribute(string $value)
 * @method  static setPhoneAttribute(string $value)
 * @method  static setRefreshTokenAttribute(string $value)
 * @method  static setFirstnameAttribute(string $value)
 * @method  static setLastnameAttribute(string $value)
 * @method  static setGenderAttribute(string $value)
 * @method  static setHealthStatusAttribute(string $value)
 * @method  static setIdentityNumberHashAttribute(string $value)
 */
class User extends Model
{
    use HasPhone;
    use HasToken;

    public array $casts = [
        'lastQATime' => 'mixed',
        'mutantText' => 'mixed',

        'dob' => 'carbon',
        'isolationBeingDate' => 'carbon',
        'isolationEndDate' => 'carbon',
        'isolationBeginTime' => 'carbon',
        'isolationEndTime' => 'carbon',

        'remainingQATime' => 'float',
        'numberOfDaysInIsolation' => 'float',
        'numberOfMinutesInIsolation' => 'float',
        'clarificationTextVersion' => 'float',

        'mernisChecked' => 'bool',
        'riskInfoSubmitted' => 'bool',
        'homeInfoSubmitted' => 'bool',
        'isolationStatus' => 'bool',
        'mutant' => 'bool',
        'speechValidationActive' => 'bool',
        'faceValidationActive' => 'bool',
        'inTemporaryIsolation' => 'bool',
        'homeIsolated' => 'bool',
        'wristbandActive' => 'bool',
    ];

    public array $attributes = [
        'lastQATime' => null,
        'mutantText' => null,

        'dob' => 'carbon',
        'isolationBeingDate' => null,
        'isolationEndDate' => null,
        'isolationBeginTime' => null,
        'isolationEndTime' => null,

        'remainingQATime' => null,
        'numberOfDaysInIsolation' => null,
        'numberOfMinutesInIsolation' => null,
        'clarificationTextVersion' => null,

        'mernisChecked' => null,
        'riskInfoSubmitted' => null,
        'homeInfoSubmitted' => null,
        'isolationStatus' => null,
        'mutant' => null,
        'speechValidationActive' => null,
        'faceValidationActive' => null,
        'inTemporaryIsolation' => null,
        'homeIsolated' => null,
        'wristbandActive' => null,

        'id_token' => null,
        'user_id' => null,
        'phone' => null,
        'refresh_token' => null,
        'firstname' => null,
        'lastname' => null,
        'gender' => null,
        'healthStatus' => null,
        'identityNumberHash' => null,
    ];
}
