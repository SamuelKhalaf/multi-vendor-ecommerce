<?php

namespace App\Http\Services;

use App\Models\User;
use App\Models\UserVerificationCode;
use Illuminate\Support\Facades\Auth;

class VerificationService
{
    /** set OTP code for mobile
     * @param $data
     *
     * @return UserVerificationCode
     */
    public function setVerificationCode($data): UserVerificationCode
    {
        $code = mt_rand(100000, 999999);
        $data['verification_code'] = $code;
        UserVerificationCode::whereNotNull('user_id')->where(['user_id' => $data['user_id']])->delete();
        return UserVerificationCode::create($data);
    }

    public function getSMSVerifyMessageByAppName( $code): string
    {
        $message = " is your verification code for your account";
        return $code.$message;
    }


    public function checkOTPCode ($code): bool
    {
        if (Auth::guard()->check()) {
            $verificationData = UserVerificationCode::where('user_id',Auth::id()) -> first();

            if($verificationData -> verification_code == $code){
                User::whereId(Auth::id()) -> update(['verified_at' => now()]);
                return true;
            }else{
                return false;
            }
        }
        return false ;
    }


    public function removeOTPCode($code): void
    {
        UserVerificationCode::where('verification_code',$code) -> delete();
    }
}
