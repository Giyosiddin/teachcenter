<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Buyers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($this->lessonIsPaid($request->route('lesson'))){
            return $next($request);
        }elseif(Auth::user()){
            if(Auth::user()->isBuyer() || Auth::user()->isGrant()){
                if(Auth::user()->isUserCourse($request->route('course_id'))){
                    return $next($request);
                }else{
                    return back()->with(['msg' => "Siz bu kursni sotib olmagansiz."]);
                }
            }elseif(Auth::user()->isAdmin()){
                return $next($request);
            }else{
                return back()->with(['msg'=>'Siz kursni sotib olishingiz kerak.']);
            }
        }else{
            return redirect('/login');
        }
    }
    public function lessonIsPaid($id)
    {
        $lesson = Lesson::findOrFail($id);
        if($lesson->paid=="0" || is_null($lesson->paid)){
            return true;
        }else{
            return false;
        }
    }
}
