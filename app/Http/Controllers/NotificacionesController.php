<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Request;
use Flash;
class NotificacionesController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->middleware('auth');
        $this->userRepository = $userRepo;
    }
    public function index(Request $request)
    {
        $notificaciones =  $this->userRepository->findWithoutFail(auth()->user()->id)->notifications;
        if(Request::ajax())
        {
            return $notificaciones =  $this->userRepository->findWithoutFail(auth()->user()->id)->unreadNotifications;
        }
        return view('notificaciones.index', compact('notificaciones'));
    }

    public function read($id)
    {
        $n = DatabaseNotification::find($id);
        if(Request::ajax()) {
            $n->markAsRead();
            return $this->userRepository->findWithoutFail(auth()->user()->id)->unreadNotifications;
        }
        /*if($n->read())
        {
            $n->markAsRead();
            return redirect($n->data['link']);
        }
        return redirect($n->data['link']);*/
    }

    public function destroy($id)
    {
        DatabaseNotification::find($id)->delete();
        return back()->with('flash', 'Notificacion eliminada');   
    }

    public function readAll() {
        foreach($this->userRepository->findWithoutFail(auth()->user()->id)->unreadNotifications as $n){
            $n->markAsRead();
        }
        Flash::success('Notificaciones marcadas con exito!.');
        return back();
    }

    public function destroyAll() {
        foreach($this->userRepository->findWithoutFail(auth()->user()->id)->notifications as $n){
            $n->delete();
        }
        Flash::success('Notificaciones eliminadas.');
        return back(); 
    }


}
