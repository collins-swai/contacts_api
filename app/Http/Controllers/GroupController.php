<?php

namespace App\Http\Controllers;
use App\Models\Group;

use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        // $groups = Group::all();
        // return response()->json($groups);
        $groups = Group::with('contacts')->get();
        return response()->json($groups);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'contacts' => 'array',
        ]);

        $group = new Group([
            'name' => $request->input('name'),
            'user_id' => auth()->user()->id,
        ]);

    

        $group->user_id = auth()->user()->id; // Set the user ID for the group.

        $group->save();

        return response()->json(['message' => 'Group created successfully'], 201);
    }

    public function show(Group $group)
    {
        return response()->json($group);
    }

    public function update(Request $request, Group $group)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $group->update([
            'name' => $request->input('name'),
        ]);

        return response()->json(['message' => 'Group updated successfully']);
    }

    public function destroy(Group $group)
    {
        $group->delete();
        return response()->json(['message' => 'Group deleted']);
    }
}
