<?php

namespace App\Http\Controllers;

use App\Contact;
use DemeterChain\C;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        //

        $contacts = Contact::latest()->paginate(5) ;

        return view('index', compact('contact'))
            ->with('i', (request()->input('page',1) -1) *5);

        /*$contacts = Contact::all();

        return view('contacts.index', [ 'contact' => $contacts ]);*/

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        /*$validatedContact = $this->validateContact( $request );
        $contacts = new Contact( $validatedContact );
        $contacts->user_id = auth()->user()->id;
        $contacts->save();

        return redirect()->route( 'contacts.index', $contacts );
        */

        $request-> validate([
            'name' => 'required',
            'tel' => 'required',
            'email' => 'required',
        ]);

        $contacts = array(
            'name' => $request->name,
            'tel' => $request->tel,
            'email' => $request->email,
        );


        Contact::create($contacts);

        return redirect('contacts.index')->with('success', 'Contact enregistré.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
        return view( 'contacts.index', [ 'contact' => $contact ] );

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
       /* return view( 'contacts.edit', [ 'contact' => $contact ] );*/

        $data_contact = Contact::findOrFail($id);
        return  view('contacts.edit', compact('data_contact')) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
       /* $validatedContact = $this->validateContact( $request );
        $contact->fill( $validatedContact );
        $contact->save();

        return redirect()->route( 'contacts.index', $contact );*/
        ;

       $request->validate([
           'name' => 'required',
           'tel' => 'required',
           'email' => 'required'
       ]);
       $contact = array(
           'name' => $request->name,
           'tel' => $request->tel,
           'email' => $request->email
       );

       Contact::where('id', $contact->id )->update($contact);
       return redirect('contacts.index')
           ->with('success', 'Le contact a bien été modifié');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //

        $contact->delete();

        return redirect()->route('contacts.index')
            -with('success', 'Le contact a bien été supprimé');
    }
}
