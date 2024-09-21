@extends('dashboard.layout.app')

@section('content')
<h2 class="main-heading">
            تجريب 
                </h2>  
 
            <main style="float:left;">
                <h2 class="main-heading">
                تفاصيل أمر التشغيل
                </h2>               
 @if(!empty($operating_order))               
                <div class="main-id english">
                    <h4>ID:</h4>
                    <span id = "operating_order"> {{$operating_order->id}} </span>
                    </div>
                    <div class="main-cards-container">
                    <div class="main-card">
                        <h3>تفاصيل الطلب</h3>
                        <div class="main-card-content">
                            <div class="main-card-info-pair" style="height: calc(20%);">
                                <h4>التاريخ والوقت</h4>
                                <span>  {{$operating_order->order_date}} </span>
                            </div>
                            <div class="main-card-info-pair" style="height: calc(20%);">
                                <h4>معرف الطلب</h4>
                                <span> {{$operating_order->order_number}}  </span>
                            </div>
                    

                       <div class="main-card-info-pair " data-status="" style="height: calc(20%);">
                            <h4>حالة أمر التشغيل </h4>
                            <span class=".custom-select">
                            <input type="hidden" class="update_element" value = "status" name = "update_element">
                                <select name="status" id="status"   class ="status">            
                                    <option value="completed" @if($operating_order->status == 'completed') selected @endif>تم التنفيذ</option>
                                    <option value="in_progress" @if($operating_order->status == 'in_progress') selected @endif>قيد التنفيذ</option>
                                    <option value="canceled" @if($operating_order->status == 'canceled') selected @endif>تم الإلغاء</option>
                                    <option value="pending" @if($operating_order->status == 'pending') selected @endif>تقيد الطلب</option>
                                </select>
                            </span>

                       
                        </div>
                        <div class="main-card-info-pair " data-status="{{ $operating_order->payment_status }}" style="height: calc(20%);">
                            <h4>حالة المدفوعات</h4>
                            <span class=".custom-select">
                            <input type="hidden" class="update_element" value = "payment_status"  name = "update_element">
                                <select name="payment_status" class ="status" id="payment_status">
                                    <option value="paid" @if($operating_order->payment_status == 'paid') selected @endif>مدفوع</option>
                                    <option value="unpaid" @if($operating_order->payment_status == 'unpaid') selected @endif>غير مدفوع</option>
                                    <option value="partially-paid" @if($operating_order->payment_status == 'partially-paid') selected @endif>مدفوع جزئي</option>
                                </select>
                            </span>

                        </div>

                        <div class="main-card-info-pair" data-status="{{ $operating_order->order_importance }}" style="height: calc(20%);">
                            <h4>أهمية العمل</h4>
                            <span class=".custom-select">
                            <input type="hidden" class="update_element" value = "order_importance" name = "update_element">
                                     <select name="order_importance"  class ="status"  id="order_importance">
                                        <option value="regular" @if($operating_order->order_importance == 'regular') selected @endif>عادي</option>
                                        <option value="urgent" @if($operating_order->order_importance == 'urgent') selected @endif>عاجل</option>
                                    </select>
                            <span class=".custom-select">
                         </div>

                        </div>
                    </div> 
                    
                    
                    
                    <div class="main-card quick-actions">
                        <h3>
                        إجراءات سريعة
                        </h3>
                        <div class="main-card-content">
                            
                        <button class="pop-up-btn assets">
                            <svg class="svg-inline--fa fa-image" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="image" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M0 96C0 60.7 28.7 32 64 32H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zM323.8 202.5c-4.5-6.6-11.9-10.5-19.8-10.5s-15.4 3.9-19.8 10.5l-87 127.6L170.7 297c-4.6-5.7-11.5-9-18.7-9s-14.2 3.3-18.7 9l-64 80c-5.8 7.2-6.9 17.1-2.9 25.4s12.4 13.6 21.6 13.6h96 32H424c8.9 0 17.1-4.9 21.2-12.8s3.6-17.4-1.4-24.7l-120-176zM112 192a48 48 0 1 0 0-96 48 48 0 1 0 0 96z"></path></svg><!-- <i class="fa-solid fa-image"></i> Font Awesome fontawesome.com -->
                            <span>إضافة صورة</span>
                        </button>
                        <button class="pop-up-btn update">
                            <svg class="svg-inline--fa fa-arrows-rotate" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrows-rotate" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M105.1 202.6c7.7-21.8 20.2-42.3 37.8-59.8c62.5-62.5 163.8-62.5 226.3 0L386.3 160H352c-17.7 0-32 14.3-32 32s14.3 32 32 32H463.5c0 0 0 0 0 0h.4c17.7 0 32-14.3 32-32V80c0-17.7-14.3-32-32-32s-32 14.3-32 32v35.2L414.4 97.6c-87.5-87.5-229.3-87.5-316.8 0C73.2 122 55.6 150.7 44.8 181.4c-5.9 16.7 2.9 34.9 19.5 40.8s34.9-2.9 40.8-19.5zM39 289.3c-5 1.5-9.8 4.2-13.7 8.2c-4 4-6.7 8.8-8.1 14c-.3 1.2-.6 2.5-.8 3.8c-.3 1.7-.4 3.4-.4 5.1V432c0 17.7 14.3 32 32 32s32-14.3 32-32V396.9l17.6 17.5 0 0c87.5 87.4 229.3 87.4 316.7 0c24.4-24.4 42.1-53.1 52.9-83.7c5.9-16.7-2.9-34.9-19.5-40.8s-34.9 2.9-40.8 19.5c-7.7 21.8-20.2 42.3-37.8 59.8c-62.5 62.5-163.8 62.5-226.3 0l-.1-.1L125.6 352H160c17.7 0 32-14.3 32-32s-14.3-32-32-32H48.4c-1.6 0-3.2 .1-4.8 .3s-3.1 .5-4.6 1z"></path></svg><!-- <i class="fa-solid fa-arrows-rotate"></i> Font Awesome fontawesome.com -->
                            <span>إضافة تحديث</span>
                        </button>
                        <button class="pop-up-btn bill">
                            <svg class="svg-inline--fa fa-file-invoice" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="file-invoice" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM80 64h64c8.8 0 16 7.2 16 16s-7.2 16-16 16H80c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64h64c8.8 0 16 7.2 16 16s-7.2 16-16 16H80c-8.8 0-16-7.2-16-16s7.2-16 16-16zm16 96H288c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V256c0-17.7 14.3-32 32-32zm0 32v64H288V256H96zM240 416h64c8.8 0 16 7.2 16 16s-7.2 16-16 16H240c-8.8 0-16-7.2-16-16s7.2-16 16-16z"></path></svg><!-- <i class="fa-solid fa-file-invoice"></i> Font Awesome fontawesome.com -->
                            <span>إضافة فاتورة</span>
                        </button>
                        <button class="pop-up-btn close">
                            <svg class="svg-inline--fa fa-lock" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="lock" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z"></path></svg><!-- <i class="fa-solid fa-lock"></i> Font Awesome fontawesome.com -->
                            <span>إغلاق الطلب</span>
                        </button>
                        <button class="pop-up-btn close">
                            <svg class="svg-inline--fa fa-barcode" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="barcode" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M24 32C10.7 32 0 42.7 0 56V456c0 13.3 10.7 24 24 24H40c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24H24zm88 0c-8.8 0-16 7.2-16 16V464c0 8.8 7.2 16 16 16s16-7.2 16-16V48c0-8.8-7.2-16-16-16zm72 0c-13.3 0-24 10.7-24 24V456c0 13.3 10.7 24 24 24h16c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24H184zm96 0c-13.3 0-24 10.7-24 24V456c0 13.3 10.7 24 24 24h16c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24H280zM448 56V456c0 13.3 10.7 24 24 24h16c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24H472c-13.3 0-24 10.7-24 24zm-64-8V464c0 8.8 7.2 16 16 16s16-7.2 16-16V48c0-8.8-7.2-16-16-16s-16 7.2-16 16z"></path></svg><!-- <i class="fa-solid fa-barcode"></i> Font Awesome fontawesome.com -->
                            <span>طباعة الباركود</span>
                        </button>
                        <button class="pop-up-btn close">
                            <svg class="svg-inline--fa fa-print" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="print" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M128 0C92.7 0 64 28.7 64 64v96h64V64H354.7L384 93.3V160h64V93.3c0-17-6.7-33.3-18.7-45.3L400 18.7C388 6.7 371.7 0 354.7 0H128zM384 352v32 64H128V384 368 352H384zm64 32h32c17.7 0 32-14.3 32-32V256c0-35.3-28.7-64-64-64H64c-35.3 0-64 28.7-64 64v96c0 17.7 14.3 32 32 32H64v64c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V384zM432 248a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"></path></svg><!-- <i class="fa-solid fa-print"></i> Font Awesome fontawesome.com -->
                            <span>تسليم البضاعة</span>
                        </button>
                        <button class="pop-up-btn print" onclick="javascript:window.print()">
                            <svg class="svg-inline--fa fa-print" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="print" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M128 0C92.7 0 64 28.7 64 64v96h64V64H354.7L384 93.3V160h64V93.3c0-17-6.7-33.3-18.7-45.3L400 18.7C388 6.7 371.7 0 354.7 0H128zM384 352v32 64H128V384 368 352H384zm64 32h32c17.7 0 32-14.3 32-32V256c0-35.3-28.7-64-64-64H64c-35.3 0-64 28.7-64 64v96c0 17.7 14.3 32 32 32H64v64c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V384zM432 248a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"></path></svg><!-- <i class="fa-solid fa-print"></i> Font Awesome fontawesome.com -->
                            <span>
                            طباعة أمر التشغيل
                            <!-- <a href="javascript:window.print()">طباعة أمر التشغيل</a> -->
                            </span>
                            
                        </button>
                        <button class="pop-up-btn pay bill">
                            <svg class="svg-inline--fa fa-money-bill" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="money-bill" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M64 64C28.7 64 0 92.7 0 128V384c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H64zm64 320H64V320c35.3 0 64 28.7 64 64zM64 192V128h64c0 35.3-28.7 64-64 64zM448 384c0-35.3 28.7-64 64-64v64H448zm64-192c-35.3 0-64-28.7-64-64h64v64zM288 160a96 96 0 1 1 0 192 96 96 0 1 1 0-192z"></path></svg><!-- <i class="fa-solid fa-money-bill"></i> Font Awesome fontawesome.com -->
                            <span>إضافة عملية دفع</span>
                        </button>
                        <button class="pop-up-btn bill">
                            <svg class="svg-inline--fa fa-paper-plane" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="paper-plane" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M498.1 5.6c10.1 7 15.4 19.1 13.5 31.2l-64 416c-1.5 9.7-7.4 18.2-16 23s-18.9 5.4-28 1.6L284 427.7l-68.5 74.1c-8.9 9.7-22.9 12.9-35.2 8.1S160 493.2 160 480V396.4c0-4 1.5-7.8 4.2-10.7L331.8 202.8c5.8-6.3 5.6-16-.4-22s-15.7-6.4-22-.7L106 360.8 17.7 316.6C7.1 311.3 .3 300.7 0 288.9s5.9-22.8 16.1-28.7l448-256c10.7-6.1 23.9-5.5 34 1.4z"></path></svg><!-- <i class="fa-solid fa-paper-plane"></i> Font Awesome fontawesome.com -->
                            <span>تعميد الطلب</span>
                        </button>
                        </div>
                    </div>
                    <div class="main-card">
                        <h3>بيانات العميل</h3>
                        <div class="main-card-content">
                        <div class="main-card-info-pair" style="height: calc(25%);">
                            <h4>اسم العميل</h4>
                            <span>{{$operating_order->customer->name}}</span>
                        </div>
                        <div class="main-card-info-pair" style="height: calc(25%);">
                            <h4>رقم الجوال</h4>
                            <span>{{$operating_order->customer->phone_number}}</span>
                        </div>
                        <div class="main-card-info-pair" style="height: calc(25%);">
                            <h4>رقم العميل</h4>
                            <span>{{$operating_order->customer->id}}</span>
                        </div>
                        <div class="main-card-info-pair" style="height: calc(25%);">
                            <h4>المندوب المسئول</h4>
                            <span>
                                {{$operating_order->representative->name}}
                             <svg class="svg-inline--fa fa-pen-to-square" aria-hidden="true" focusable="false" data-prefix="far" data-icon="pen-to-square" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"></path></svg><!-- <i class="fa-regular fa-pen-to-square"></i> Font Awesome fontawesome.com -->
                            </span>
                        </div>
                        </div>
                    </div>
                    <div class="main-card notes">
                        <h3>ملاحظات</h3>
                        <!-- <div class="main-card-content">
                        <h4>محمد عبد العزيز:</h4>
                        <h4>التاريخ التحديث </h4>
                        <p>
                            ت
                            كمن فائدة نصوص "اللوريم إيبسوم" في أنها تعطي توزيعاً طبيعياً للحروف، بدلاً من استخدام "هنا يوجد نص يوجد هنا نص"، مما يجعلها تبدو مقروءة. العديد من برامج النشر المكتبي ومحررات الويب تستخدم اللوريم إيبسوم كنص عينة للتصميم، وكيفية تنظيم الصفحة والتخطيط، بينما يعمل الباحثون على إنشاء نصوص لوريم 
                            إيبسوم بشكل دوري لمعاينة تصاميم جديدة.
                        </p>
                        </div> -->  
                        
                        

                        <table id="table" class ="display data-table-updates  table-striped" style ="" id="updates_tables"   >
                            <thead>
                                <tr>
                                    <th style="display: none;">name</th>
                                    <th style="display: none;">date</th>
                                    <th style="display: none;">description</th>

                                    
                                </tr>
                            </thead>
                            <tbody>  
                            <tr>
               
                            <th scope="row"></th>


                            </tr>

                                               
                             </tbody>
                        </table>

                        



                    </div>
                    <div class="main-card financial">
                        <h3>المدفوعات</h3>
                        <div class="main-card-content">
                        <div>
                            <div class="total">
                            <h4>الإجمالي</h4>
                            <h2  class ="total_amount">{{$operating_order->total_amount}}</h2>
                            <span>SAR</span>
                            </div>
                            <div class="paid">
                            <h4>المدفوع</h4>
                            <h2  class="total_amount_paid">{{$totalAmount}}</h2>
                            <span>SAR</span>
                            </div>
                            <div class="change">
                            <h4>المتبقي</h4>
                            <?php 
                             $amountTotal = floatval($operating_order->total_amount);
                            $totalPaid = floatval($totalAmount);

                             $remaining
                             = $amountTotal - $totalPaid;
                         ?>
                        
                        <h2 class="remaining_amount">{{ number_format($remaining, 2, ',', '') }}</h2>
                        <span>SAR</span>
                        </div>
                        </div>
                        <button class="pop-up-btn pay"> 
                            <svg class="svg-inline--fa fa-plus" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"></path></svg><!-- <i class="fa-solid fa-plus"></i> Font Awesome fontawesome.com -->
                            <span>إضافة عملية دفع</span>
                        </button>
                        </div>
                    </div>
                    <div class="main-card financial">
                        <h3>الأرباح</h3>
                        <div class="main-card-content">
                        <div>
                            <div class="total">
                            <h4>المبيعات</h4>
                            <h2 class="total_amount" >{{$operating_order->total_amount}}</h2>
                            <span>SAR</span>
                            </div>
                            <div class="change">
                            <h4>المصروفات</h4>
                            <h2 class ="Expenses" id = "expenses">{{$totalPriceAfterTax}}</h2>
                            <span>SAR</span>
                            </div>
                            <div class="paid">
                            <h4>الربح</h4>
                             <?php 
                             $amountTotal = floatval($operating_order->total_amount);
                             $totalExpenses = floatval($totalPriceAfterTax);
                             $profit = 0 ; 
                             if($totalExpenses == 0.00)
                             {
                                 $profit = 0 ; 
                             }else{
                             $profit
                             = $amountTotal - $totalExpenses;
                             }
                         ?>
                        
                            <h2 class ="profit_amount" id  = "profit" > {{$profit}}</h2>
                            <span>SAR</span>                          
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="main-card table-card">
                        <h3>تفاصيل البنود</h3>
                        <div class="main-card-content">
                        <div>
                            <input type="text" id="searchInput" placeholder="Search...">
                            <button class="pop-up-btn">
                            <svg class="svg-inline--fa fa-plus" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"></path></svg><!-- <i class="fa-solid fa-plus"></i> Font Awesome fontawesome.com -->
                            <span>إضافة بند</span>
                            <!-- <span>عبد</span> -->
                            </button>
                        </div>


  
                        <div class="table-container">
                            <table id="data-table-item" class ="data-table" >
                            <thead>
                                <tr>
                                    <th onclick="sortTable(0)">
                                        <div>
                                        <span>
                                            رقم البند
                                        </span>
                                        <svg class="svg-inline--fa fa-sort" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sort" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M137.4 41.4c12.5-12.5 32.8-12.5 45.3 0l128 128c9.2 9.2 11.9 22.9 6.9 34.9s-16.6 19.8-29.6 19.8H32c-12.9 0-24.6-7.8-29.6-19.8s-2.2-25.7 6.9-34.9l128-128zm0 429.3l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9s16.6-19.8 29.6-19.8H288c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128c-12.5 12.5-32.8 12.5-45.3 0z"></path></svg><!-- <i class="fa-solid fa-sort"></i> Font Awesome fontawesome.com -->
                                        </div>
                                    </th>
                                    <th onclick="sortTable(1)">
                                        <div>
                                        <span>
                                            الوصف
                                        </span>
                                        <svg class="svg-inline--fa fa-sort" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sort" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M137.4 41.4c12.5-12.5 32.8-12.5 45.3 0l128 128c9.2 9.2 11.9 22.9 6.9 34.9s-16.6 19.8-29.6 19.8H32c-12.9 0-24.6-7.8-29.6-19.8s-2.2-25.7 6.9-34.9l128-128zm0 429.3l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9s16.6-19.8 29.6-19.8H288c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128c-12.5 12.5-32.8 12.5-45.3 0z"></path></svg><!-- <i class="fa-solid fa-sort"></i> Font Awesome fontawesome.com -->
                                        </div>
                                    </th>
                                    <th onclick="sortTable(2)">
                                        <div>
                                        <span>
                                            الكمية
                                        </span>
                                        <svg class="svg-inline--fa fa-sort" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sort" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M137.4 41.4c12.5-12.5 32.8-12.5 45.3 0l128 128c9.2 9.2 11.9 22.9 6.9 34.9s-16.6 19.8-29.6 19.8H32c-12.9 0-24.6-7.8-29.6-19.8s-2.2-25.7 6.9-34.9l128-128zm0 429.3l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9s16.6-19.8 29.6-19.8H288c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128c-12.5 12.5-32.8 12.5-45.3 0z"></path></svg><!-- <i class="fa-solid fa-sort"></i> Font Awesome fontawesome.com -->
                                        </div>
                                    </th>
                                    <th onclick="sortTable(3)">
                                        <div>
                                        <span>
                                            سعر الحبة
                                        </span>
                                        <svg class="svg-inline--fa fa-sort" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sort" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M137.4 41.4c12.5-12.5 32.8-12.5 45.3 0l128 128c9.2 9.2 11.9 22.9 6.9 34.9s-16.6 19.8-29.6 19.8H32c-12.9 0-24.6-7.8-29.6-19.8s-2.2-25.7 6.9-34.9l128-128zm0 429.3l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9s16.6-19.8 29.6-19.8H288c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128c-12.5 12.5-32.8 12.5-45.3 0z"></path></svg><!-- <i class="fa-solid fa-sort"></i> Font Awesome fontawesome.com -->
                                        </div>
                                    </th>
                                    <th onclick="sortTable(4)">
                                        <div>
                                        <span>
                                            المجموع
                                        </span>
                                        <svg class="svg-inline--fa fa-sort" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sort" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M137.4 41.4c12.5-12.5 32.8-12.5 45.3 0l128 128c9.2 9.2 11.9 22.9 6.9 34.9s-16.6 19.8-29.6 19.8H32c-12.9 0-24.6-7.8-29.6-19.8s-2.2-25.7 6.9-34.9l128-128zm0 429.3l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9s16.6-19.8 29.6-19.8H288c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128c-12.5 12.5-32.8 12.5-45.3 0z"></path></svg><!-- <i class="fa-solid fa-sort"></i> Font Awesome fontawesome.com -->
                                        </div>
                                    </th>
                                    <th onclick="sortTable(5)">
                                        <div>
                                        <span>
                                            الضربية
                                        </span>
                                        <svg class="svg-inline--fa fa-sort" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sort" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M137.4 41.4c12.5-12.5 32.8-12.5 45.3 0l128 128c9.2 9.2 11.9 22.9 6.9 34.9s-16.6 19.8-29.6 19.8H32c-12.9 0-24.6-7.8-29.6-19.8s-2.2-25.7 6.9-34.9l128-128zm0 429.3l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9s16.6-19.8 29.6-19.8H288c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128c-12.5 12.5-32.8 12.5-45.3 0z"></path></svg><!-- <i class="fa-solid fa-sort"></i> Font Awesome fontawesome.com -->
                                        </div>
                                    </th>
                                    <th onclick="sortTable(6)">
                                        <div>
                                        <span>
                                            الإجمالي
                                        </span>
                                        <svg class="svg-inline--fa fa-sort" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sort" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M137.4 41.4c12.5-12.5 32.8-12.5 45.3 0l128 128c9.2 9.2 11.9 22.9 6.9 34.9s-16.6 19.8-29.6 19.8H32c-12.9 0-24.6-7.8-29.6-19.8s-2.2-25.7 6.9-34.9l128-128zm0 429.3l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9s16.6-19.8 29.6-19.8H288c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128c-12.5 12.5-32.8 12.5-45.3 0z"></path></svg><!-- <i class="fa-solid fa-sort"></i> Font Awesome fontawesome.com -->
                                        </div>
                                    </th>
                                    <th onclick="sortTable(8)">
                                        <div>
                                        <span>
                                            الضربية
                                        </span>
                                        <svg class="svg-inline--fa fa-sort" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sort" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M137.4 41.4c12.5-12.5 32.8-12.5 45.3 0l128 128c9.2 9.2 11.9 22.9 6.9 34.9s-16.6 19.8-29.6 19.8H32c-12.9 0-24.6-7.8-29.6-19.8s-2.2-25.7 6.9-34.9l128-128zm0 429.3l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9s16.6-19.8 29.6-19.8H288c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128c-12.5 12.5-32.8 12.5-45.3 0z"></path></svg><!-- <i class="fa-solid fa-sort"></i> Font Awesome fontawesome.com -->
                                        </div>
                                    </th>
                                    <th onclick="sortTable(7)">
                                        <div>
                                        <span>
                                            ملاحظات
                                        </span>
                                        <svg class="svg-inline--fa fa-sort" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sort" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M137.4 41.4c12.5-12.5 32.8-12.5 45.3 0l128 128c9.2 9.2 11.9 22.9 6.9 34.9s-16.6 19.8-29.6 19.8H32c-12.9 0-24.6-7.8-29.6-19.8s-2.2-25.7 6.9-34.9l128-128zm0 429.3l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9s16.6-19.8 29.6-19.8H288c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128c-12.5 12.5-32.8 12.5-45.3 0z"></path></svg><!-- <i class="fa-solid fa-sort"></i> Font Awesome fontawesome.com -->
                                        </div>
                                    </th>
                                    <th onclick="sortTable(7)">
                                        <div>
                                        <span>
                                            الحالة
                                        </span>
                                        <svg class="svg-inline--fa fa-sort" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sort" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M137.4 41.4c12.5-12.5 32.8-12.5 45.3 0l128 128c9.2 9.2 11.9 22.9 6.9 34.9s-16.6 19.8-29.6 19.8H32c-12.9 0-24.6-7.8-29.6-19.8s-2.2-25.7 6.9-34.9l128-128zm0 429.3l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9s16.6-19.8 29.6-19.8H288c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128c-12.5 12.5-32.8 12.5-45.3 0z"></path></svg><!-- <i class="fa-solid fa-sort"></i> Font Awesome fontawesome.com -->
                                        </div>
                                    </th>
                                    <th onclick="sortTable(9)">
                                        <div>
                                        <span>
                                            تعديل 
                                        </span>
                                        <svg class="svg-inline--fa fa-sort" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sort" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M137.4 41.4c12.5-12.5 32.8-12.5 45.3 0l128 128c9.2 9.2 11.9 22.9 6.9 34.9s-16.6 19.8-29.6 19.8H32c-12.9 0-24.6-7.8-29.6-19.8s-2.2-25.7 6.9-34.9l128-128zm0 429.3l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9s16.6-19.8 29.6-19.8H288c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128c-12.5 12.5-32.8 12.5-45.3 0z"></path></svg><!-- <i class="fa-solid fa-sort"></i> Font Awesome fontawesome.com -->
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody> 
                               
                                <tr>
                                
                            
                                </tr>                               
                            
                             </tbody>
                        </table>
                        </div>

                        </div>
                    </div>
                    <div class="main-card table-card">
                        <h3>أوامر الشراء</h3>
                        <div class="main-card-content">
                        <div>
                            <input type="text" id="searchInput" placeholder="Search...">
                            <button class="pop-up-btn">
                            <svg class="svg-inline--fa fa-plus" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"></path></svg><!-- <i class="fa-solid fa-plus"></i> Font Awesome fontawesome.com -->
                            <span>إضافة أمر شراء</span>
                            <!-- <span>عبد</span> -->
                            </button>
                        </div>
                        <div class="table-container">
                            <table id="dataTable-2" class ="data-table-purchase">
                            <thead>
                                <tr>
                                    <th onclick="sortTable(0)">
                                        <div>
                                        <span>
                                            رقم البند
                                        </span>
                                        <svg class="svg-inline--fa fa-sort" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sort" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M137.4 41.4c12.5-12.5 32.8-12.5 45.3 0l128 128c9.2 9.2 11.9 22.9 6.9 34.9s-16.6 19.8-29.6 19.8H32c-12.9 0-24.6-7.8-29.6-19.8s-2.2-25.7 6.9-34.9l128-128zm0 429.3l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9s16.6-19.8 29.6-19.8H288c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128c-12.5 12.5-32.8 12.5-45.3 0z"></path></svg><!-- <i class="fa-solid fa-sort"></i> Font Awesome fontawesome.com -->
                                        </div>
                                    </th>
                                    <th onclick="sortTable(1)">
                                        <div>
                                        <span>
                                            الوصف
                                        </span>
                                        <svg class="svg-inline--fa fa-sort" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sort" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M137.4 41.4c12.5-12.5 32.8-12.5 45.3 0l128 128c9.2 9.2 11.9 22.9 6.9 34.9s-16.6 19.8-29.6 19.8H32c-12.9 0-24.6-7.8-29.6-19.8s-2.2-25.7 6.9-34.9l128-128zm0 429.3l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9s16.6-19.8 29.6-19.8H288c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128c-12.5 12.5-32.8 12.5-45.3 0z"></path></svg><!-- <i class="fa-solid fa-sort"></i> Font Awesome fontawesome.com -->
                                        </div>
                                    </th>
                                    <th onclick="sortTable(2)">
                                        <div>
                                        <span>
                                            الكمية
                                        </span>
                                        <svg class="svg-inline--fa fa-sort" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sort" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M137.4 41.4c12.5-12.5 32.8-12.5 45.3 0l128 128c9.2 9.2 11.9 22.9 6.9 34.9s-16.6 19.8-29.6 19.8H32c-12.9 0-24.6-7.8-29.6-19.8s-2.2-25.7 6.9-34.9l128-128zm0 429.3l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9s16.6-19.8 29.6-19.8H288c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128c-12.5 12.5-32.8 12.5-45.3 0z"></path></svg><!-- <i class="fa-solid fa-sort"></i> Font Awesome fontawesome.com -->
                                        </div>
                                    </th>
                                    <th onclick="sortTable(3)">
                                        <div>
                                        <span>
                                            سعر الحبة
                                        </span>
                                        <svg class="svg-inline--fa fa-sort" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sort" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M137.4 41.4c12.5-12.5 32.8-12.5 45.3 0l128 128c9.2 9.2 11.9 22.9 6.9 34.9s-16.6 19.8-29.6 19.8H32c-12.9 0-24.6-7.8-29.6-19.8s-2.2-25.7 6.9-34.9l128-128zm0 429.3l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9s16.6-19.8 29.6-19.8H288c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128c-12.5 12.5-32.8 12.5-45.3 0z"></path></svg><!-- <i class="fa-solid fa-sort"></i> Font Awesome fontawesome.com -->
                                        </div>
                                    </th>
                                    <th onclick="sortTable(4)">
                                        <div>
                                        <span>
                                            المجموع
                                        </span>
                                        <svg class="svg-inline--fa fa-sort" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sort" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M137.4 41.4c12.5-12.5 32.8-12.5 45.3 0l128 128c9.2 9.2 11.9 22.9 6.9 34.9s-16.6 19.8-29.6 19.8H32c-12.9 0-24.6-7.8-29.6-19.8s-2.2-25.7 6.9-34.9l128-128zm0 429.3l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9s16.6-19.8 29.6-19.8H288c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128c-12.5 12.5-32.8 12.5-45.3 0z"></path></svg><!-- <i class="fa-solid fa-sort"></i> Font Awesome fontawesome.com -->
                                        </div>
                                    </th>
                                    <th onclick="sortTable(5)">
                                        <div>
                                        <span>
                                            الضربية
                                        </span>
                                        <svg class="svg-inline--fa fa-sort" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sort" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M137.4 41.4c12.5-12.5 32.8-12.5 45.3 0l128 128c9.2 9.2 11.9 22.9 6.9 34.9s-16.6 19.8-29.6 19.8H32c-12.9 0-24.6-7.8-29.6-19.8s-2.2-25.7 6.9-34.9l128-128zm0 429.3l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9s16.6-19.8 29.6-19.8H288c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128c-12.5 12.5-32.8 12.5-45.3 0z"></path></svg><!-- <i class="fa-solid fa-sort"></i> Font Awesome fontawesome.com -->
                                        </div>
                                    </th>
                                    <th onclick="sortTable(6)">
                                        <div>
                                        <span>
                                            الإجمالي
                                        </span>
                                        <svg class="svg-inline--fa fa-sort" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sort" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M137.4 41.4c12.5-12.5 32.8-12.5 45.3 0l128 128c9.2 9.2 11.9 22.9 6.9 34.9s-16.6 19.8-29.6 19.8H32c-12.9 0-24.6-7.8-29.6-19.8s-2.2-25.7 6.9-34.9l128-128zm0 429.3l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9s16.6-19.8 29.6-19.8H288c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128c-12.5 12.5-32.8 12.5-45.3 0z"></path></svg><!-- <i class="fa-solid fa-sort"></i> Font Awesome fontawesome.com -->
                                        </div>
                                    </th>
                                    <th onclick="sortTable(8)">
                                        <div>
                                        <span>
                                            الضربية
                                        </span>
                                        <svg class="svg-inline--fa fa-sort" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sort" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M137.4 41.4c12.5-12.5 32.8-12.5 45.3 0l128 128c9.2 9.2 11.9 22.9 6.9 34.9s-16.6 19.8-29.6 19.8H32c-12.9 0-24.6-7.8-29.6-19.8s-2.2-25.7 6.9-34.9l128-128zm0 429.3l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9s16.6-19.8 29.6-19.8H288c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128c-12.5 12.5-32.8 12.5-45.3 0z"></path></svg><!-- <i class="fa-solid fa-sort"></i> Font Awesome fontawesome.com -->
                                        </div>
                                    </th>
                                    <th onclick="sortTable(7)">
                                        <div>
                                        <span>
                                            ملاحظات
                                        </span>
                                        <svg class="svg-inline--fa fa-sort" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sort" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M137.4 41.4c12.5-12.5 32.8-12.5 45.3 0l128 128c9.2 9.2 11.9 22.9 6.9 34.9s-16.6 19.8-29.6 19.8H32c-12.9 0-24.6-7.8-29.6-19.8s-2.2-25.7 6.9-34.9l128-128zm0 429.3l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9s16.6-19.8 29.6-19.8H288c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128c-12.5 12.5-32.8 12.5-45.3 0z"></path></svg><!-- <i class="fa-solid fa-sort"></i> Font Awesome fontawesome.com -->
                                        </div>
                                    </th>
                                    <th onclick="sortTable(9)">
                                        <div>
                                        <span>
                                            تعديل 
                                        </span>
                                        <svg class="svg-inline--fa fa-sort" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sort" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M137.4 41.4c12.5-12.5 32.8-12.5 45.3 0l128 128c9.2 9.2 11.9 22.9 6.9 34.9s-16.6 19.8-29.6 19.8H32c-12.9 0-24.6-7.8-29.6-19.8s-2.2-25.7 6.9-34.9l128-128zm0 429.3l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9s16.6-19.8 29.6-19.8H288c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128c-12.5 12.5-32.8 12.5-45.3 0z"></path></svg><!-- <i class="fa-solid fa-sort"></i> Font Awesome fontawesome.com -->
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>   
                        </table>
                        </div>

                        </div>
                    </div>
                    <div class="main-card table-card">
                        <h3>عمليات الدفع</h3>
                        <div class="main-card-content">
                            <div>
                            <input type="text" id="searchInput" placeholder="Search...">
                            <button class="pop-up-btn pay">
                                <svg class="svg-inline--fa fa-plus" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"></path></svg><!-- <i class="fa-solid fa-plus"></i> Font Awesome fontawesome.com -->
                                <span>إضافة عملية دفع</span>
                                <!-- <span>عبد</span> -->
                            </button>
                            </div>
                        <div class="table-container">
                            <table id="dataTable-3" class="data-table-payment">
                            <thead>
                                <tr>
                                    <th onclick="sortTable(0)">
                                        <div>
                                        <span>
                                            No
                                        </span>
                                        <svg class="svg-inline--fa fa-sort" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sort" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M137.4 41.4c12.5-12.5 32.8-12.5 45.3 0l128 128c9.2 9.2 11.9 22.9 6.9 34.9s-16.6 19.8-29.6 19.8H32c-12.9 0-24.6-7.8-29.6-19.8s-2.2-25.7 6.9-34.9l128-128zm0 429.3l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9s16.6-19.8 29.6-19.8H288c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128c-12.5 12.5-32.8 12.5-45.3 0z"></path></svg><!-- <i class="fa-solid fa-sort"></i> Font Awesome fontawesome.com -->
                                        </div>
                                    </th>
                                    <th onclick="sortTable(1)">
                                        <div>
                                        <span>
                                            ID
                                        </span>
                                        <svg class="svg-inline--fa fa-sort" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sort" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M137.4 41.4c12.5-12.5 32.8-12.5 45.3 0l128 128c9.2 9.2 11.9 22.9 6.9 34.9s-16.6 19.8-29.6 19.8H32c-12.9 0-24.6-7.8-29.6-19.8s-2.2-25.7 6.9-34.9l128-128zm0 429.3l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9s16.6-19.8 29.6-19.8H288c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128c-12.5 12.5-32.8 12.5-45.3 0z"></path></svg><!-- <i class="fa-solid fa-sort"></i> Font Awesome fontawesome.com -->
                                        </div>
                                    </th>
                                    <th onclick="sortTable(2)">
                                        <div>
                                        <span>
                                            طريقة الدفع
                                        </span>
                                        <svg class="svg-inline--fa fa-sort" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sort" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M137.4 41.4c12.5-12.5 32.8-12.5 45.3 0l128 128c9.2 9.2 11.9 22.9 6.9 34.9s-16.6 19.8-29.6 19.8H32c-12.9 0-24.6-7.8-29.6-19.8s-2.2-25.7 6.9-34.9l128-128zm0 429.3l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9s16.6-19.8 29.6-19.8H288c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128c-12.5 12.5-32.8 12.5-45.3 0z"></path></svg><!-- <i class="fa-solid fa-sort"></i> Font Awesome fontawesome.com -->
                                        </div>
                                    </th>
                                    <th onclick="sortTable(3)">
                                        <div>
                                        <span>
                                            المبلغ
                                        </span>
                                        <svg class="svg-inline--fa fa-sort" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sort" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M137.4 41.4c12.5-12.5 32.8-12.5 45.3 0l128 128c9.2 9.2 11.9 22.9 6.9 34.9s-16.6 19.8-29.6 19.8H32c-12.9 0-24.6-7.8-29.6-19.8s-2.2-25.7 6.9-34.9l128-128zm0 429.3l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9s16.6-19.8 29.6-19.8H288c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128c-12.5 12.5-32.8 12.5-45.3 0z"></path></svg><!-- <i class="fa-solid fa-sort"></i> Font Awesome fontawesome.com -->
                                        </div>
                                    </th>
                                    <th onclick="sortTable(4)">
                                        <div>
                                        <span>
                                            تاريخ الدفع
                                        </span>
                                        <svg class="svg-inline--fa fa-sort" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sort" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M137.4 41.4c12.5-12.5 32.8-12.5 45.3 0l128 128c9.2 9.2 11.9 22.9 6.9 34.9s-16.6 19.8-29.6 19.8H32c-12.9 0-24.6-7.8-29.6-19.8s-2.2-25.7 6.9-34.9l128-128zm0 429.3l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9s16.6-19.8 29.6-19.8H288c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128c-12.5 12.5-32.8 12.5-45.3 0z"></path></svg><!-- <i class="fa-solid fa-sort"></i> Font Awesome fontawesome.com -->
                                        </div>
                                    </th>
                                    <th onclick="sortTable(5)">
                                        <div>
                                        <span>
                                            الشخص المحصل
                                        </span>
                                        <svg class="svg-inline--fa fa-sort" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sort" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M137.4 41.4c12.5-12.5 32.8-12.5 45.3 0l128 128c9.2 9.2 11.9 22.9 6.9 34.9s-16.6 19.8-29.6 19.8H32c-12.9 0-24.6-7.8-29.6-19.8s-2.2-25.7 6.9-34.9l128-128zm0 429.3l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9s16.6-19.8 29.6-19.8H288c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128c-12.5 12.5-32.8 12.5-45.3 0z"></path></svg><!-- <i class="fa-solid fa-sort"></i> Font Awesome fontawesome.com -->
                                        </div>
                                    </th>
                                    <th onclick="sortTable(6)">
                                        <div>
                                        <span>
                                            ملاحظات
                                        </span>
                                        <svg class="svg-inline--fa fa-sort" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sort" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M137.4 41.4c12.5-12.5 32.8-12.5 45.3 0l128 128c9.2 9.2 11.9 22.9 6.9 34.9s-16.6 19.8-29.6 19.8H32c-12.9 0-24.6-7.8-29.6-19.8s-2.2-25.7 6.9-34.9l128-128zm0 429.3l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9s16.6-19.8 29.6-19.8H288c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128c-12.5 12.5-32.8 12.5-45.3 0z"></path></svg><!-- <i class="fa-solid fa-sort"></i> Font Awesome fontawesome.com -->
                                        </div>
                                    </th>
                                    <th onclick="sortTable(7)">
                                        <div>
                                        <span>
                                            التاريخ والوقت
                                        </span>
                                        <svg class="svg-inline--fa fa-sort" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sort" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M137.4 41.4c12.5-12.5 32.8-12.5 45.3 0l128 128c9.2 9.2 11.9 22.9 6.9 34.9s-16.6 19.8-29.6 19.8H32c-12.9 0-24.6-7.8-29.6-19.8s-2.2-25.7 6.9-34.9l128-128zm0 429.3l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9s16.6-19.8 29.6-19.8H288c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128c-12.5 12.5-32.8 12.5-45.3 0z"></path></svg><!-- <i class="fa-solid fa-sort"></i> Font Awesome fontawesome.com -->
                                        </div>
                                    </th>
                                    <th onclick="sortTable(8)">
                                        <div>
                                        <span>
                                            تعديل 
                                        </span>
                                        <svg class="svg-inline--fa fa-sort" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sort" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M137.4 41.4c12.5-12.5 32.8-12.5 45.3 0l128 128c9.2 9.2 11.9 22.9 6.9 34.9s-16.6 19.8-29.6 19.8H32c-12.9 0-24.6-7.8-29.6-19.8s-2.2-25.7 6.9-34.9l128-128zm0 429.3l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9s16.6-19.8 29.6-19.8H288c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128c-12.5 12.5-32.8 12.5-45.3 0z"></path></svg><!-- <i class="fa-solid fa-sort"></i> Font Awesome fontawesome.com -->
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        </div>

                        </div>
                    </div>
                    <div class="main-card assets-card">
                        <h3>المرفقات</h3>
                        <div class="main-card-content">
                        <table id="data-table-attachment-images" style="width: 250px;"   >
                            <thead>
                                <tr>
                                    <th style="display: none;">image</th>
  
                                    
                                </tr>
                            </thead>
                            
                            <tbody>  



                                                
                             </tbody>
                        </table>

                        
                        </div>
                    </div>
                    <div class="main-card assets-parts">
                        <h3>مرفقات أخرى</h3>
                        <div class="main-card-content">
                        <div class="assets-part">
                            <h4>ملف التصميم</h4>
                            <div class="assets-part-imgs">
                               @if(!empty($operating_order->attachments)) 
                                @foreach($operating_order->attachments  as $attachment)
                                    @if($attachment->file_type == "design")
                                        <div class="asset-wrapper">
                                            <img  style  = "
                                             margin: 10px;
                                             width: 60px;    
                                             height: 60px;      
                                             border-radius: 10px;   
                                             object-fit: cover;" src="{{asset                                    ('storage/'.$attachment->file_path)}}" alt="">
                                            <span>صورة ملف التصميم</span>
                                        </div>
                                    @endif   
                                @endforeach     
                               @endif 
                         
                            </div>
                        </div>
                        <div class="assets-part">
                            <h4>الفاتورة</h4>
                            <div class="assets-part-imgs">
                            @if(!empty($operating_order->invoice)) 
                             @foreach($operating_order->invoice as $invoice)
                                         <div class="asset-wrapper">
                                            <img src="{{asset('storage/'.$invoice->file_path)}}"  style  = "                                         margin: 10px;
                                             width: 60px;    
                                             height: 60px;      
                                             border-radius: 10px;   
                                             object-fit: cover;"  alt="">
                                            <span>   صورة الفاتورة   </span>
                                        </div>
                              @endforeach        
                             @endif 
                            </div>
                        </div>
                        <div class="assets-part">
                            <h4>إشعار التسليم</h4>
                            <div class="assets-part-imgs">
                            @if(!empty($operating_order->attachments)) 
                                @foreach($operating_order->attachments  as $attachment)
                                    @if($attachment->file_type == "delivery_notice")
                                        <div class="asset-wrapper">
                                            <img src="{{asset('storage/'.$attachment->file_path)}}"  style  = "
                                             margin: 10px;
                                             width: 60px;    
                                             height: 60px;      
                                             border-radius: 10px;   
                                             object-fit: cover;"  alt="">
                                            <span>إشعار التسليم  </span>
                                        </div>
                                    @endif   
                                @endforeach     
                               @endif 
                            </div>
                        </div>
                        <div class="assets-part">
                            <h4>مرفقات أخرى</h4>
                            <div class="assets-part-imgs">
                            @if(!empty($operating_order->attachments)) 
                                @foreach($operating_order->attachments  as $attachment)
                                    @if($attachment->file_type == "other_attachment")
                                        <div class="asset-wrapper">
                                            <img src="{{asset('storage/'.$attachment->file_path)}}" style  = "
                                             margin: 10px;
                                             width: 60px;    
                                             height: 60px;      
                                             border-radius: 10px;   
                                             object-fit: cover;"  alt="">
                                            <span>   اخرى مرفقات   </span>
                                        </div>
                                    @endif   
                                @endforeach     
                               @endif 
                            </div>
                        </div>
                        <div class="assets-part">
                            <h4>التعميد</h4>
                            <div class="assets-part-imgs">
                            @if(!empty($operating_order->attachments)) 
                                @foreach($operating_order->attachments  as $attachment)
                                    @if($attachment->file_type == "baptizing")
                                        <div class="asset-wrapper">
                                            <img src="{{asset('storage/'.$attachment->file_path)}}" style  = " 
                                             margin: 10px;
                                             width: 60px;    
                                             height: 60px;      
                                             border-radius: 10px;   
                                             object-fit: cover;"  alt="">
                                            <span>      التعميد   </span>
                                        </div>
                                    @endif   
                                @endforeach     
                               @endif 
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
 @endif               
                <footer>
                    <p>
                    <a href="https://triple-clean-dashboard.vercel.app/?fbclid=IwAR35ZXyEGjkmrfZzPc-yCqKFFgV14ds5hzzuK82eQf3rTiC97nLtseriTjE_aem_AWpCIUFgfaPqlI7UNhcX3yS8Zk4HRFlI5hujMbTyJAI7o4URlTifbfrkwqZc_3J7vuwjBqKqeIUTIpzshcn2zbmC#">شركة مرسى الدولية</a>
                    Copyright © 2024 
                    </p>
                </footer>
            </main>
                <div class="pop-ups   removed">
                    <div class="pop-up-oveylay"></div>
                    <div class="pop-up" style="display: none;">
                    <h3 class="pop-up-header">
                        <span>
                        إضافة مرفقات
                        </span>
                        <div class="close-pop-up" id="closePopUp" >
                        <svg class="svg-inline--fa fa-xmark" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"></path></svg><!-- <i class="fa-solid fa-xmark"></i> Font Awesome fontawesome.com -->
                        </div>
                    </h3>
                    <div class="animated-wrapper">
                        <div class="assets-types-wrapper">
                        <div class="asset-type">
                            <svg class="svg-inline--fa fa-file" aria-hidden="true"
                             focusable="false"
                              data-prefix="fas"
                               data-icon="file"
                                role="img"
                                 xmlns="http://www.w3.org/2000/svg"
                                  viewBox="0 0 384 512" 
                                  data-fa-i2svg="">
                                  <path 
                                  fill="currentColor"
                                   d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128z"></path></svg><!-- <i class="fa-solid fa-file"></i> Font Awesome fontawesome.com -->
                            <h4>ملف التصميم</h4>
                        </div>
                        <div class="asset-type">
                            <svg class="svg-inline--fa fa-file-invoice" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="file-invoice" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM80 64h64c8.8 0 16 7.2 16 16s-7.2 16-16 16H80c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64h64c8.8 0 16 7.2 16 16s-7.2 16-16 16H80c-8.8 0-16-7.2-16-16s7.2-16 16-16zm16 96H288c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V256c0-17.7 14.3-32 32-32zm0 32v64H288V256H96zM240 416h64c8.8 0 16 7.2 16 16s-7.2 16-16 16H240c-8.8 0-16-7.2-16-16s7.2-16 16-16z"></path></svg><!-- <i class="fa-solid fa-file-invoice"></i> Font Awesome fontawesome.com -->
                            <h4>الفاتورة</h4>
                        </div>
                        <div class="asset-type">
                            <svg class="svg-inline--fa fa-file-import" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="file-import" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M128 64c0-35.3 28.7-64 64-64H352V128c0 17.7 14.3 32 32 32H512V448c0 35.3-28.7 64-64 64H192c-35.3 0-64-28.7-64-64V336H302.1l-39 39c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l80-80c9.4-9.4 9.4-24.6 0-33.9l-80-80c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l39 39H128V64zm0 224v48H24c-13.3 0-24-10.7-24-24s10.7-24 24-24H128zM512 128H384V0L512 128z"></path></svg><!-- <i class="fa-solid fa-file-import"></i> Font Awesome fontawesome.com -->
                            <h4>إشعار التسليم</h4>
                        </div>
                        <div class="asset-type">
                            <svg class="svg-inline--fa fa-file-contract" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="file-contract" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM80 64h64c8.8 0 16 7.2 16 16s-7.2 16-16 16H80c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64h64c8.8 0 16 7.2 16 16s-7.2 16-16 16H80c-8.8 0-16-7.2-16-16s7.2-16 16-16zm54.2 253.8c-6.1 20.3-24.8 34.2-46 34.2H80c-8.8 0-16-7.2-16-16s7.2-16 16-16h8.2c7.1 0 13.3-4.6 15.3-11.4l14.9-49.5c3.4-11.3 13.8-19.1 25.6-19.1s22.2 7.7 25.6 19.1l11.6 38.6c7.4-6.2 16.8-9.7 26.8-9.7c15.9 0 30.4 9 37.5 23.2l4.4 8.8H304c8.8 0 16 7.2 16 16s-7.2 16-16 16H240c-6.1 0-11.6-3.4-14.3-8.8l-8.8-17.7c-1.7-3.4-5.1-5.5-8.8-5.5s-7.2 2.1-8.8 5.5l-8.8 17.7c-2.9 5.9-9.2 9.4-15.7 8.8s-12.1-5.1-13.9-11.3L144 349l-9.8 32.8z"></path></svg><!-- <i class="fa-solid fa-file-contract"></i> Font Awesome fontawesome.com -->
                            <h4>التعميد</h4>
                        </div>
                        <div class="asset-type">
                            <svg class="svg-inline--fa fa-file-circle-plus" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="file-circle-plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384v38.6C310.1 219.5 256 287.4 256 368c0 59.1 29.1 111.3 73.7 143.3c-3.2 .5-6.4 .7-9.7 .7H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128zm48 96a144 144 0 1 1 0 288 144 144 0 1 1 0-288zm16 80c0-8.8-7.2-16-16-16s-16 7.2-16 16v48H368c-8.8 0-16 7.2-16 16s7.2 16 16 16h48v48c0 8.8 7.2 16 16 16s16-7.2 16-16V384h48c8.8 0 16-7.2 16-16s-7.2-16-16-16H448V304z"></path></svg><!-- <i class="fa-solid fa-file-circle-plus"></i> Font Awesome fontawesome.com -->
                            <h4>مرفقات أخرى</h4>
                        </div>
                        </div>
                        <div class="drop-area" > 
                        <form  class="attachment_form" class="dropzone overflow-visible p-0"     enctype="multipart/form-data">
                            @csrf
                            
                            <input type="hidden" id = "file_type" name="file_type" value="">
                            <input type="hidden" id = "operating_order_id" name="operating_order_id" value="{{$operating_order->id}}">

                            <span class="back-icon">
                            <svg class="svg-inline--fa fa-arrow-left" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"></path></svg><!-- <i class="fa-solid fa-arrow-left"></i> Font Awesome fontawesome.com -->
                            </span>
                         

                                <div class="form-group mb-4"   for="add-asset-btn">
                                         <div class="dropzone-drag-area form-control"  style = "width: 200px" id="previews">
                                                <div class="dz-message text-muted opacity-50" data-dz-message>
                                                    <span>Drag file here to upload</span>
                                                </div>    
                                                <div class="d-none" id="dzPreviewContainer">
                                                    <div class="dz-preview dz-file-preview">
                                                        <div class="dz-photo">
                                                            <img class="dz-thumbnail" id ="add-asset-btn" data-dz-thumbnail>
                                                        </div>
                                                        <button class="dz-delete border-0 p-0" type="button" data-dz-remove>
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="times"><path fill="#FFFFFF" d="M13.41,12l4.3-4.29a1,1,0,1,0-1.42-1.42L12,10.59,7.71,6.29A1,1,0,0,0,6.29,7.71L10.59,12l-4.3,4.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L12,13.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42Z"></path></svg>
                                                        </button>
                                                    </div>
                                                </div>
                                        </div>
                                    <div class="invalid-feedback fw-bold">Please upload an image.</div>
                                </div>
                                <div class = "form-group mb-4">
                                    <label for="file-name">اسم المرفق</label>
                                    <input type="text" id="file-name" name ="file_name" placeholder="اسم المرفق">
                                </div>
                            <div class="pop-up-form-btns">
                            <button type="submit"  class="btn btn-primary"> حفظ
                                                                     </button>
                            <input type="reset" value="إلغاء">
                            </div>
                        </form>
                        <div class="gallery"></div>
                        </div>
                    </div>
                    </div>
                    <div class="pop-up" style="display: none;">
                    <h3 class="pop-up-header">
                        <span>
                        إضافة تحديث
                        </span>
                        <div class="close-pop-up">
                        <svg class="svg-inline--fa fa-xmark" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"></path></svg><!-- <i class="fa-solid fa-xmark"></i> Font Awesome fontawesome.com -->
                        </div>
                    </h3>
                    <form id= "update_form"  enctype="multipart/form-data">
                    @csrf
                      <input type="hidden" id = "operating_order_id" name="operating_order_id" value="{{$operating_order->id}}">
                     <div class="form-group mb-4"   for="add-asset-btn">
                                         <div class="dropzone-drag-area form-control"  style = "width: 200px" id="previews_update">
                                                <div class="dz-message text-muted opacity-50" data-dz-message>
                                                    <span>Drag file here to upload</span>
                                                </div>    
                                                <div class="d-none" id="dzPreviewContainerUpdate">
                                                    <div class="dz-preview dz-file-preview">
                                                        <div class="dz-photo">
                                                            <img class="dz-thumbnail" id ="add-asset-btn" data-dz-thumbnail>
                                                        </div>
                                                        <button class="dz-delete border-0 p-0" type="button" data-dz-remove>
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="times"><path fill="#FFFFFF" d="M13.41,12l4.3-4.29a1,1,0,1,0-1.42-1.42L12,10.59,7.71,6.29A1,1,0,0,0,6.29,7.71L10.59,12l-4.3,4.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L12,13.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42Z"></path></svg>
                                                        </button>
                                                    </div>
                                                </div>
                                        </div>
                                    <div class="invalid-feedback fw-bold">Please upload an image.</div>
                                </div>




                        <div>
                        <label for="asset-name">تفاصيل التحديث</label>
                        <textarea id="asset-name" name="description_ar" placeholder="تفاصيل التحديث"></textarea>
                        </div>
                        <div class="pop-up-form-btns">
                            <button type="submit"  class="btn btn-primary"> حفظ
                                                                     </button>
                            <input type="reset" value="إلغاء">
                       </div>
                    </form>
                    </div>
                    <div class="pop-up" style="display: block;">
                    <h3 class="pop-up-header">
                        <span>
                        إضافة فاتورة
                        </span>
                        <div class="close-pop-up">
                        <svg class="svg-inline--fa fa-xmark" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"></path></svg><!-- <i class="fa-solid fa-xmark"></i> Font Awesome fontawesome.com -->
                        </div>
                    </h3>
                    <form  id="invoice_form"    enctype="multipart/form-data">
                        
                            @csrf
                          <div>
                          <input type="hidden" id = "operating_order_id" name="operating_order_id" value="{{$operating_order->id}}">
                          <div class="form-group mb-4"   for="add-asset-btn">
                                         <div class="dropzone-drag-area form-control"  style = "width: 200px" id="previews_invoice">
                                                <div class="dz-message text-muted opacity-50" data-dz-message>
                                                    <span>Drag file here to upload</span>
                                                </div>    
                                                <div class="d-none" id="dzPreviewContainerInvoice">
                                                    <div class="dz-preview dz-file-preview">
                                                        <div class="dz-photo">
                                                            <img class="dz-thumbnail" id ="add-asset-btn" data-dz-thumbnail>
                                                        </div>
                                                        <button class="dz-delete border-0 p-0" type="button" data-dz-remove>
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="times"><path fill="#FFFFFF" d="M13.41,12l4.3-4.29a1,1,0,1,0-1.42-1.42L12,10.59,7.71,6.29A1,1,0,0,0,6.29,7.71L10.59,12l-4.3,4.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L12,13.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42Z"></path></svg>
                                                        </button>
                                                    </div>
                                                </div>
                                        </div>
                                    <div class="invalid-feedback fw-bold">Please upload an image.</div>
                                </div>

                        </div>
              
                        <div>
                        <label for="bill-number">رقم الفاتورة</label>
                        <input type="number" id="bill-number"  name ="number_invoice" placeholder="رقم الفاتورة">
                        </div>
                        <div>
                        <label for="bill-money">مبلغ الفاتورة</label>
                        <input type="number" id="bill-money" name ="amount_Invoice" placeholder="مبلغ الفاتورة">
                        </div>
                        <div class="pop-up-form-btns">
                        <button type="submit"  class="btn btn-primary"> حفظ </button>
                        <input type="reset" value="إلغاء">
                        </div>
                    </form>
                    </div>

            
                    <div class="pop-up" style="display: none;">
                    <h3 class="pop-up-header">
                        <span>
                        إغلاق الطلب
                        </span>
                        <div class="close-pop-up">
                        <svg class="svg-inline--fa fa-xmark" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"></path></svg><!-- <i class="fa-solid fa-xmark"></i> Font Awesome fontawesome.com -->
                        </div>
                    </h3>
                    <p>هل تريد إغلاق الطلب؟</p>
                    <div class="pop-up-btns">
                        <button type = "button" id ="close_order" name = "close_order" >yes</button>
                        <input type="reset" value="إلغاء">
                    </div>
                    </div>
                    <div class="pop-up" style="display: none;">
                    <h3 class="pop-up-header">
                        <span>
                        طباعة الباركود
                        </span>
                        <div class="close-pop-up">
                        <svg class="svg-inline--fa fa-xmark" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"></path></svg><!-- <i class="fa-solid fa-xmark"></i> Font Awesome fontawesome.com -->
                        </div>
                    </h3>
                    <div>
                        طباعة الباركود
                    </div>
                    </div>
                    <div class="pop-up submit" style="display: none;">
                    <h3 class="pop-up-header">
                        <span>
                        تسليم البضاعة
                        </span>
                        <div class="close-pop-up">
                        <svg class="svg-inline--fa fa-xmark" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"></path></svg><!-- <i class="fa-solid fa-xmark"></i> Font Awesome fontawesome.com -->
                        </div>
                    </h3>
                    <form   id="delivery_form" > 
                        @csrf

                        <div class="table-wrapper">
                        <table>
                            <thead>
                            <tr><th>البند</th>
                            <th>الوصف</th>
                            <th>الكمية</th>
                            <th>الكمية المسلمة</th>
                            <th>الكمية المتبقية</th>
                            </tr></thead>
                            <tbody>
                             @if(!empty($item_order))   
                              <?php   $delivery= 0  ;   $remaining_total = 0 ;   $total_quantity  = 0 ?> 
                             @foreach($item_order as   $index =>  $order)
                                @if($order->operating_order_id == 1) 
                                    <?php $delivery  += $order->delivered_quantity ;   $total_quantity += $order->total_quantity ?> 
                                        <tr>
                                        <td>  {{$order->item->name_ar }}  </td>
                                        <td>  {{$order->description_ar}}</td>
                                        <td>
                                            {{ $order->total_quantity}}
                                        </td>
                                        <td>
                                        <input type="number" name="items[{{ $index }}][delivered_quantity]" value="{{ $order->delivered_quantity }}">
                                        <input type="hidden" name="items[{{ $index }}][total_quantity]" value=" {{ $order->total_quantity}}">

                                        <input type="hidden" name="items[{{ $index }}][id]" value="{{ $order->id }}">
                                    </td>
                                        <td>
                                            <?php  $remaining_ = $order->total_quantity - $order->delivered_quantity  ?>
                                            {{$remaining_}}
                                            <?php  $remaining_total += $remaining_ ;   ?>
                                        </td>
                                        </tr>
                                @endif        
                            @endforeach    
                           @endif 
 
                             <tr class="table-footer">
                            <td colspan="2">الإجمالي</td>
                            <td>{{$total_quantity}}</td>
                            <td>{{$delivery}}</td>
                            <td>{{$remaining_total}}</td>
                            </tr>
                        </tbody></table>
                        </div>
                      
                        <div class="pop-up-btns">
                        <button type="submit"  class="btn btn-primary"> حفظ </button>
                        <input type="reset" value="إلغاء">
                        </div>
                    </form>
                    </div>
                    <div class="pop-up" style="display: none;">
                    <h3 class="pop-up-header">
                        <span>
                        طباعة الباركود
                        </span>
                        <div class="close-pop-up">
                        <svg class="svg-inline--fa fa-xmark" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"></path></svg><!-- <i class="fa-solid fa-xmark"></i> Font Awesome fontawesome.com -->
                        </div>
                    </h3>
                    <div>
                        طباعة الباركود
                    </div>
                    </div>
                    <div class="pop-up" style="display: none;">
                    <h3 class="pop-up-header">
                        <span>
                        طباعة الباركود
                        </span>
                        <div class="close-pop-up">
                        <svg class="svg-inline--fa fa-xmark" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"></path></svg><!-- <i class="fa-solid fa-xmark"></i> Font Awesome fontawesome.com -->
                        </div>
                    </h3>
                    <div>
                        طباعة الباركود
                    </div>
                    </div>
                    <div class="pop-up send" style="display: none;">
                    <h3 class="">
                        <span>
                        تعميد الطلب
                        </span>
                        <div class="close-pop-up">
                        <svg class="svg-inline--fa fa-xmark" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"></path></svg><!-- <i class="fa-solid fa-xmark"></i> Font Awesome fontawesome.com -->
                        </div>
                    </h3>
                    <div class="drop-area">
                        <form  id ="baptizing_form" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id = "operating_order_id" name="operating_order_id" value="{{$operating_order->id}}">
                            <input type="hidden" id = "file_type" name="file_type" value="baptizing">

                               <div class="form-group mb-4"   for="add-asset-btn"> 
                                         <div class="dropzone-drag-area form-control"  style = "width: 200px ; "  id="previews_baptizing">
                                                <div class="dz-message text-muted opacity-50"   data-dz-message>
                                                    <span style ="margin-top :60px ">Drag file here to upload</span>
                                                </div>    
                                                <div class="d-none" id="dzPreviewContainerBaptiziing">
                                                    <div class="dz-preview dz-file-preview">
                                                        <div class="dz-photo">
                                                            <img class="dz-thumbnail" id ="add-asset-btn" data-dz-thumbnail>
                                                        </div>
                                                        <button class="dz-delete border-0 p-0" type="button" data-dz-remove>
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="times"><path fill="#FFFFFF" d="M13.41,12l4.3-4.29a1,1,0,1,0-1.42-1.42L12,10.59,7.71,6.29A1,1,0,0,0,6.29,7.71L10.59,12l-4.3,4.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L12,13.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42Z"></path></svg>
                                                        </button>
                                                    </div>
                                                </div>
                                        </div>
                                    <div class="invalid-feedback fw-bold">Please upload an image.</div>
                                </div>

                         <div>
                            <label for="asset-name">اسم المرفق</label>
                            <input type="text" id="asset-name"  name = "file_name"  placeholder="اسم المرفق">
                        </div>
                        <div class="pop-up-form-btns">
                        <button type="submit"  class="btn btn-primary"> حفظ
                        </button>                            <input type="reset" value="إلغاء">
                        </div>
                        <div class="admission">
                        <h4>
                            إقرار
                        </h4>
                        <textarea name="admission" id="">أقر أنا عبد العزيز أني باعتماد التصميم أعلاه</textarea>
                        </div>
                        </form>
                        <div class="gallery"></div>
                    </div>
                    </div>
                    <div class="pop-up add-pay" style="display: none;">
                    <h3 class="pop-up-header">
                        <span>
                        إضافة عملية دفع
                        </span>
                        <div class="close-pop-up">
                        <svg class="svg-inline--fa fa-xmark" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"></path></svg><!-- <i class="fa-solid fa-xmark"></i> Font Awesome fontawesome.com -->
                        </div>
                    </h3>
                    <div class="payment-summary">
                        <div class="total">
                        <h4  >الإجمالي</h4>
                        <h2 class="total_amount" >{{$operating_order->total_amount}}</h2>
                        <span>SAR</span>
                        </div>
                        <div class="paid">
                        <h4>المدفوع</h4>
                        <h2 class="total_amount_paid">{{$totalAmount}}</h2>
                        <span>SAR</span>
                        </div>
                        <div class="change">
                        <h4>المتبقي</h4>
                        <?php 
                             $amountTotal = floatval($operating_order->total_amount);
                            $totalPaid = floatval($totalAmount);

                             $remaining
                             = $amountTotal - $totalPaid;
                         ?>
                        <h2 class="remaining_amount" >{{$remaining}}</h2>
                        <span>SAR</span>
                        </div>
                    </div>
                    <div class="drop-area">
                        <form  id ="payment_form"   enctype="multipart/form-data"     class="payment">
                         @csrf
                         <input type="hidden" id = "operating_order_id" name="operating_order_id" value="{{$operating_order->id}}">
                         <input type="hidden" id = "remaining" name="remaining" value="{{$remaining}}">

                        <h4>طريقة الدفع</h4>
                        <div class="selector-wrapper">
                            <div>
                                <label for="cash">كاش</label>
                                <input type="radio" name="payment_method" id="cash" value="cash">
                            </div>
                            <div>
                                <label for="network">شبكة</label>
                                <input type="radio" name="payment_method" id="network" value="network">
                            </div>
                            <div>
                                <label for="trans">تحويل</label>
                                <input type="radio" name="payment_method" id="trans" value="trans">
                            </div>
                        </div>

                        <div class="payment-inputs">
                            <div>
                            <label for="amount">المبلغ المدفوع</label>
                            <input type="number" name ="amount"  id="amount" min="0">
                            </div>
                            <div>
                            <label for="collector_id">الشخص المحصل</label>
 
                                <select id="item-select" class="collector_id"   
                                style="width: 100% !important; border: 1px solid black !important; height: 30px !important;"
                                value = "collector_id" 
                                name = "collector_id" >
                                            <option value="">Select an item</option>
                               </select>

                                  
                            </div>
                            <div>
                            <label for="payment-date">التاريخ</label>
                            <input type="date"name ="payment_date" id="payment-date">
                            </div>
                            <div>
                            <label for="notes">ملاحظات</label>
                            <textarea name ="notes"  id="notes"></textarea>
                            </div>
                        </div>
                        <h4>إضافة مرفق</h4>
                        <div class="form-group mb-4"   for="add-asset-btn"> 
                                         <div class="dropzone-drag-area form-control"  style = "width: 200px ; "  id="previews_payment">
                                                <div class="dz-message text-muted opacity-50"   data-dz-message>
                                                    <span >Drag file here to upload</span>
                                                </div>    
                                                <div class="d-none" id="dzPreviewContainerPayment">
                                                    <div class="dz-preview dz-file-preview">
                                                        <div class="dz-photo">
                                                            <img class="dz-thumbnail" id ="add-asset-btn" data-dz-thumbnail>
                                                        </div>
                                                        <button class="dz-delete border-0 p-0" type="button" data-dz-remove>
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="times"><path fill="#FFFFFF" d="M13.41,12l4.3-4.29a1,1,0,1,0-1.42-1.42L12,10.59,7.71,6.29A1,1,0,0,0,6.29,7.71L10.59,12l-4.3,4.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L12,13.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42Z"></path></svg>
                                                        </button>
                                                    </div>
                                                </div>
                                        </div>
                                    <div class="invalid-feedback fw-bold">Please upload an image.</div>
                                </div>
                        <div class="gallery"></div>
                        <div class="pop-up-form-btns">
                        <button type="submit"  class="btn btn-primary"> حفظ
                        </button>
                        <input type="reset" value="إلغاء">
                        </div>
                        </form>
               
                    </div>
                    </div>
                    <div class="pop-up add-item" style="display: none;">
                    <h3 class="pop-up-header">
                        <span>
                        إضافة بند
                        </span>
                        <div class="close-pop-up">
                        <svg class="svg-inline--fa fa-xmark" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"></path></svg><!-- <i class="fa-solid fa-xmark"></i> Font Awesome fontawesome.com -->
                        </div>
                    </h3>
                    <div>
                        <form action="https://triple-clean-dashboard.vercel.app/?fbclid=IwAR35ZXyEGjkmrfZzPc-yCqKFFgV14ds5hzzuK82eQf3rTiC97nLtseriTjE_aem_AWpCIUFgfaPqlI7UNhcX3yS8Zk4HRFlI5hujMbTyJAI7o4URlTifbfrkwqZc_3J7vuwjBqKqeIUTIpzshcn2zbmC">
                        <div>
                            <label for="item-name">اسم البند</label>
                            <input type="text" id="item-name">
                        </div>
                        <div>
                            <label for="item-price">السعر</label>
                            <input type="number" id="item-price">
                        </div>
                        <div>
                            <label for="item-quantity">الكمية</label>
                            <input type="number" id="item-quantity">
                        </div>
                        <div>
                            <label for="item-fee">الضريبة</label>
                            <input type="number" id="item-fee">
                        </div>
                        
                        <div class="pop-up-form-btns">
                            <input type="submit" value="حفظ">
                            <input type="reset" value="إلغاء">
                        </div>
                        </form>
                    </div>
                    </div>
                    <div class="pop-up add-buying-order" style="display: none;">
                    <h3 class="pop-up-header">
                        <span>
                        إضافة أمر شراء
                        </span>
                        <div class="close-pop-up">
                        <svg class="svg-inline--fa fa-xmark" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"></path></svg><!-- <i class="fa-solid fa-xmark"></i> Font Awesome fontawesome.com -->
                        </div>
                    </h3>
                    <div>
                        <form action="https://triple-clean-dashboard.vercel.app/?fbclid=IwAR35ZXyEGjkmrfZzPc-yCqKFFgV14ds5hzzuK82eQf3rTiC97nLtseriTjE_aem_AWpCIUFgfaPqlI7UNhcX3yS8Zk4HRFlI5hujMbTyJAI7o4URlTifbfrkwqZc_3J7vuwjBqKqeIUTIpzshcn2zbmC">
                        <div>
                            <label for="item-name">اسم البند</label>
                            <input type="text" id="item-name">
                        </div>
                        <div>
                            <label for="item-price">السعر</label>
                            <input type="number" id="item-price">
                        </div>
                        <div>
                            <label for="item-quantity">الكمية</label>
                            <input type="number" id="item-quantity">
                        </div>
                        <div>
                            <label for="item-fee">الضريبة</label>
                            <input type="number" id="item-fee">
                        </div>
                        
                        <div class="pop-up-form-btns">
                            <input type="submit" value="حفظ">
                            <input type="reset" value="إلغاء">
                        </div>
                        </form>
                    </div>
                    </div>
                </div>
            <script src="{{asset('assets/Triple Clean_files/all.min.js')}}"></script>
            <script src="{{asset('assets/Triple Clean_files/main.js')}}"></script>
   

            

   
        </body> 
                        <script>

                            
                        </script>

 

@endsection





