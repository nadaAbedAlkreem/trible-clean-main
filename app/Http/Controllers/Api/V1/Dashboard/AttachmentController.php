<?php
namespace App\Http\Controllers\Api\V1\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attachment;
use App\Repositories\IAttachmentRepository;
use App\Http\Requests\StoreAttachmentRequest;
use App\Http\Requests\UpdateAttachmentRequest;
use Yajra\DataTables\DataTables;
use App\Services\AttachmentDatatableService ; 
use App\Traits\ResponseTrait;
use App ; 
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AttachmentController extends Controller
{   
    use ResponseTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     

     
    private $attachmentRepository ;

    public function __construct(IAttachmentRepository $attachmentRepository   ){

        $this->attachmentRepository = $attachmentRepository;
        
    }
    public function index(Request $request  , AttachmentDatatableService $attachmentDatatableService)
    {
 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAttachmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAttachmentRequest $request)
    {    
        try {
            // Proceed with storing data after validation
            $create =  $this->attachmentRepository->create($request->getDataWithImage());
            return $this->successResponse('CREATE_ITEM_SUCCESSFULLY',$create, 201, App::getLocale());
        } catch (\Illuminate\Validation\ValidationException $e) {
      
            return $this->errorResponse('VETIFICATION_ERRORS', ['error' => $e->errors()],422  ,App::getLocale()); // Return validation errors
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attachment  $attachment
     * @return \Illuminate\Http\Response
     */
    public function show(Attachment $attachment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attachment  $attachment
     * @return \Illuminate\Http\Response
     */
    public function edit(Attachment $attachment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAttachmentRequest  $request
     * @param  \App\Models\Attachment  $attachment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAttachmentRequest $request, Attachment $attachment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attachment  $attachment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
         {
            $this->attachmentRepository->delete($id) ; 
            return  $this->successResponse('DELETE_SUCCESS', [], 201, App::getLocale())  ; 
         }catch (ModelNotFoundException $e) 
         {
            return $this->errorResponse('DELETE_FAILED', [],  422, App::getLocale());
         }
    }
}
