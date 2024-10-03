<?php

namespace App\Helpers;

use Illuminate\Support\Facades\App;

class Messages
 {
    private static $Messages_EN = [
        // general
        'operation accomplished successfully' => 'Operation accomplished successfully',

        //AUTH
        'FINANCIA_GET_SUCCESSFULLY' => 'Financial data acquisition process completed',
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
        'INTERNAL_SERVER_ERROR'  => 'internal server error'  , 
        // ORDERS 
        'ORDER_STATUS_UPDATED' => 'Order request updated', 
        'UPDATE_FAILED' => 'Failed to update update',
        'INVALID_UPDATE_ELEMENT' => 'Invalid update item',
        'ORDER_NOT_FOUND' =>  'order not found',
        'ORDER_DETAILS_RETRIEVED' => 'order details retrieved' ,
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
        'INVALIDE_SERVICE_TYPE'  => 'invalid service type' , 
        'CREATE_USERS_ACCOUNT' => 'successfuly create accout',
        'ID_NOT_FOUND' => 'The specified identifier was not found' ,
        'ITEMS_UPDATED_SUCCESSFULLY' => 'The items have been updated successfully.',
        'INVALID_DELIVERED_QUANTITY' => 'Delivered quantity cannot be greater than total quantity.',
        'EXCEPTION_MESSAGE' => 'An error occurred: :message',
        'PURCHASES_ORDER_ITEMS_NOT_FOUND' =>  ' Purchase data cannot be found for this order.' , 
        'PURCHASES_ORDER_ITEMS_RETRIEVED' => 'Order purchases have been returned' , 
        'PAYMENTS_ORDER_RETRIEVED' => 'Order Payments have been returned' , 
        'PAYMENTS_ORDER_NOT_FOUND' => 'Payments data cannot be found for this order.'  , 
        'ATTACHMENTS_ORDER_DETAILS_RETRIEVED'  => 'Order attachments have been returned . '  , 
        'ATTACHMENTS_ORDER_NOT_FOUND' => 'Attachments data cannot be found for this order.' ,
        'VETIFICATION_ERRORS'  => 'There is an error in the entered data', 
        'INVOICES_ORDER_DETAILS_RETRIEVED'  => 'Order invoices have been returned . '  , 
        'INVOICES_ORDER_NOT_FOUND' => 'invoices data cannot be found for this order.' ,
        'UPDATES_ORDER_DETAILS_RETRIEVED'  => 'Order updates have been returned . '  , 
        'UPDATES_ORDER_NOT_FOUND' => 'Updates data cannot be found for this order.' ,
        'CREATE_ITEM_SUCCESSFULLY' => 'Created successfully' , 
        'DELETE_ITEM_SUCCESSFULLY' => 'Deleted successfully' , 
        'DATA_RETRIEVED_SUCCESSFULLY' => 'Delivered data successfully',
        'DATA_RETRIEVED_FAILD' => 'Delivered data failed',

        'CREATE_ITEM_FAILD' => 'Created Failed' , 
        'DELETE_ITEM_FAILD' => 'Deleted Failed' , 
        'UPDATE_ELEMENT_NOT_FOUND' => 'Update failed You must enter the data you want to update'

    ]; 



    private static $Messages_AR = [
        // General
        'FINANCIA_GET_SUCCESSFULLY' => 'تمت عملية الحصول على بيانات المالية',
        'DATA_RETRIEVED_SUCCESSFULLY' => ' . تم استرجاع البيانات بنجاح',
        'DATA_RETRIEVED_FAILD' => ' . فشل في استرجاع البيانات ',
        'PURCHASES_ORDER_ITEMS_RETRIEVED' => 'تم استرجاع مشتريات الطلبية ' , 
        'PAYMENTS_ORDER_RETRIEVED' => 'تم استرجاع  دفعات  الطلبية ' , 
        'ATTACHMENTS_ORDER_DETAILS_RETRIEVED'  => 'تم استرجاع   مرفقات   الطلبية '  , 
        'UPDATES_ORDER_DETAILS_RETRIEVED'  => 'تم استرجاع   تحديثات   الطلبية '  , 
        'UPDATES_ORDER_NOT_FOUND' => 'لا يمكننا العثور على هذا   تحديثات  الطلبية ' ,     
        'CREATE_ITEM_SUCCESSFULLY' => ' تم انشاء العنصر بنجاح ' ,  
        'DELETE_ITEM_SUCCESSFULLY' => ' تم حذف  العنصر بنجاح ' , 
        'CREATE_ITEM_FAILD' => 'فشل في عملية الانشاء العنصر ' , 
        'DELETE_ITEM_FAILD' => 'فشل في عملية حذف العنصر ' , 
        'UPDATE_ELEMENT_NOT_FOUND' => 'فشل في تحديث يجب عليك ادخال البيانات التي تريد تحديثها ' ,
        'INVOICES_ORDER_DETAILS_RETRIEVED' => 'تم إرجاع فواتير الطلب.' ,
        'INVOICES_ORDER_NOT_FOUND' => 'لم يتم العثور على بيانات الفواتير لهذا الطلب.' ,
        'VETIFICATION_ERRORS'  => 'يوجد خطأ في البيانات المدخلة ', 

         // AUTH
        'ITEMS_UPDATED_SUCCESSFULLY' => 'تم تحديث العناصر بنجاح.',
         'INVALID_DELIVERED_QUANTITY' => 'يجب ألا تكون الكمية المسلمة أكبر من الكمية الإجمالية.',
        'EXCEPTION_MESSAGE' => 'حدث خطأ: :message',
         'ORDER_STATUS_UPDATED' => 'تم تحديث الحالة لطلبية ', 
        'UPDATE_FAILED'  => 'فشل في عملية التحديث ' ,  
        'INVALID_UPDATE_ELEMENT' =>   'عنصر التحديث غير صالح'  , 
        
        'REGISTERED_SUCCESSFULLY' => 'تم إنشاء الحساب بنجاح',
        'BLOCKED_DEVICE' => 'الحساب محظور',
        'REGISTRATION_CLOSED' => 'التسجيل مغلق من قبل مسؤول النظام',
        'AUTH_CODE_ERROR' => 'خطأ في رمز التفعيل، حاول مرة أخرى',
        'AUTH_CODE_SENT_BEFORE' => 'تم إرسال رمز التفعيل مسبقًا، الرجاء التحقق من رسائلك!',
        'NO_AUTH_CODE' => 'تم رفض العملية، الرمز غير صحيح',
        'UNAUTHORISED' => 'غير مصرح، الرجاء تسجيل الدخول',
        'IN_ACTIVE_ACCOUNT' => 'يرجى تفعيل حسابك، تحقق من رسائلك',
        'ERROR_CREDENTIALS' => 'خطأ في بيانات تسجيل الدخول، تحقق وحاول مرة أخرى',
        'LOGGED_OUT_SUCCESSFULLY' => 'تم تسجيل الخروج بنجاح',
        'LOGGED_IN_SUCCESSFULLY' => 'تم تسجيل الدخول بنجاح',
        'LOGIN_IN_FAILED' => 'فشل في تسجيل الدخول، حاول مرة أخرى!',
        'NO_ACCOUNT' => 'رقم الهاتف غير مسجل!',
        'AUTH_CODE_SENT' => 'تم إرسال رمز التفعيل بنجاح',
        'ACCOUNT_EXIST' => 'البريد الإلكتروني مسجل مسبقًا!',
        'MOBILE_EXIST' => 'رقم الهاتف مسجل مسبقًا!',
        'SUCCESS_AUTH' => 'تم تفعيل الحساب بنجاح',
        'exam_fail' => 'نعتذر، لم تتمكن من اجتياز الاختبار',
        'attempts' => 'لقد تجاوزت عدد المحاولات المسموح بها',
        'profile_exam' => 'يرجى إكمال ملفك الشخصي',
        'ITEM_NOT_FOUND' => 'لا يمكننا العثور على هذا السجل',
        'SEND_FAILED' => 'لقد تم الإرسال مسبقًا',
        'BASKET_IS_EMPTY' => 'سلة التسوق فارغة',
        'INVALIDE_SERVICE_TYPE'  => 'نوع الخدمة غير صالح' , 
        'INTERNAL_SERVER_ERROR'  => 'خطأ في الخادم الداخلي'  , 
        'PURCHASES_ORDER_ITEMS_NOT_FOUND' =>  ' لا يمكن العثور على بيانات المشتريات في هذه الطلبية' , 
        'PAYMENTS_ORDER_NOT_FOUND' => ' لا يمكن العثور على بيانات الدفعات   في هذه الطلبية'  , 
        // PASSWORD
        'FORGET_PASSWORD_SUCCESS' => 'تم إرسال رمز إعادة تعيين كلمة المرور بنجاح',
        'FORGET_PASSWORD_FAILED' => 'فشل في إرسال رمز إعادة تعيين كلمة المرور!',
        'PASSWORD_RESET_CODE_CORRECT' => 'رمز إعادة تعيين كلمة المرور صحيح، قم بتعيين كلمة مرور جديدة',
        'PASSWORD_RESET_CODE_ERROR' => 'خطأ في رمز إعادة تعيين كلمة المرور، حاول مرة أخرى',
        'NO_PASSWORD_RESET_CODE' => 'لا يوجد طلب لإعادة تعيين كلمة المرور، تم رفض العملية!',
        'PASS_RESET_CODE_SENT_BEFORE' => 'تم إرسال رمز إعادة تعيين كلمة المرور مسبقًا، تحقق من رسائلك!',
        'exp_date' => 'انتهت صلاحية هذا الاختبار',
        'ID_NOT_FOUND' => 'لم يتم العثور على المعرف المحدد.',
    
        'RESET_PASSWORD_SUCCESS' => 'تم إعادة تعيين كلمة المرور بنجاح',
        'RESET_PASSWORD_FAILED' => 'فشل في إعادة تعيين كلمة المرور!',
        'CART_SUCCESS' => 'تمت الإضافة إلى السلة بنجاح',
    
        'CONTACT_US_REQUEST_SUCCESS' => 'تم إرسال طلب الاتصال بنجاح، شكرًا لك',
        'CONTACT_US_REQUEST_FAILED' => 'فشل في إرسال طلب الاتصال، حاول مرة أخرى',
    
        'USER_UPDATED_SUCCESS' => 'تم تحديث الملف الشخصي بنجاح',
        'USER_UPDATED_FAILED' => 'فشل في تحديث الملف الشخصي، حاول مرة أخرى',
    
        'PASSWORD_SENT' => 'تم إرسال كلمة المرور بنجاح، استخدمها لتسجيل الدخول إلى حسابك',
        'PASSWORD_SEND_FAILED' => 'فشل في إرسال كلمة المرور، حاول مرة أخرى',
        'PASSWORD_ALREADY_SET' => 'تم تعيين كلمة المرور مسبقًا!',
        'PASSWORD_NOT_SET' => 'يرجى طلب كلمة مرور حسابك!',
    
        'MULTI_ACCESS_ERROR' => 'لا يمكن تسجيل الدخول إلى نفس الحساب من جهازين في آن واحد!',
        'SECURITY_CHECK_SUCCESS' => 'تم إرسال حالتك بنجاح، كن آمنًا',
        'SECURITY_CHECK_DUPLICATE' => 'تم إرسال حالتك مسبقًا، كن آمنًا',
        'SECURITY_CHECK_FAILED' => 'حدث خطأ في إرسال حالتك، حاول مرة أخرى',
    
        'CREATE_SUCCESS' => 'تم الإنشاء بنجاح',
        'CREATE_FAILED' => 'فشل في الإنشاء، حاول مرة أخرى',
    
        'DELETE_SUCCESS' => 'تم الحذف بنجاح',
        'DELETE_FAILED' => 'فشل في الحذف، حاول مرة أخرى',
    
        'REQUEST_SUCCESS' => 'تمت العملية بنجاح',
        'UPDATE_SUCCESS' => 'تم التحديث بنجاح',
        'UPDATE_FAILED' => 'فشل في التحديث، حاول مرة أخرى',
    
        'favorite' => 'تمت الإضافة إلى قائمتك المفضلة',
        'favorite_delete' => 'تم الحذف من قائمتك المفضلة',
        'PASSWORD_changed' => 'تم تغيير كلمة المرور بنجاح',
        'NO_ACCESS_PERMISSION' => 'ليس لديك صلاحية الوصول إلى هذا المكون',
        'NOT_FOUND' => 'العنصر غير موجود',
        'REORDER_SUCCESS' => 'تم إعادة ترتيب الطلب بنجاح',
        //  ORDERS 
        'ORDER_NOT_FOUND' => ' لم يتم العثور على الطلبية ',
        'ORDER_DETAILS_RETRIEVED' => 'تم استرداد تفاصيل الطلب' ,


        // Order Status
        'PENDING' => 'تم إنشاء طلبك بنجاح',
        'ACCEPTED' => 'تم قبول طلبك من قبل الموزع:',
        'DECLINED' => 'عذرًا، تم رفض طلبك من قبل الموزع:',
        'ONWAY' => 'الموزع في طريقه إليك',
        'PROCESSING' => 'طلبك قيد التجهيز',
        'FILLED' => 'تم تجهيز طلبك',
        'DELIVERED' => 'تم تسليم طلبك، الرجاء تأكيد التسليم',
        'COMPLETED' => 'نحن هنا لخدمتك',
        'CANCELLED_BY_VENDOR' => 'نعتذر، تم إلغاء طلبك من قبل الموزع:',
        'CANCELLED_BY_CUSTOMER' => 'تم رفض الطلب من قبل العميل:',
    
        'CREATE_USERS_ACCOUNT' => 'تم إنشاء الحساب بنجاح',
     ];
    

    public static function getMessage($code , $lang = 'ar')
    { 

        return ($lang == "ar") ?  self::$Messages_AR[$code]   :  self::$Messages_EN[$code]  ;
    }
}