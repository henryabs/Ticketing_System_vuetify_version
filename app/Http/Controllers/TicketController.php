<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\TicketResource;
use App\Models\Ticket;
class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::with('status')->get();
        // return TicketResource::collection($tickets);
        return [
            'data' => $tickets,
            'count' => $tickets->count()
        ];
    }

    public function openTickets(){
        $tickets = Ticket::with('status')->get();
        $tickets = $tickets->where('status.status_name', 'open');
        return [
            'data' => $tickets,
            'count' => $tickets->count()
        ];
    }

    public function closedTickets(){
        $tickets = Ticket::with('status')->get();
        $tickets = $tickets->where('status.status_name', 'closed');
        return [
            'data' => $tickets,
            'count' => $tickets->count()
        ];
    }

    public function unassignedTickets(){
        $tickets = Ticket::with('status')->get();
        $tickets = $tickets->where('status.status_name', 'unassigned');
        return [
            'data' => $tickets,
            'count' => $tickets->count()
        ];
    }

    public function unresolvedTickets(){
        $tickets = Ticket::with('status')->get();
        $tickets = $tickets->where('status.status_name', 'unresolved');
        return [
            'data' => $tickets,
            'count' => $tickets->count()
        ];
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
