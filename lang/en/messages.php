<?php


return [
    'operating_order_id.required' => 'The operating order ID is required.',
    'operating_order_id.exists' => 'The selected operating order ID does not exist.',
    'file_path.file' => 'The file must be a valid file.',
    'file_path.mimes' => 'The file must be a file of type: jpeg, png, pdf.',
    'file_path.max' => 'The file may not be greater than 2048 kilobytes.',
    'description_ar.required' => 'The Arabic description is required.',
    'description_ar.string' => 'The Arabic description must be a string.',
    'description_ar.max' => 'The Arabic description may not be greater than 255 characters.',



    'name.required' => 'The name is required.',
    'name.string' => 'The name must be a string.',
    'name.max' => 'The name may not be greater than 255 characters.',

    'phone_number.required' => 'The phone number is required.',
    'phone_number.string' => 'The phone number must be a string.',
    'phone_number.max' => 'The phone number may not be greater than 20 characters.',
    'phone_number.unique' => 'The phone number has already been taken.',

    'email.required' => 'The email is required.',
    'email.email' => 'The email must be a valid email address.',
    'email.unique' => 'The email has already been taken.',


    'item_id.required' => 'The item is required.',
    'item_id.exists' => 'The selected item does not exist.',

    'description_ar.required' => 'The Arabic description is required.',
    'description_ar.string' => 'The Arabic description must be a string.',
    'description_ar.max' => 'The Arabic description may not be greater than 255 characters.',

    'description_en.required' => 'The English description is required.',
    'description_en.string' => 'The English description must be a string.',
    'description_en.max' => 'The English description may not be greater than 255 characters.',

    'quantity.required' => 'The quantity is required.',
    'quantity.integer' => 'The quantity must be an integer.',
    'quantity.min' => 'The quantity must be at least 1.',

    'unit_price.required' => 'The unit price is required.',
    'unit_price.numeric' => 'The unit price must be a number.',
    'unit_price.min' => 'The unit price must be at least 0.',
    'unit_price.max' => 'The unit price may not be greater than 999999.99.',

    'total_price.required' => 'The total price is required.',
    'total_price.numeric' => 'The total price must be a number.',
    'total_price.min' => 'The total price must be at least 0.',
    'total_price.max' => 'The total price may not be greater than 999999.99.',

    'tax.numeric' => 'The tax must be a number.',
    'tax.min' => 'The tax must be at least 0.',
    'tax.max' => 'The tax may not be greater than 99.99.',


    'operating_order_id.required' => 'The operating order is required.',
    'operating_order_id.exists' => 'The selected operating order does not exist.',
    
    'amount.required' => 'The amount is required.',
    'amount.numeric' => 'The amount must be a number.',
    'amount.min' => 'The amount must be at least 0.',
    
    'payment_date.required' => 'The payment date is required.',
    'payment_date.date' => 'The payment date must be a valid date.',
    
    'payment_method.required' => 'The payment method is required.',
    'payment_method.string' => 'The payment method must be a string.',
    'payment_method.max' => 'The payment method may not exceed 255 characters.',
    
    'collector_id.required' => 'The collector is required.',
    'collector_id.numeric' => 'The collector must be a valid number.',
    'collector_id.exists' => 'The selected collector does not exist.',
    
    'notes.string' => 'The notes must be a string.',
    
    'file.required' => 'An image is required.',
    'file.image' => 'The file must be an image.',
    'file.mimes' => 'The file must be a type of: jpeg, png, jpg, gif, svg.',
    'file.max' => 'The image may not be larger than 2048 kilobytes.',
    
    'client_id.required' => 'The client is required.',
    'client_id.exists' => 'The selected client does not exist.',
    
    'order_number.required' => 'The order number is required.',
    'order_number.string' => 'The order number must be a string.',
    'order_number.max' => 'The order number may not exceed 255 characters.',
    'order_number.unique' => 'The order number must be unique.',
    
    'order_date.required' => 'The order date is required.',
    'order_date.date' => 'The order date must be a valid date.',
    
    'status.required' => 'The status is required.',
    'status.in' => 'The status must be one of: in progress, completed, pending.',
    
    'payment_status.required' => 'The payment status is required.',
    'payment_status.in' => 'The payment status must be one of: paid, unpaid.',
    
    'total_amount.required' => 'The total amount is required.',
    'total_amount.numeric' => 'The total amount must be a number.',
    'total_amount.min' => 'The total amount must be at least 0.',
    
    'name_ar.required' => 'The Arabic name is required.',
    'name_ar.string' => 'The Arabic name must be a string.',
    'name_ar.max' => 'The Arabic name may not exceed 255 characters.',
    
    'name_en.string' => 'The English name must be a string.',
    'name_en.max' => 'The English name may not exceed 255 characters.',
    
    'sales.required' => 'Sales are required.',
    'sales.numeric' => 'Sales must be a number.',
    'sales.min' => 'Sales must be at least 0.',
    'sales.max' => 'Sales cannot exceed 999999999999.99.',
    
    'expenses.required' => 'Expenses are required.',
    'expenses.numeric' => 'Expenses must be a number.',
    'expenses.min' => 'Expenses must be at least 0.',
    'expenses.max' => 'Expenses cannot exceed 999999999999.99.',
    
    'profit.required' => 'Profit is required.',
    'profit.numeric' => 'Profit must be a number.',
    'profit.min' => 'Profit must be at least 0.',
    'profit.max' => 'Profit cannot exceed 999999999999.99.',
    
    'delivered_quantity.number' => 'The delivered quantity must be a number.',


];
