<?php 

return [
    'operating_order_id.required' => 'معرف طلب التشغيل مطلوب.',
    'operating_order_id.exists' => 'معرف طلب التشغيل المحدد غير موجود.',
    'file_path.file' => 'يجب أن يكون الملف ملفًا صالحًا.',
    'file_path.mimes' => 'يجب أن يكون الملف من نوع: jpeg، png، pdf.',
    'file_path.max' => 'لا يمكن أن يتجاوز حجم الملف 2048 كيلو بايت.',
    'description_ar.required' => 'الوصف باللغة العربية مطلوب.',
    'description_ar.string' => 'يجب أن يكون الوصف باللغة العربية سلسلة نصية.',
    'description_ar.max' => 'لا يمكن أن يتجاوز الوصف باللغة العربية 255 حرفًا.',

    'name.required' => 'الاسم مطلوب.',
    'name.string' => 'يجب أن يكون الاسم نصًا.',
    'name.max' => 'لا يمكن أن يزيد الاسم عن 255 حرفًا.',

    'phone_number.required' => 'رقم الهاتف مطلوب.',
    'phone_number.string' => 'يجب أن يكون رقم الهاتف نصًا.',
    'phone_number.max' => 'لا يمكن أن يزيد رقم الهاتف عن 20 حرفًا.',
    'phone_number.unique' => 'رقم الهاتف مستخدم بالفعل.',

    'email.required' => 'البريد الإلكتروني مطلوب.',
    'email.email' => 'يجب أن يكون البريد الإلكتروني عنوان بريد إلكتروني صالحًا.',
    'email.unique' => 'البريد الإلكتروني مستخدم بالفعل.',


    'item_id.required' => 'العنصر مطلوب.',
    'item_id.exists' => 'العنصر المحدد غير موجود.',

    'description_ar.required' => 'الوصف بالعربية مطلوب.',
    'description_ar.string' => 'يجب أن يكون الوصف بالعربية نصًا.',
    'description_ar.max' => 'لا يمكن أن يزيد الوصف بالعربية عن 255 حرفًا.',

    'description_en.required' => 'الوصف بالإنجليزية مطلوب.',
    'description_en.string' => 'يجب أن يكون الوصف بالإنجليزية نصًا.',
    'description_en.max' => 'لا يمكن أن يزيد الوصف بالإنجليزية عن 255 حرفًا.',

    'quantity.required' => 'الكمية مطلوبة.',
    'quantity.integer' => 'يجب أن تكون الكمية عددًا صحيحًا.',
    'quantity.min' => 'يجب أن تكون الكمية على الأقل 1.',

    'unit_price.required' => 'سعر الوحدة مطلوب.',
    'unit_price.numeric' => 'يجب أن يكون سعر الوحدة رقمًا.',
    'unit_price.min' => 'يجب أن يكون سعر الوحدة على الأقل 0.',
    'unit_price.max' => 'لا يمكن أن يزيد سعر الوحدة عن 999999.99.',

    'total_price.required' => 'السعر الإجمالي مطلوب.',
    'total_price.numeric' => 'يجب أن يكون السعر الإجمالي رقمًا.',
    'total_price.min' => 'يجب أن يكون السعر الإجمالي على الأقل 0.',
    'total_price.max' => 'لا يمكن أن يزيد السعر الإجمالي عن 999999.99.',

    'tax.numeric' => 'يجب أن تكون الضريبة رقمًا.',
    'tax.min' => 'يجب أن تكون الضريبة على الأقل 0.',
    'tax.max' => 'لا يمكن أن تزيد الضريبة عن 99.99.',



     // General Fields
     'operating_order_id.required' => 'أمر التشغيل مطلوب.',
     'operating_order_id.exists' => 'أمر التشغيل المحدد غير موجود.',
     
     'amount.required' => 'المبلغ مطلوب.',
     'amount.numeric' => 'يجب أن يكون المبلغ رقمًا.',
     'amount.min' => 'يجب ألا يقل المبلغ عن 0.',
     
     'payment_date.required' => 'تاريخ الدفع مطلوب.',
     'payment_date.date' => 'يجب أن يكون تاريخ الدفع تاريخًا صالحًا.',
     
     'payment_method.required' => 'طريقة الدفع مطلوبة.',
     'payment_method.string' => 'يجب أن تكون طريقة الدفع نصًا.',
     'payment_method.max' => 'لا يجب أن تتجاوز طريقة الدفع 255 حرفًا.',
     
     'collector_id.required' => 'المجمع مطلوب.',
     'collector_id.numeric' => 'يجب أن يكون المجمع رقمًا صحيحًا.',
     'collector_id.exists' => 'المجمع المحدد غير موجود.',
     
     'notes.string' => 'يجب أن تكون الملاحظات نصًا.',
     
     'file.required' => 'الصورة مطلوبة.',
     'file.image' => 'يجب أن يكون الملف صورة.',
     'file.mimes' => 'يجب أن يكون نوع الملف: jpeg, png, jpg, gif, svg.',
     'file.max' => 'يجب ألا يزيد حجم الصورة عن 2048 كيلوبايت.',
     
     'client_id.required' => 'العميل مطلوب.',
     'client_id.exists' => 'العميل المحدد غير موجود.',
     
     'order_number.required' => 'رقم الطلب مطلوب.',
     'order_number.string' => 'يجب أن يكون رقم الطلب نصًا.',
     'order_number.max' => 'لا يجب أن يتجاوز رقم الطلب 255 حرفًا.',
     'order_number.unique' => 'رقم الطلب يجب أن يكون فريدًا.',
     
     'order_date.required' => 'تاريخ الطلب مطلوب.',
     'order_date.date' => 'يجب أن يكون تاريخ الطلب تاريخًا صالحًا.',
     
     'status.required' => 'الحالة مطلوبة.',
     'status.in' => 'يجب أن تكون الحالة واحدة من: جاري التنفيذ، مكتمل، معلق.',
     
     'payment_status.required' => 'حالة الدفع مطلوبة.',
     'payment_status.in' => 'يجب أن تكون حالة الدفع واحدة من: مدفوعة، غير مدفوعة.',
     
     'total_amount.required' => 'المبلغ الإجمالي مطلوب.',
     'total_amount.numeric' => 'يجب أن يكون المبلغ الإجمالي رقمًا.',
     'total_amount.min' => 'يجب ألا يقل المبلغ الإجمالي عن 0.',
     
     'name_ar.required' => 'الاسم العربي مطلوب.',
     'name_ar.string' => 'يجب أن يكون الاسم العربي نصًا.',
     'name_ar.max' => 'لا يجب أن يتجاوز الاسم العربي 255 حرفًا.',
     
     'name_en.string' => 'يجب أن يكون الاسم الإنجليزي نصًا.',
     'name_en.max' => 'لا يجب أن يتجاوز الاسم الإنجليزي 255 حرفًا.',
     
     'sales.required' => 'المبيعات مطلوبة.',
     'sales.numeric' => 'يجب أن تكون المبيعات رقمًا.',
     'sales.min' => 'يجب ألا تقل المبيعات عن 0.',
     'sales.max' => 'يجب ألا تتجاوز المبيعات 999999999999.99.',
     
     'expenses.required' => 'المصروفات مطلوبة.',
     'expenses.numeric' => 'يجب أن تكون المصروفات رقمًا.',
     'expenses.min' => 'يجب ألا تقل المصروفات عن 0.',
     'expenses.max' => 'يجب ألا تتجاوز المصروفات 999999999999.99.',
     
     'profit.required' => 'الربح مطلوب.',
     'profit.numeric' => 'يجب أن يكون الربح رقمًا.',
     'profit.min' => 'يجب ألا يقل الربح عن 0.',
     'profit.max' => 'يجب ألا يتجاوز الربح 999999999999.99.',
     
     'delivered_quantity.number' => 'يجب أن تكون الكمية المسلمة رقمًا.',
];
