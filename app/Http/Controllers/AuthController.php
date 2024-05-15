<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;
use Illuminate\Support\Facades\DB;
use DateTime;
use App\Models\CustomerModel;
use App\Models\ServiceJobModel;
use \Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;



class AuthController extends Controller
{
    public function login()
    {
       
        if (!empty(Auth::check())) {
            return redirect('admin/dashboard');
        }
        return view('admin.login');
    }
    public function authlogin(Request $req)
    {
        if (Auth::attempt(['email' => $req->email, 'password' => $req->password], true)) {
            return redirect('admin/dashboard');
        } else {
            return redirect()->back()->with('error', 'Email or password is incorrect');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function addjobs()
    {
        $data['getRecord'] = DB::table('device_type')
            ->orderBy('type', 'asc')->get();

        return view('admin.addjob', $data);
    }

    public function insertjob(Request $req)
    {
        $req->validate([
            'device_type' => 'required',
            'model_name' => 'required',
            'imei_1' => 'required',
            'defect' => 'required',
            'amount' => 'required|numeric|min:1|max:99000',
            'remarks' => 'required',
            'name' => 'required',
            'mobile_number' => 'required|numeric',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'pincode' => 'required|numeric',
        ],[
            'amount.required' => 'Please Enter Amount',
            'remarks.required' => 'Please Enter Remarks',
        ]);

        $customer = CustomerModel::updateOrCreate(
            [
                'mobile' => $req->mobile_number,
            ],
            [ 
                'name' => $req->name,
                'mobile' => $req->mobile_number,
                'address' => $req->address,
                'city' => $req->city,
                'state' => $req->state,
                'pincode' => $req->pincode,
            ]
        );

        $lastid=$customer->id;

        $today = date('dmY');
        $serviceJobNumber = ServiceJobModel::where('job_no','like',$today.'%')->pluck('job_no');
        do {
            $job_no = $today.rand(111111,999999);
        } while ($serviceJobNumber->contains($job_no));

        $ServiceJobModel = new ServiceJobModel;
        $ServiceJobModel->customer_id = $lastid;
        $ServiceJobModel->job_no = $job_no;
        $ServiceJobModel->device_type = $req->device_type;
        $ServiceJobModel->brand = $req->model_name;
        $ServiceJobModel->imei_1 = $req->imei_1;
        $ServiceJobModel->imei_2 = $req->imei_2;
        $ServiceJobModel->defect = $req->defect;
        $ServiceJobModel->estimate = $req->amount;
        $ServiceJobModel->remarks = $req->remarks;
        $ServiceJobModel->save();
        $lastid = $ServiceJobModel->id;
  
        return back()->with('success', ' JOB Created Successfully: ' .$lastid);

    }


    public function viewjobs()
    {
        $data['getRecords'] = ServiceJobModel::getRecord();
        
        return view('admin.viewjob', $data);
    }

    public function testapi()
    {   

        $mobile = "9971123140";
        $name = "Kumar Sachin";
        $city = "Indirapuram";
        $state = "UP";
        $model =   "Samsung";
        $device ="Mobile Phone";
        $serial = rand(111111111111111, 999999999999999);

        $data = array(
            'phoneNumber' => $mobile,
            'countryCode' => '+91',
                'traits'    =>  [
                    'name' => $name ,
                    'City' => $city,
                    'State' => $state
                ]
            );
        $new_data = json_encode($data);

        // for template purposes

        $data2 = array(
            'phoneNumber' => $mobile,
            'countryCode' => '+91',
            'callbackData' => "some text here",
            'type' => 'Template',
                'template'    =>  [
                    'name' => "service_request_new" ,
                    'languageCode' => "en",
                    'State' => $state,
                        'bodyValues'    =>  [
                            $name ,
                            "SIPL154825" ,
                            $model." ".$device." S/N: ".$serial,
                        ]
                ]
            );
        $new_data2 = json_encode($data2);

        $ch1 = curl_init();
        $ch2 = curl_init();

        curl_setopt_array($ch1, array(
            CURLOPT_URL => 'https://api.interakt.ai/v1/public/track/users/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $new_data,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Basic <V3hWeXNFdFd3cUpXTnU1ZnpFcDdsY1l4UkNjTFNmX2hVTUNaMDRWLVRPODo=>'
            ),
        ));

        curl_setopt_array($ch2, array(
            CURLOPT_URL => 'https://api.interakt.ai/v1/public/message/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $new_data2,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Basic <V3hWeXNFdFd3cUpXTnU1ZnpFcDdsY1l4UkNjTFNmX2hVTUNaMDRWLVRPODo=>'
            ),
        ));

         $response = curl_exec($ch1);
         $response2 = curl_exec($ch2);

         $resu = json_decode($response, true);
        return $resu['message'];


         //return $response. " two" .$response2;



       /*  $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.interakt.ai/v1/public/track/users/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $new_data,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Basic <V3hWeXNFdFd3cUpXTnU1ZnpFcDdsY1l4UkNjTFNmX2hVTUNaMDRWLVRPODo=>'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl); */



        /* 
        return $response; */
    }

    public function testnumber()
    {
        $today = date('dmYhms');
        
        // $today2 = $carbon = new Carbon('dmY', 'Asia/Kolkata');

        $serviceJobNumber = ServiceJobModel::where('job_no','like',$today.'%')->pluck('job_no');
        do {
            $job_no =$today.rand(111111,999999);
        } while ($serviceJobNumber->contains($job_no));

        //return $job_no;

       $date =new DateTime();
       //echo $date->format("Y-m-d h:i:s");
    $ddd= $date->format("Y-m-d");
       //echo $date->format("dmYhis");
        

        $date1=date_create($ddd);
        $date2=date_create("2022-10-23");
        $diff=date_diff($date1,$date2);
        echo $diff->format("%R%a days");

    }
    
    function pass()
    {
         dd(Hash::make('Sachin'));
    }

    public function calculateDaysBetweenDates()
    {
        $startDate = '2024-02-17';
        $endDate = '2024-01-10';
        // Parse the start and end dates using Carbon
        $start = Carbon::parse($startDate);
        $end = Carbon::parse($endDate);
        
        // Calculate the difference in days
        $differenceInDays = $end->diffInDays($start);
        
        return $differenceInDays;

    }

    public function viewpdf($id)
    {
        $data['getRecords'] = ServiceJobModel::getpdfRecord($id);
        $jobid= $data['getRecords'][0]['job_no'];

        $pdf = Pdf::loadView('admin.pdf',$data);
        return $pdf->download($jobid.'.pdf');
    }
        
    public function updatejob($id)
    {
         $data['getRecords'] = ServiceJobModel::updatejob($id);
         $data['getstatus'] = DB::table('dstatus')
                            ->select('id','status')
                            ->get();

       return view('admin.updatejob', $data);
    }

    public function updatejobstatus(Request $req, $id)
    {
        $req->validate([
            'job_status' => 'required',
            'del_remarks' => 'required|min:3|max:50',
            
        ]);
        
        $mytime = Carbon::now('Asia/Kolkata')->format('Y-m-d H:i:s');
        
        $service =ServiceJobModel::find($id);

        $service->status = $req->job_status;
        $service->delivary_remarks = $req->del_remarks;
                
        $service->updated_at = $mytime;

        $service->update();

        return back()->with('success', 'Job Status Updated Succesfully');
    }

    public function compleatejob()
    {
        $data['getRecords'] = ServiceJobModel::getComleatedRecord();
        
        return view('admin.compleatejob', $data);
    }
    
}
