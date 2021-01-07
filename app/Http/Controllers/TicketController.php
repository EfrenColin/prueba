<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketRequest;
use App\Models\Category;
use App\Models\CategoryTicket;
use App\Models\Ticket;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class TicketController extends Controller
{
    public function index()
    {
    	$tickets = Ticket::orderBy('id','asc')->paginate(5);

    	 return View::make('tickets.index',compact('tickets'));
    }

    public function create()
    {
    	$categories = Category::active();
		return View::make('tickets.create',compact('categories'));
    }

    public function store(Ticket $ticket,TicketRequest $request)
    {

        $fileName = time().'.'.$request->file->extension();

        $ticket= new Ticket();
        $ticket->title = $request->get('title');
        $ticket->media = $fileName;
        $ticket->save();

        foreach ($request->get('categories') as $value) {
        	CategoryTicket::create([
        		'ticket_id' => $ticket->id,
        		'category_id' => $value,
        	]);
        }
        $request->file->move(public_path('uploads'), $fileName);

        return redirect()->route('tickets.index')->with('message', 'Registro guardado correctamente.');
    }

    public function edit(Ticket $ticket)
    {
    	$categories = Category::active();
		return View::make('tickets.edit',compact('categories','ticket'));
    }

    public function update(Ticket $ticket,TicketRequest $request)
    {


        if ($request->hasFile('file')){
           // $url = public_path('uploads/'.$ticket->media);
            if(File::exists(public_path('uploads/'.$ticket->media))){

                File::delete(public_path('upload/'.$ticket->media));

            }
            $fileName = time().'.'.$request->file->extension();
            $request->file->move(public_path('uploads'), $fileName);
            $ticket->media = $fileName;
        }

        $ticket->title = $request->get('title');

        $ticket->update();

        $ticket->categories()->sync($request->get('categories'));


        return redirect()->route('tickets.index')->with('message', 'Registro actualizado correctamente.');
    }

    public function destroy(Ticket $ticket)
    {
        if(File::exists(public_path('uploads/'.$ticket->media))){

            File::delete(public_path('upload/'.$ticket->media));

        }

        $ticket->delete();

        return redirect()->route('tickets.index')->with('message', 'Registro eliminado correctamente.');

    }
}
