<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attachment;
use App\Repositories\IAttachmentRepository;
use App\Http\Requests\StoreAttachmentRequest;
use App\Http\Requests\UpdateAttachmentRequest;
use Yajra\DataTables\DataTables;
use App\Services\AttachmentDatatableService ; 


class AttachmentController extends Controller
{
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
         
        // $data = Slider::with(['news'])->select('*')->where('language' , App::getLocale())->get();
        if ($request->ajax()) 
        {
            $data = Slider::with('news')->select('*')->where('language' , App::getLocale());    
            try {
                return $attachmentDatatableService->handle($request,$data);
            } catch (Throwable $e) {
                return response([
                    'message' => $e->getMessage(),
                ], 500);
            }
        }
    //    return view('Dashboard.sliders.index' ,["CurrentLang" => App::getLocale()]);
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
        
        $this->attachmentRepository->create($request->getDataWithImage());
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
         $this->attachmentRepository->delete($id);

    }
}
