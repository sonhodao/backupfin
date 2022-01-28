<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminMenuItem;
use App\Http\Requests\MenuItemUpdate;
use Illuminate\Http\JsonResponse;

class AdminMenuItemController extends Controller
{
    //
    public function index(Request $request)
    {
        $menuItems = AdminMenuItem::filter($request->all())
        ->paginate(10);

        return view('admin_menu_items.index', compact('menuItems'));
    }

    public function edit($id)
    {
        $menuItem = AdminMenuItem::findOrFail($id);
        return view('admin_menu_items.form', compact('menuItem'));
    }

    public function update(MenuItemUpdate $request,$id)
    {
        $data = $request->validated();
        $menuItem = AdminMenuItem::findOrFail($id);
        $menuItem->update($data);
        return redirect()->route('menu_items.index')->with('success','Cập nhật thành công');
    }
    public function quickUpdate(Request $request): JsonResponse
    {
        $this->authorize('menu_items.update');
        $type = $request->input('type');
        $value = $request->input('value');
        $id = $request->input('id');
        $dataUpdate = [$type => $value];
        $result = AdminMenuItem::where('id', '=', $id)
            ->withoutGlobalScope('published')
            ->update($dataUpdate);

        if ($result) {
            return response()->json(['status' => 1]);
        } else {
            return response()->json(['status' => 0]);
        }
    }
}
