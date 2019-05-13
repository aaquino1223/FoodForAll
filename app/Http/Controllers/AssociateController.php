<?php

namespace App\Http\Controllers;

use App\AssociateType;
use App\Associate;
use App\Follower;
use App\User;
use Illuminate\Http\Request;

class AssociateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index(int $id)
    {
        $user = User::find($id);
        $association = Associate::where('RecipientId', $user->UserId)->where('RequesterId', auth()->user()->UserId)->first();
        if ($association == null) {
            $association = Associate::where('RequesterId', $user->UserId)->where('RecipientId', auth()->user()->UserId)->first();
        }
        $follower = Follower::where('UserId', $user->UserId)->where('FollowerId', auth()->user()->UserId)->first();
        return view('profile.associates', compact('user', 'association', 'follower'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create(int $id)
    {
        $recipient = User::find($id);
        $requester = auth()->user();
        $associateType = AssociateType::find(($recipient->IsOrganization && $requester->IsOrganization) ||
            (!$recipient->IsOrganiztion && !$requester->IsOrganization) ? 1 : 2);

        $associate = new Associate;
        $associate->AssociateTypeId = $associateType->AssociateTypeId;
        $associate->RecipientId = $recipient->UserId;
        $associate->RequesterId = $requester->UserId;
        $associate->RequestedDate = date("Y-m-d H:i:s");
        $associate->save();

        if (!$requester->IsOrganization) {
            //Auto create follow if not an organization
            $follower = Follower::firstOrNew(['UserId' => $recipient->UserId, 'FollowerId' => $requester->UserId]);
            if ($follower->FollowDate == null) {
                $follower->FollowDate = date("Y-m-d H:i:s");
                $follower->save();
            }
        }

        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $user = User::find($request->route('profile'));
        $association = Associate::where('RecipientId', $user->UserId)->where('RequesterId', auth()->user()->UserId)->first();
        if ($association == null) {
            $association = Associate::where('RequesterId', $user->UserId)->where('RecipientId', auth()->user()->UserId)->first();
        }

        if ($request->submit == 'Accept') {
            $association->Accepted = true;
            $association->AcceptedDate = date("Y-m-d H:i:s");
            $association->save();
        }
        else if ($request->submit == 'Decline' || $request->submit == 'DeleteRequest' || $request->submit == 'Unassociate') {
            $association->delete();
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
