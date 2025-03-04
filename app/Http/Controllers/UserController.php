<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Database\Snapshot\getChildren;
use Kreait\Firebase\ServiceAccount;
use App\Events\DataUpdate;
use App\Listeners\DataUpdatedListener;
use Carbon\Carbon;

class UserController extends Controller
{
    // public function test()
    // {
    //     // Path ke file kredensial Firebase
    //     $serviceAccountPath = base_path('path/cobatest-c4366-firebase-adminsdk-szrh2-196e3bbc1a.json');

    //     // Periksa apakah file kredensial ada
    //     if (!file_exists($serviceAccountPath)) {
    //         dd('File kredensial tidak ditemukan.');
    //     }

    //     // Buat instance Firebase
    //     try {
    //         $firebase = (new Factory)
    //             ->withServiceAccount($serviceAccountPath)
    //             ->withDatabaseUri("https://cobatest-c4366-default-rtdb.asia-southeast1.firebasedatabase.app");

    //         // Dapatkan instance Database
    //         $database = $firebase->createDatabase();

    //         // Uji koneksi dengan mendapatkan referensi ke root Firebase
    //         $reference = $database->getReference('/');
    //         $value = $reference->getValue();

    //         // Tampilkan data yang diterima
    //         dd($value);
    //     } catch (\Exception $e) {
    //         // Tangani kesalahan koneksi
    //         dd("Error: " . $e->getMessage());
    //     }
    // }
    public function getID(Request $request)
    {
        $serviceAccountPath = base_path('path/smartgate-536ca-firebase-adminsdk-fbsvc-fcde5e8476.json');

        try {
            $firebase = (new Factory)
                ->withServiceAccount($serviceAccountPath)
                ->withDatabaseUri("https://smartgate-536ca-default-rtdb.asia-southeast1.firebasedatabase.app");

            // Dapatkan instance Database
            $database = $firebase->createDatabase();


            // Uji koneksi dengan mendapatkan referensi ke root Firebase
            $reference = $database->getReference('/Card/id');
            $value = $reference->getValue();

            // return response()->json($value);
            return view('form', [
                'cardId' => $value,
            ]);
        } catch (\Exception $e) {
            // Tangani kesalahan koneksi
            dd("Error: " . $e->getMessage());
        }
    }
    public function send(Request $request)
    {
        $serviceAccountPath = base_path('path/smartgate-536ca-firebase-adminsdk-fbsvc-fcde5e8476.json');
        try {
            $firebase = (new Factory)
                ->withServiceAccount($serviceAccountPath)
                ->withDatabaseUri("https://smartgate-536ca-default-rtdb.asia-southeast1.firebasedatabase.app");

            // Dapatkan instance Database
            $database = $firebase->createDatabase();

            $cardIdReff = $database->getReference('/Card/id');
            $value = $cardIdReff->getValue();

            // Uji koneksi dengan mendapatkan referensi ke root Firebase
            $reference = $database->getReference("/form/" . $value);
            $reference->set([
                'id' => $value,
                'nama' => $request->input('nama'),
                'status' => $request->input('status'),
            ]);
            return redirect('home');
        } catch (\Exception $e) {
            // Tangani kesalahan koneksi
            dd("Error: " . $e->getMessage());
        }
    }
    public function closeGate()
    {
        $serviceAccountPath = base_path('path/smartgate-536ca-firebase-adminsdk-fbsvc-fcde5e8476.json');
        try {
            $firebase = (new Factory)
                ->withServiceAccount($serviceAccountPath)
                ->withDatabaseUri("https://smartgate-536ca-default-rtdb.asia-southeast1.firebasedatabase.app");

            // Dapatkan instance Database
            $database = $firebase->createDatabase();

            $database->getReference('/isGateOpen')->set(false);


        } catch (\Exception $e) {
            // Tangani kesalahan koneksi
            dd("Error: " . $e->getMessage());
        }
    }

    public function statusInfo()
    {
        $serviceAccountPath = base_path('path/smartgate-536ca-firebase-adminsdk-fbsvc-fcde5e8476.json');


        $firebase = (new Factory)
            ->withServiceAccount($serviceAccountPath)
            ->withDatabaseUri("https://smartgate-536ca-default-rtdb.asia-southeast1.firebasedatabase.app");

        // Dapatkan instance Database
        $database = $firebase->createDatabase();

        // Dapatkan referensi ke suatu parent pada database
        $logKeys = $database->getReference('/log')->getChildKeys();
        $logEntries = array();
        // $loglog[] = $logKeys;
        foreach ($logKeys as $logKey) {
            $logEntry = $database->getReference('/log/' . $logKey)->getValue();
            // $logEntries[] = $logEntry;
            date_default_timezone_set('Asia/Jakarta');
            $logEntry['timestamp'] = date('Y-m-d H:i:s', $logEntry['timestamp'] / 1000);
            $logEntries[] = $logEntry;
        }

        // Loop untuk mengakses child di dalam child pada path '/form'
        $datachild = $database->getReference('/form')->getChildKeys();
        $data = array();
        foreach ($datachild as $datachilds) {
            $datas = $database->getReference('/form/' . $datachilds)->getValue();
            $data[] = $datas;
        }
        // dd($logEntries);
        // Kirim data ke view
        return view('sukses', [
            'logEntries' => $logEntries,
            'data' => $data,
        ]);

    }



}
