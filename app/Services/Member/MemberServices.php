<?php

namespace App\Services\Member;

use App\Models\Member;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;

class MemberServices
{
    // Member store
    public function memberStore($request)
    {
        try {
            if ($request->isMethod('POST')) {
                $member = new Member();
                $member->name =  $request->name;
                $member->designation =  $request->designation;
                $member->constituency =  $request->constituency;
                $member->party =  $request->party;
                $member->order =  $request->order;
                $member->status =  $request->status;
                if ($request->hasFile('member_profile') && $request->file('member_profile')->isValid()) {
                    $member->addMediaFromRequest('member_profile')->toMediaCollection('web_member_image');
                }
                if ($member->save()) {
                    Toastr::success("Member add successfully completed", "success");
                    return back();
                }
            }
        } catch (\Exception $e) {
            Toastr::error("Something went wrong", "error");
        }
    }

    //Member update
    public function memberUpdate($id, $request)
    {
        try {
            $member = Member::findOrFail(unlock($id));
            $edit_order = $member->order; // 2
            $change_order = $request->order; // 1
            if ($change_order <  $edit_order) {
                Member::where('order', '>=', $change_order)->where('order', '<', $edit_order)->update(['order' => DB::raw('`order` + 1')]);
            } else if ($change_order == $edit_order) {
                $member->order = $change_order;
            } else {
                Member::where('order', '<=', $change_order)->where('order', '>', $edit_order)->update(['order' => DB::raw('`order` - 1')]);
            }
            $member->name =  $request->name;
            $member->designation = $request->designation;
            $member->constituency = $request->constituency;
            $member->party = $request->party;
            $member->status = $request->status;
            $member->order = $change_order;
            if ($request->hasFile('member_profile') && $request->file('member_profile')->isValid()) {
                $member->clearMediaCollection('web_member_image');
                $member->addMediaFromRequest('member_profile')->toMediaCollection('web_member_image');
            }
            $member->save();
            Toastr::success("Update successfully completed");
            return back();
        } catch (\Exception $e) {
            Toastr::error("Something went wrong" . $e->getMessage(), "error");
            return back();
        }
    }
}
