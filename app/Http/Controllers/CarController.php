<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show', 'loadCars']]);
    }

    /**
     * loadCars return all cars as json fromat
     * Ajax api call
     */
    public function loadCars()
    {
        $cars = Car::all();
        return response()->json($cars);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::all();
        return view('home')->with('cars', $cars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'manufacturer'       => 'required',
            'model'        => 'required',
            'year'        => 'required',
            'country'        => 'required',
        ]);

        $car              = new Car();
        $car->manufacturer       = $request->input('manufacturer');
        $car->model        = $request->input('model');
        $car->year        = $request->input('year');
        $car->country       = $request->input('country');
        $car->save();

        return redirect(route('home'))->with('success', 'New Car Created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        return view('posts.edit')->with('car', $car);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        $this->validate($request, [
            'manufacturer'       => 'required',
            'model'        => 'required',
            'year'        => 'required',
            'country'        => 'required',
        ]);

        $car->manufacturer       = $request->input('manufacturer');
        $car->model        = $request->input('model');
        $car->year        = $request->input('year');
        $car->country       = $request->input('country');
        $car->save();

        return redirect(route('home'))->with('success', 'Post Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect(route('home'))->with('success', 'Post Deleted.');
    }

    /**
     * CSV VIEW
     */
    public function csvView()
    {
        return view('posts.csv');
    }
    /** 
     * CSV UPLOAD
     */
    public function csvUpload(Request $request)
    {

        if ($request->hasFile('file')) {

            $file = $request->file('file');

            // File Details 
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $tempPath = $file->getRealPath();
            $fileSize = $file->getSize();
            $mimeType = $file->getMimeType();

            // Valid File Extensions
            $valid_extension = array("csv");

            // 2MB in Bytes
            $maxFileSize = 2097152;

            // Check file extension
            if (in_array(strtolower($extension), $valid_extension)) {

                // Check file size
                if ($fileSize <= $maxFileSize) {

                    // File upload location
                    $location = 'uploads';

                    // Upload file
                    $file->move($location, $filename);

                    // Import CSV to Database
                    $filepath = public_path($location . "/" . $filename);

                    // Reading file
                    $file = fopen($filepath, "r");

                    $importData_arr = array();
                    $i = 0;

                    while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                        $num = count($filedata);
                        //dd($filedata);
                        // Skip first row (Remove below comment if you want to skip the first row)
                        // if ($i == 0) {
                        //     $i++;
                        //     continue;
                        // }
                        for ($c = 0; $c < $num; $c++) {
                            $importData_arr[$i][] = $filedata[$c];
                        }
                        $i++;
                    }
                    fclose($file);

                    // Insert to MySQL database
                    foreach ($importData_arr as $importData) {

                        $insertData = array(
                            "manufacturer" => $importData[1],
                            "model" => $importData[2],
                            "year" => $importData[3],
                            "country" => $importData[4]
                        );
                        //Page::insertData($insertData);
                        Car::create($insertData);
                    }
                    return redirect(route('home'))->with('success', 'CSV Updated.');
                } else {
                    return redirect(route('csv'))->with('warning', 'File too large. File must be less than 2MB.');
                }
            } else {
                return redirect(route('csv'))->with('warning', 'Invalid File Extension.');
            }
        }
    }
}
