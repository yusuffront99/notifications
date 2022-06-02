<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function store(Request $request)
    {
        User::updateOrCreate([
            'id' => $request->id],
            ['name' => $request->name,
            'report' => $request->report,
            'email' => $request->email
        ]);

        return response()->json(['success' => true, 'message' => 'Add Data Successfully']);
    }

    public function fetch()
    {

    if(isset($_POST["view"])){
        
            if($_POST["view"] != ''){
                $data = DB::update("update users set seen_status = '1' where seen_status = '0'");
                return $data;
            }

            $query = DB::select("SELECT * FROM users ORDER BY id DESC LIMIT 3");
            $output = '';

            if(count($query) > 0) {
                foreach($query as $row) {
                    $output .= '
                    <li>
                        <a href="#">
                        Username: <strong>'.$row->name.'</strong><br />
                        Email: <strong>'.$row->email.'</strong></br>
                        Laporan: <strong>'.$row->report.'</strong>
                        </a>
                    </li>
                
                    ';
                }
            } else {
                $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
            };
    
            $query1 = DB::select("SELECT * FROM users WHERE seen_status='0'");
            $count = count($query1);
            $data = array(
                'notification' => $output,
                'unseen_notification' => $count
            );

            return response()->json($data);
        }
    }
}
