<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Service\Cable;
use App\Models\Service\Internet;
use App\Models\Service\Landline;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isadmin');
    }

    protected function getServices()
    {
        $data = [
            'packages'  => [],
            'cable'     => [],
            'internet'  => [],
            'landline'  => []
        ];

        foreach (Package::all() as $row)
            array_push($data['packages'], $row);

        foreach (Cable::all() as $row)
            array_push($data['cable'], $row);

        foreach (Internet::all() as $row)
            array_push($data['internet'], $row);

        foreach (Landline::all() as $row)
            array_push($data['landline'], $row);

        return $data;
    }

    public function index()
    {
        return view('admin.services.list')->with('services', $this->getServices());
    }

    public function create($service)
    {
        if ($service == 'cable')
            return view('admin.services.update.cable');

        if ($service == 'internet')
            return view('admin.services.update.internet');

        if ($service == 'landline')
            return view('admin.services.update.landline');

        return back()->with('err', "Service $service not found");
    }

    public function create_post(Request $request, $service)
    {
        if ($service == 'cable')
            return $this->create_cable($request);

        if ($service == 'internet')
            return $this->create_internet($request);

        if ($service == 'landline')
            return $this->create_landline($request);

        return $this->index();
    }

    protected function create_cable(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'          => ['required', 'string', 'max:255'],
            'channel_count' => ['required', 'numeric', 'min:0', 'max:9999'],
            'price'         => ['required', 'numeric', 'min:0']
        ]);

        if ($validator->fails())
            return back()->withErrors($validator);
        $cable = Cable::create([
            'name'              => $request->input('name'),
            'description'       => $request->input('description'),
            'max_num_channels'  => $request->input('channel_count'),
            'id_created_by'     => $request->input('author'),
            'price' => $request->input('price')
        ]);

        if ($cable->save())
            return redirect('/admin/services')
                ->with('services', $this->getServices())
                ->with('action_status', 'success')
                ->with('action_msg', 'User created');

        return back()->with('fail', 'There was an error creating the service, please try again');
    }

    protected function create_internet(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      => ['required', 'string', 'max:255'],
            'bandwidth' => ['required', 'numeric', 'min:0', 'max:1000'],
            'price'     => ['required', 'numeric', 'min:0']
        ]);

        if ($validator->fails())
            return back()->withErrors($validator);

        $internet = Internet::create([
            'name'          => $request->input('name'),
            'bandwidth'     => $request->input('bandwidth'),
            'id_created_by' => $request->input('author'),
            'description'   => $request->input('description'),
            'price'         => $request->input('price'),
        ]);

        if ($internet->save())
            return redirect('/admin/services')
                ->with('services', $this->getServices())
                ->with('action_status', 'success')
                ->with('action_msg', 'User created');

        return back()->with('fail', 'There was an error creating the service, please try again');
    }

    protected function create_landline(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'  => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0']
        ]);

        if ($validator->fails())
            return back()->withErrors($validator);

        $landline = Landline::create([
            'name' => $request->input('name'),
            'id_created_by' => $request->input('author'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'phone_number' => rand(1000, 99999999)
        ]);

        if ($landline->save())
            return redirect('/admin/services')
                ->with('services', $this->getServices())
                ->with('action_status', 'success')
                ->with('action_msg', 'User created');

        return back()->with('fail', 'There was an error creating the service, please try again');
    }

    protected function update($service, $id)
    {
        if ($service == 'cable')
            return view('admin.services.update.cable', [
                'service' => Cable::find($id)
            ]);

        if ($service == 'internet')
            return view('admin.services.update.internet', [
                'service' => Internet::find($id)
            ]);

        if ($service == 'landline')
            return view('admin.services.update.landline', [
                'service' => Landline::find($id)
            ]);

        return back()->with('err', "Service $service not found");
    }

    protected function update_post(Request $request, $service, $id)
    {
        if ($service == 'cable')
            return $this->create_cable($request, $id);

        if ($service == 'internet')
            return $this->create_internet($request, $id);

        if ($service == 'landline')
            return $this->create_landline($request, $id);

        return $this->index();
    }

    protected function update_cable(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name'          => ['required', 'string', 'max:255'],
            'channel_count' => ['required', 'numeric', 'min:0', 'max:9999'],
            'price'         => ['required', 'numeric', 'min:0']
        ]);

        if ($validator->fails())
            return back()->withErrors($validator);

        $cable = Cable::find($id);
        $cable->name             = $request->input('name');
        $cable->description      = $request->input('description');
        $cable->max_num_channels = $request->input('channel_count');
        $cable->id_created_by    = $request->input('author');
        $cable->price            = $request->input('price');

        if ($cable->save())
            return redirect('/admin/services')
                ->with('services', $this->getServices())
                ->with('action_status', 'success')
                ->with('action_msg', 'User created');

        return back()->with('fail', 'There was an error creating the service, please try again');
    }

    protected function update_internet(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name'      => ['required', 'string', 'max:255'],
            'bandwidth' => ['required', 'numeric', 'min:0', 'max:1000'],
            'price'     => ['required', 'numeric', 'min:0']
        ]);

        if ($validator->fails())
            return back()->withErrors($validator);

        $internet = Internet::find($id);
        $internet->name          = $request->input('name');
        $internet->bandwidth     = $request->input('bandwidth');
        $internet->id_created_by = $request->input('author');
        $internet->description   = $request->input('description');
        $internet->price         = $request->input('price');

        if ($internet->save())
            return redirect('/admin/services')
                ->with('services', $this->getServices())
                ->with('action_status', 'success')
                ->with('action_msg', 'User created');

        return back()->with('fail', 'There was an error creating the service, please try again');
    }

    protected function update_landline(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name'  => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0']
        ]);

        if ($validator->fails())
            return back()->withErrors($validator);

        $landline = Landline::find($id);
        $landline->name = $request->input('name');
        $landline->id_created_by = $request->input('author');
        $landline->description = $request->input('description');
        $landline->price = $request->input('price');
        $landline->phone_number = $request->input('phone_number');

        if ($landline->save())
            return redirect('/admin/services')
                ->with('services', $this->getServices())
                ->with('action_status', 'success')
                ->with('action_msg', 'User created');

        return back()->with('fail', 'There was an error creating the service, please try again');
    }
}
