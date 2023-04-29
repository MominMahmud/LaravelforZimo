<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class ExportController extends Controller
{
    public function csv()
    {
        // Fetch the data from the "users" table
        $users = DB::table('users')->select('id', 'name','country','phone', 'email','address', 'created_at','updated_at')->get();

        // Define the CSV headers and content
        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=users.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );
        $columns = array('ID', 'Name', 'Country','Phone','Email','Address', 'Created At','Updated At');
        $callback = function () use ($users, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);
            foreach ($users as $user) {
                fputcsv($file, array($user->id, $user->name,$user->country,$user->phone,$user->email, $user->address,$user->created_at,$user->updated_at));
            }
            fclose($file);
        };

        // Return the CSV file as a download
        return Response::stream($callback, 200, $headers);
    }
}