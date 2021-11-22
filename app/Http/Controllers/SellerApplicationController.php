<?php

namespace App\Http\Controllers;

use App\Models\SellerApplication;
use App\Models\ShopCategory;
use App\Models\ApplicationAnswerOption;
use App\Models\ApplicationAnswer;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SellerApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('SellerApplication/Index', [
            "shopCategories" => ShopCategory::all(),
            "perspectiveQualities" => ApplicationAnswerOption::where('category', 'perspective-quality')->get(),
            "sellerExperiences" => ApplicationAnswerOption::where('category', 'seller-experience')->get(),
            "businessMarketings" => ApplicationAnswerOption::where('category', 'business-marketing')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->getValidate($request);
        try {
            DB::beginTransaction();
            $sellerApplication = new SellerApplication();
            $sellerApplication->shop_category_id = $request->input('shopCategory');
            $sellerApplication->first_name = $request->input('firstName');
            $sellerApplication->last_name = $request->input('lastName');
            $sellerApplication->portfolio_link = $request->input('portfolioLink');
            $sellerApplication->online_store = $request->input('onlineStores');
            $sellerApplication->save();

            $perspectiveQualityAnswer = new ApplicationAnswer();
            $perspectiveQualityAnswer->seller_application_id = $sellerApplication->id;
            $perspectiveQualityAnswer->application_answer_id = $request->input('perspectiveQuality');
            $perspectiveQualityAnswer->save();
            
            $sellerExperienceAnswer = new ApplicationAnswer();
            $sellerExperienceAnswer->seller_application_id = $sellerApplication->id;
            $sellerExperienceAnswer->application_answer_id = $request->input('sellerExperience');
            $sellerExperienceAnswer->save();
            
            $businessMarketingAnswer = new ApplicationAnswer();
            $businessMarketingAnswer->seller_application_id = $sellerApplication->id;
            $businessMarketingAnswer->application_answer_id = $request->input('businessMarketing');
            $businessMarketingAnswer->save();
            
            DB::commit();
            $request->session()->flash('success', 'Application created successfully!');
            return redirect()->action([SellerApplicationController::class, 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            $request->session()->flash('failure', 'Application can not be saved!');
        }
    }
    
    /**
     * Show success after application is saved.
     *
     * @return \Illuminate\Http\Response
     */
    public function success()
    {
        return Inertia::render('SellerApplication/Success');
    }
    
    /**
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     */
    private function getValidate(Request $request): void {
        $data = [
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'shopCategory' => 'required|integer',
            'portfolioLink' => 'nullable|url|unique:App\Models\SellerApplication,portfolio_link|max:255',
            'onlineStores' => 'nullable|max:65535',
            'perspectiveQuality' => 'required|integer',
            'sellerExperience' => 'required|integer',
            'businessMarketing' => 'required|integer'
        ];
        $messages = [
            'portfolioLink.unique' => 'The Portfolio Link is already used by another seller.'
        ];
        $this->validate($request, $data, $messages);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
