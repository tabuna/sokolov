<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Country;
use App\Models\Zone;
use Auth;
use Illuminate\Http\Request;
use Session;

class SettingController extends Controller
{


    private $user;

    public function __construct()
    {
        $this->user = Auth::user();
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $Country = Country::all();
        $Zone = Zone::orderBy('zone_name')->get();


        if (Auth::user()->checkRole('editor'))
            return view('editor.setting', [
                'User' => $this->user,
                'Country' => $Country,
                'Zone' => $Zone
            ]);
        else
            return view('site.setting', [
                'User' => $this->user,
                'Country' => $Country,
                'Zone' => $Zone
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {

        if ($request->type == 'personal') {

            $this->validate($request, [
                'email' => 'required|email|confirmed',
            ]);


            $data = $request->all();

            if (empty($data['phone']))
                $data['phone'] = null;


            $this->user->fill($data)->save();

        } elseif ($request->type == 'password') {


            $this->validate($request, [
                'password' => 'required|max:255|confirmed',
            ]);

            $this->user->password = bcrypt($request->password);
            $this->user->save();
        }elseif ($request->type == 'notification') {
            $this->user = $this->user->fill($request->all());
            $this->user->save();
        }


        Session::flash('good', trans('alert.You have successfully changed values'));
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
