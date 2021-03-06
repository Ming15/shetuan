<?php

namespace App\Http\Middleware;

use App\Models\Association;
use App\Traits\BaseTrait;
use Closure;

class CheckStudentAssociationBelongTo
{
    use BaseTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $association_id = $request->input('association_id');
        $student_id = $request->get('token_data')->id;

        if($association_id){
            $result = Association::whereHas('student' , function($query) use ($student_id){
                return $query->where('students.id', $student_id);
            })->where('associations.id', $association_id)->first();

            if($result){
                return $next($request);
            }else{
                return $this->result('','401','权限错误，无权访问此资源','200');
            }
        }else{
            return response()->json(['association_id' => ['association_id' => ['参数不完整']], 'code' => 422, 'message' => 'error', 'status' => 200]);

        }
    }
}
