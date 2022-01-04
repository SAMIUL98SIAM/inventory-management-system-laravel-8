<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['countContact'] = Contact::count();
        $data['allData']= Contact::all();
        // $data['allData']= Contact::all();
        return view('admin.contact.index',$data);
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

        $contact = new Contact() ;
        $contact->address = $request->address ;
        $contact->mobile_no = $request->mobile_no ;
        $contact->email = $request->email ;
        $contact->facebook = $request->facebook ;
        $contact->twitter = $request->twitter ;
        $contact->youtube = $request->youtube ;
        $contact->linkedin = $request->linkedin ;
        $contact->google_plus = $request->google_plus ;
        $contact->created_by = Auth::user()->id;
        $contact->save();
        return redirect()->route('contacts.view')->with('success','You Added Contact');
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
        $data['contact'] = Contact::find($id);
        return view('admin.contact.edit',$data);
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


        $contact = Contact::find($id) ;
        $contact->address = $request->address ;
        $contact->mobile_no = $request->mobile_no ;
        $contact->email = $request->email ;
        $contact->facebook = $request->facebook ;
        $contact->twitter = $request->twitter ;
        $contact->youtube = $request->youtube ;
        $contact->linkedin = $request->linkedin ;
        $contact->google_plus = $request->google_plus ;
        $contact->updated_by = Auth::user()->id;
        $contact->save();
        return redirect()->route('contacts.view')->with('success','Contacts updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact =  Contact::destroy($id);
        if($contact)
        {
            return redirect()->route('contacts.view')->with('error','Delete these guy');
        }
    }
}
