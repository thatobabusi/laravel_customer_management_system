<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::withTrashed()->get();
        //$clients = Client::withTrashed()->paginate(10)->get();
        return view("clients.index", [
            "clients" => $clients
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("clients.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $values = $this->validate($request, [
            "name" => "required"
        ]);

        Client::create($values + ['created_user_id' => auth()->user()->id]);
        $created_client = collect(Client::all())->last();

        $message = "<strong>Success!</strong> Client captured successfully.
                    <a href=\"#\" class=\"alert-link\">View Details</a>
                    <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">×</a>";
        return redirect()->route('clients.index')
            ->with("success", $message);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view("clients.details", [
            "client" => $client
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view("clients.edit", [
            "client" => $client
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $values = $this->validate($request, [
            "name" => "required",
        ]);

        $client->update($values + ['created_user_id' => auth()->user()->id]);

        $message = "<strong>Notice!</strong> Client updated successfully.
                    <a href=\"#\" class=\"alert-link\">View Details</a>
                    <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">×</a>";

        return redirect()->route('clients.index')
            ->with("notice", $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        Client::destroy($client->id);

        $message = "<strong>Notice!</strong> Client deleted successfully.
                    <a href=\"#\" class=\"alert-link\">View Details</a>
                    <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">×</a>";
        return redirect()->route('clients.index')
            ->with("notice", $message);
    }
}
