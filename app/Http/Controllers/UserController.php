<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Exports\ExportUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->user(request(['search']))->paginate(5);
        $rank = $users->firstItem();
        $title = 'Dashboard User';
        return view('users.index', [
            'users'  => $users,
            'rank'   => $rank,
            'title'  => $title,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Add User';
        return view('users.create', [
            'title' => $title,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|min:5|max:20',
            'email'     => 'required|email:dns',
            'password'  => 'required|min:6|max:20'
        ]);

        User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password)
        ]);

        alert()->success('Success', 'New User Successfully Added');
        return redirect('/admin/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $title  = 'Detail User';
        return view('users.details', compact('user', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $title = 'Edit User';
        return view('users.edit', compact('user', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'  => 'required|min:5|max:20',
            'email' => 'required|email:dns'
        ]);

        User::where('id', $user->id)
            ->update([
                'name'  => $request->name,
                'email' => $request->email
            ]);

        alert()->success('Success', $user->name . ' Successfully Has Been Edit');
        return redirect('/admin/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        alert()->success('Success', $user->name . ' Has Been Delete');
        return redirect('/admin/user');
    }

    public function deleted()
    {
        $userDeleted = User::onlyTrashed()->get();

        return view('users.deleted', [
            'userDeleted'   => $userDeleted,
            'title'         => 'User Deleted',
        ]);
    }

    public function restore($id)
    {
        $details = User::withTrashed()->where('id', $id)->first();
        $details->restore();
        alert()->success('Successfully user has been restore');
        return redirect()->back();
    }

    public function exportPdf($id)
    {
        $user = User::where('id', $id)->first();

        $data = [
            'data'  => str('User ')->append($user->name),
            'user'  => $user,
        ];

        $pdf = PDF::loadView('users.print', $data);
        $pdf->setPaper('A4', 'potrait');
        return $pdf->stream($data['data'] . '.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new ExportUser, 'user.xlsx');
    }
}