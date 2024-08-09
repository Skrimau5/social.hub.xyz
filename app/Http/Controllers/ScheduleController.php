<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Days;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ScheduleController extends Controller
{
    /**
     * Carga los horarios ya guardados.
     */
    public function index()
    {
        session_start();
    
        if ($_SESSION != null) {
            $session = session()->get('key');
    
            foreach ($session as $value) {
                $id = $value['id'];
            }
    
            
            $schedules = Schedule::with('day')->where('user_id', $id)->get();
            $days = Days::all();
    
            
            $schedulesDays = [];
            foreach ($days as $day) {
                $schedulesByDay = $schedules->where('day_id', $day->id)->pluck('time')->toArray();
                $schedulesDays[$day->day] = $schedulesByDay;
            }
    
            // Dirección a la vista de la página.
            return view('schedules', compact('schedules', 'days', 'schedulesDays'));
        } else {
            return redirect('/');
        }
    }
    

    /**
     * Vista del la venta "editPosts"
     */
    public function viewEditSchedules()
    {
        //Trae todas los dias de la base de datos.
        $days = Days::all();

        //Direcciona a la vista del la pagina
        return view('editSchedules', compact('days'));
    }

    /**
     * Genera una vista a la ventana de creacion de publicaciones.
     */
    public function create()
    {
        //Trae todas los dias de la base de datos.
        $days = Days::all();

        //Direcciona a la vista del la pagina
        return view('newSchedule', compact('days'));
    }

    /**
     * Inserta horarios a la base de datos.
     */
    public function store(Request $request)
    {
        $message = "¡Guardado con éxito!";
            
        $dataSchedules = request()->except('_token') + [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    
        $insertSchedules = Schedule::insert($dataSchedules);
    
        if ($insertSchedules) {
            return redirect('/schedules')->with('status', $message);
        }
    }
    

    /**
     * Obtiene los horarios que se desean editar.
     */
    public function edit($id)
    {
        $schedule = Schedule::find($id); //Trae el horario con respecto al id

        return redirect('/editSchedules')->with('status', $schedule);
    }

    /**
     * Edita el horario.
     */
    public function update($id)
    {
        $schedule = request()->except('_token', '_method');

        Schedule::where('id', '=', $id)->update($schedule);
        return redirect('/schedules');
    }

    /**
     * Elimina horarios.
     */
    public function destroy($id)
    {
        $schedules = Schedule::find($id);
        $schedules->delete(); //Elimina por medio del id

        return redirect('/schedules');
    }
}
