<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('admin.pages.contacts.index', compact('contacts'));
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
        $contacts = Contact::find($id);
        return view('admin.pages.contacts.edit', compact('contacts'));
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
        $this->validate($request, [
            'replay' => 'required'
        ]);

        DB::table('contact')->where('id', $id)->update([
            'status' => '1',
            'replay' => $request->replay,
            // Replaiers => refer to Admins.id
            // 'updated_at' => now()
            'updated_at' => now()
        ]);

        return redirect()->back()->with('success', 'تم الرد بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->back()->with('success', 'تم الحذف بنجاح');
    }
}
