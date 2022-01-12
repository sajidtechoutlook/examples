<?php
namespace App\Http\Controllers\Reports;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Controllers\Controller;
use App\User;
use App\Payment;
use DataTables;
use DB;
use Auth;
use Session;
use App\AgentDetails;
use Cookie;
class RegisteredUsersControllers extends Controller
{
    public function index()
    {
        $postsQuery = User::all();
        //$posts = $postsQuery->select('*');
        
        $user_paid = Payment::select('user_id as user')->where('payment_id','!=', 'free')->get();
        // $users = User::orderBy('id', 'desc')->paginate(50);
        // $users = User::whereHas('payments', function (Builder $query) {
        //     $query->where('payer_id', '!=' ,'trail')->groupBy('user_id');
        // })->whereHas('plans', function (Builder $query) {
        //     $query->groupBy(['plan_id', 'payment_id']);
        // })->orderBy('id', 'desc')->paginate(25);
        $users = DB::table('users')
                    ->join('payments', function ($join) {
                        $join->on('users.id', 'payments.user_id');
                    })->join('plans', function ($join) {
                        $join->on('plans.id', 'payments.plan_id');
                    })->groupBy('user_id')->where('payments.payer_id', '!=' ,'trail')->get();

        // dd(count($users));
        return view('superadmin.reports.registered_users2', compact('user_paid','postsQuery', 'users'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function default(Request $request)
    {
        // dd($request->all());

        // $postsQuery = User::query();
        // // dd($postsQuery);
        $start_date = (!empty($_GET["start_date"])) ? ($_GET["start_date"]) : ('');
        $end_date = (!empty($_GET["end_date"])) ? ($_GET["end_date"]) : ('');
        $paid_user = (!empty($_GET["paid_user"])) ? ($_GET["paid_user"]) : ('');


        // dump($start_date);
        // dump($end_date);
        // dd($paid_user);
        // if($paid_user == 'paid_user')
        // {
        //     $user_paid = Payment::select('user_id as user')->where('payment_id','!=', 'free')->get();
        //     $user_payment = [];
        //     foreach ($user_paid as $paid_user_id){
        //         $user_payment[] = User::where('id', $paid_user_id->user)->first();
        //     }
        //        return Datatables::of($user_payment)
        //            ->make(true);
        // }
        // elseif($paid_user == 'free_user'){
        //     $user_paid = Payment::select('user_id as user')->where('payment_id', 'free')->get();
        //     $user_payment = [];
        //     foreach ($user_paid as $paid_user_id){
        //         $user_payment[] = User::where('id', $paid_user_id->user)->first();
        //     }
        //     return Datatables::of($user_payment)
        //         ->make(true);
        // }
        // else{


        // $data = DB::table('users')
        // ->select('A.id')
        //     ->join('payments as A','A.user_id','users.id')
        //         // ->when($paid_user, function ($query, $role) {
        //         //     return $query->where('role_id', $role);
        //         // })
        //     ->orderBy('A.created_at','desc')->where('users.id',8)
        //     ->groupBy('A.user_id')
        //     ->get();


        // $data = User::with(['user_payments' => function($query){
        //             $query->from(DB::raw('(SELECT * FROM payments ORDER BY created_at DESC) t'))
        //             ->groupBy('t');
        //         }])->get();
        // dd($data);
        // dd($paid_user);
        DB::enableQueryLog();

    //     $data = User::
    // Join('payments', function($query) {
    // $query->on('users.id','=','payments.user_id')
    // ->whereRaw('payments.id IN (select MAX(a2.id) from payments as a2 )');
    // })
    // // ->where('students.role_type_id', Users::STUDENT_ROLE_TYPE)
    // ->get();


        // $data = User::
        //     when($paid_user == 'paid_user', function ($query, $role) {
              
        //          // $query->join('payments','payments.user_id','users.id')
        
        // $query->join('payments', function($join) {
        //     $join->on('payments','payments.user_id','users.id')
        
        //     ->whereRaw('payments.user_id IN (select MAX(id) from payments as u2  group by u2.id)');
        //         });

        //     })

        //          // ->DB::raw('(Select max(id) as id from messages group by author_id) LatestMessage')
        //          // ->orderBy('payments.created_at','desc')->groupBy('payments.user_id');
        //     // })
        //     // ->where('id', 8)
        // ->get();
        // dd(DB::getQueryLog());

        // return Payment::groupBy('user_id')->get();

        $reg_users = DB::select("SELECT user_id as user FROM payments group By payments.user_id");
        // dd($reg_users);
        $user_count = array();
          foreach ($reg_users as $reg_user){
                $user_count[] = $reg_user->user;
            }

            // dd($user_count);
        $data = DB::table('users') 
            ->select('users.id','users.name','users.email','users.created_at','users.email_verified_at','users.country_state_city','plans.title','payments.payment_id','users.last_login_at')

        // ->leftjoin('payments','payments.user_id','users.id')

                    ->when($paid_user == 'free_user', function ($query, $role)  use($user_count){

            // $query->addSelect(DB::raw('plans.title as title'));
                // $query->leftjoin('payments', function($join){

                //     $join->on('payments.user_id','users.id');
                //     $join->whereRaw("users.id Not IN (SELECT Max(payments.user_id) as max_id FROM payments group By payments.user_id)");  
                // })->leftjoin('plans','plans.id','payments.plan_id')
                $query->whereNotIn('users.id', $user_count );

            })
                    
            ->when($paid_user == 'paid_user', function ($query, $role) {

            // $query->addSelect(DB::raw('plans.title as title'));
                $query->join('payments', function($join){

                    $join->on('payments.user_id','users.id');
                    $join->whereRaw("payments.id IN (SELECT Max(payments.id) as max_id FROM payments group By payments.user_id)");  
                })->leftjoin('plans','plans.id','payments.plan_id')
                 ->where('payments.payer_id', '!=' ,'trail');



            }, function ($query) {
                return     $query->leftjoin('payments', function($join){

                    $join->on('payments.user_id','users.id');
                    $join->whereRaw("payments.id IN (SELECT Max(payments.id) as max_id FROM payments group By payments.user_id)");  
                })->leftjoin('plans','plans.id','payments.plan_id')
                ->groupBy('payments.user_id')
                ->groupBy('users.id');

            })
            


            ->when($start_date && $end_date, function ($query) use ($start_date ,$end_date){
                $query->whereDate('users.created_at', '>=' ,$start_date )
                ->whereDate('users.created_at', '<=' ,$end_date );
            })

        ->orderBy('users.created_at','desc')
        // ->groupBy('payments.user_id')
       
        // ->select(DB::raw('Max(payments.id) as max_id'), 'users.name', 'users.created_at as registered_date','payments.payment_id')
        // ->groupBy('payments.user_id')
        ->get();
        // dd(DB::getQueryLog());
        // dd($data);
        // $posts = $postsQuery->select('*');
        
        return datatables()->of($data)
     
                ->addColumn('action', function ($data) {
                $view =  '<a href="#edit-'.$data->id.'" id="'.$data->id.'" onclick="myFunction(this.id)" style="margin-top: 10px;margin-right: 5px;"class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> View</a>';

                $user =  '<a href="#" id="'.$data->id.'" onclick="auto_login_user(this.id)"style="margin-top: 10px;margin-right: 5px;" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> User</a>';
                // $user_stats =  '<a href="#" id="'.$data->id.'" onclick="user_device_stats(this.id)" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Stats</a>';
                
                return $view.$user;
            })

        ->escapeColumns([])
            ->make(true);
        // }
    }
    public function datefilter(Request $request){
        $postsQuery = User::query();
        $start_date = (!empty($_GET["start_date"])) ? ($_GET["start_date"]) : ('');
        $end_date = (!empty($_GET["end_date"])) ? ($_GET["end_date"]) : ('');
        if($start_date && $end_date){
            $start_date = date('Y-m-d', strtotime($start_date));
            $end_date = date('Y-m-d', strtotime($end_date));
            $postsQuery->whereRaw("date(users.created_at) >= '" . $start_date . "' AND date(users.created_at) <= '" . $end_date . "'");
        }
        $posts = $postsQuery->select('*');
        return datatables()->of($posts)
            ->make(true);
    }
    public function auto_login_user($id){
            // return $id;

        // dd(Auth::user()->roles);

        Session::put('device_id', $id);
        // Auth::guard('admin')->login($user);
        // $user = User::find($id);
        // $res = Auth::login($user, true);
        // dd($user);
        return response()->json(['success' => true ], 200);
    }

        public function demo_login_user(){

        $user = User::find(19);
        // dd($user);  
        $res = Auth::login($user, true);
        return response()->json(['success' => true ], 200);
    }
    

    public function mySearch(Request $request)
    {   
        $user  = User::where('email', 'like', $request->email)->get();
        return $user ? json_encode($user) : ''; 
    }




public function getAgents()
{
    // dd(Cookie::get('ref_code'));
    $agents = User::whereHas('roles', function($query){
        $query->where('name','=','Agent');
    })->paginate(25);

    return view('superadmin.reports.agents', compact('agents'));

}



public function agentApprove(Request $request, $id)
{

    $agentApprove = AgentDetails::find($id);
    $agentApprove->status = 1;
    $agentApprove->save();
    return back()->with('success', 'Agent approved...');
}



public function agentDisapprove(Request $request, $id)
{
    $agentApprove = AgentDetails::find($id);
    $agentApprove->status = 0;
    $agentApprove->save();
    return back()->with('success', 'Agent Un-Approved...');
}



public function agentActivate(Request $request, $id)
{
    $agent = User::find($id);
    $agent->status = 1;
    $agent->save();
    return back()->with('success', 'Agent Activated...');    
}



public function agentDeactivate(Request $request, $id)
{

    // dd($id);
    $agent = User::find($id);
    $agent->status = 0;
    $agent->save();
    return back()->with('success', 'Agent De-Activated...');
}

}