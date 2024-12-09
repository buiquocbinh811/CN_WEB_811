<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MedicinesController extends Controller
{
    // Hiển thị danh sách dữ liệu
    public function index()
    {
        // Gọi dữ liệu từ model Medicine
        $medicines = \App\Models\Medicine::all();

        // Trả về view hiển thị danh sách thuốc
        return view('medicines.index', compact('medicines'));
    }

    // Hiển thị form thêm mới
    public function create()
    {
        return view('medicines.create');
    }

    // Xử lý logic thêm dữ liệu
    public function store(Request $request)
    {
        // Validate dữ liệu
        $validated = $request->validate([
            'name' => 'required|max:255',
            'brand' => 'nullable|max:100',
            'dosage' => 'required|max:50',
            'form' => 'required|max:50',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        // Lưu dữ liệu vào database
        \App\Models\Medicine::create($validated);

        return redirect()->route('medicines.index')->with('success', 'Thuốc đã được thêm thành công!');
    }

    // Hiển thị chi tiết 1 bản ghi
    public function show($id)
    {
        $medicine = \App\Models\Medicine::findOrFail($id);
        return view('medicines.show', compact('medicine'));
    }

    // Hiển thị form chỉnh sửa
    public function edit($id)
    {
        $medicine = \App\Models\Medicine::findOrFail($id);
        return view('medicines.edit', compact('medicine'));
    }

    // Xử lý logic cập nhật dữ liệu
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'brand' => 'nullable|max:100',
            'dosage' => 'required|max:50',
            'form' => 'required|max:50',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        $medicine = \App\Models\Medicine::findOrFail($id);
        $medicine->update($validated);

        return redirect()->route('medicines.index')->with('success', 'Thuốc đã được cập nhật thành công!');
    }

    // Xử lý logic xóa dữ liệu
    public function destroy($id)
    {
        $medicine = \App\Models\Medicine::findOrFail($id);
        $medicine->delete();

        return redirect()->route('medicines.index')->with('success', 'Thuốc đã được xóa thành công!');
    }
}
