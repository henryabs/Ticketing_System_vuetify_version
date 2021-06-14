<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\LogController;
//PROTECTED ROUTE
Route::group(['middleware' => 'auth:sanctum'], function(){
    
});

//PUBLIC ROUTE
Route::get('/tickets', [TicketController::class, 'index']);
Route::get('/tickets/open', [TicketController::class, 'openTickets']);
Route::get('/tickets/closed', [TicketController::class, 'closedTickets']);
Route::get('/tickets/unassigned', [TicketController::class, 'unassignedTickets']);
Route::get('/tickets/unresolved', [TicketController::class, 'unresolvedTickets']);

Route::get('/logs', [LogController::class, 'index']);