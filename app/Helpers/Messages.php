<?php

namespace App\Helpers;

use Illuminate\Support\Facades\App;

class Messages
 {
    private static $Messages = [
        // general
        'operation accomplished successfully' => 'Operation accomplished successfully',

        //AUTH
        'REGISTERED_SUCCESSFULLY' => 'Account created successfully',
        'BLOCKED_DEVICE' => 'Account is blocked',
        'REGISTRATION_CLOSED' => 'Registration closed by system admin',
        'AUTH_CODE_ERROR' => 'Activation code error, try again',
        'AUTH_CODE_SENT_BEFORE' => 'Auth code sent before, please check ful messages in inbox!',
        'NO_AUTH_CODE' => 'Process denied, incorrect',
        'UNAUTHORISED' => 'Unauthorised, please login',
        'IN_ACTIVE_ACCOUNT' => 'Please, activate your account, check ful messages in inbox',
        'ERROR_CREDENTIALS' => 'Error login credentials, check and try again',
        'LOGGED_OUT_SUCCESSFULLY' => 'Logged out successfully',
        'LOGGED_IN_SUCCESSFULLY' => 'Logged in successfully',
        'LOGIN_IN_FAILED' => 'Login failed, try again!',
        'NO_ACCOUNT' => 'User mobile is not registered!',
        'AUTH_CODE_SENT' => 'Auth code sent successfully',
        'ACCOUNT_EXIST' => 'Email registered before!',
        'MOBILE_EXIST' => 'Mobile registered before!',
        'SUCCESS_AUTH' => 'Account activated successfully',
        'exam_fail' => 'We apologize, you could not pass the exam',
        'attempts' => 'You exceeded the the number of allowed attempts',
        'profile_exam' => 'please complate your profile',
        'ITEM_NOT_FOUND' => 'We can not found this record',
        'SEND_FAILED' => 'You have been alrdey send',
        'BASKET_IS_EMPTY' => 'Your Basket Empty',



        //PASSWORD
        'FORGET_PASSWORD_SUCCESS' => 'Password reset code sent successfully',
        'FORGET_PASSWORD_FAILED' => 'Failed to sent password reset code!',
        'PASSWORD_RESET_CODE_CORRECT' => 'Correct password reset code, set new password',
        'PASSWORD_RESET_CODE_ERROR' => 'Password reset code error, try again',
        'NO_PASSWORD_RESET_CODE' => 'No forget password request exist, process denied!',
        'PASS_RESET_CODE_SENT_BEFORE' => 'Password reset code sent before, please check messages in inbox!',
        'exp_date' => 'This Quiz Expired',

        'RESET_PASSWORD_SUCCESS' => 'Reset password success',
        'RESET_PASSWORD_FAILED' => 'Failed to reset password!',
        'CART_SUCCESS' => 'Add To Cart successfully',

        'CONTACT_US_REQUEST_SUCCESS' => 'Contact request sent successfully, thanks',
        'CONTACT_US_REQUEST_FAILED' => 'Failed to send contact request, try again',

        'USER_UPDATED_SUCCESS' => 'Profile updated successfully',
        'USER_UPDATED_FAILED' => 'Profile update failed!, try again',

        'PASSWORD_SENT' => 'Password sent successfully, use it to login to your account',
        'PASSWORD_SEND_FAILED' => 'Failed to sent password, please try again',
        'PASSWORD_ALREADY_SET' => 'Password has been set before!',
        "PASSWORD_NOT_SET" => 'Please request your account password!',

        'MULTI_ACCESS_ERROR' => 'It is not possible to log in to the same account from two devices at once!',
        'SECURITY_CHECK_SUCCESS' => 'Your status has been sent successfully, keep safe',
        'SECURITY_CHECK_DUPLICATE' => 'Your status has been sent before, keep safe',
        'SECURITY_CHECK_FAILED' => 'There was a malfunction in submitting your case, please try again',

        'CREATE_SUCCESS' => 'Created successfully',
        'CREATE_FAILED' => 'Create failed, please try again',

        'DELETE_SUCCESS' => 'Deleted successfully',
        'DELETE_FAILED' => 'Delete failed, please try again',
        'REQUEST_SUCCESS' => 'Successfully',
        'UPDATE_SUCCESS' => 'Updated successfully',
        'UPDATE_FAILED' => 'Delete failed, please try again',
        'favorite' => 'Added to your favorite list',
        'favorite_delete' => 'Removed from your favorite list',
        'PASSWORD_changed' => 'PASSWORD_changed',
        'NO_ACCESS_PERMISSION' => 'You dont have access permission to this component',
        'NOT_FOUND' => 'Object not fount',
        'REORDER_SUCCESS' => 'The request was successfully re-order',


        // Order Status
        'PENDING' => 'Your request was created successfully',
        'ACCEPTED' => 'Your request has been accepted by a distributor: ',
        'DECLINED' => 'Sorry, your order was rejected by a distributor:',
        'ONWAY' => 'The dealer is on your way',
        'PROCESSING' => 'Your order is being packed',
        'FILLED' => 'Your request has been filled',
        'DELIVERED' => 'Has your order been delivered, please confirm delivery',
        'COMPLETED' => 'We are here to serve you',
        'CANCELLED_BY_VENDOR' => 'We apologize your order has been canceled by a distributor :',
        'CANCELLED_BY_CUSTOMER' => 'The request was rejected by the customer:',

        'New Message' => 'New Message',
        'A site has been sent' => 'A site has been sent',

    ];

    public static function getMessage($code)
    {
        return self::$Messages[$code]  ;
    }
}