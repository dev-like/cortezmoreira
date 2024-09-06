<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Calendar;
use Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = [];
        $data = Event::all();

        if($data->count()) {
          foreach ($data as $key => $value) {

            $events[] = Calendar::event(
              $value->title,
              true,
              new \DateTime($value->start_date),
              new \DateTime($value->end_date),
              $value->id,
              // Add color and link on event
              [
                'color' => '#f05050',
                'allDay' => false,
                'timeFormat'=> 'H(:mm)',
                'celular' => $value->celular,

              ]
            );

          }
        }

        $calendar = Calendar::addEvents($events)
        ->setOptions([
          'lang' => 'pt-br',
          'navLinks'=> true,
          'durationeditable' => true,
        ])
        ->setCallbacks([
          'eventClick' => 'function(event) {
            $("#successModal").modal("show");
            $("#successModal .modal-body p.title").text(event.title);
            $("#successModal .modal-body p.description").text(event.description);
            $("#successModal .modal-body p.celular").text(event.celular);
          }',
        ]);

        return view('admin.agendamento.fullcalender', compact('calendar','events'));
    }
}
