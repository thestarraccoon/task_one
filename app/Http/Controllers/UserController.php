<?php

namespace App\Http\Controllers;

use App\Factories\EventActionsFactory;
use App\Http\Requests\SubcribeToEventRequest;
use App\Interfaces\EventServiceInterface;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function getUserEvents()
    {
        $user = User::find(Auth::id());

        $userEvents = $user->events;

        return response()->json([
            'error' => null,
            'result' => $userEvents
        ]);
    }

    public function userActionsWithEvent(SubcribeToEventRequest $request,  EventServiceInterface $eventService)
    {
        try {
            $err = null;

            $data = $request->validated();

            $user = User::findOrFail(Auth::id());
            $event = Event::findOrFail($data['event_id']);

            $eventAction = EventActionsFactory::actionWithEvent($data['action']);

            $result = $eventAction->actionOnEvent($user, $event);
        } catch (ModelNotFoundException $e) {
            $err = 'No query results for this event ID';
            $result = "Ошибка: Событие не найдено";
        } catch (\Exception $e) {
            $err = $e->getMessage();
            $result = "Ошибка действия над событием: " . $e->getMessage();
        }

        return response()->json([
            'error' => $err,
            'result' => $result
        ]);
    }
}
