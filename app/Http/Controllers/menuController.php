<?php

namespace App\Http\Controllers;

use App\Models\menuModel;
use Illuminate\Http\Request;

class menuController extends Controller
{
    public function index()
    {
        $menus = menuModel::all();

        // Bobot kriteria (bisa juga ambil dari DB, ini contoh statis)
        $weights = [
            'price' => 0.4,      // cost = harga, bobot 0.4
            'order_count' => 0.6 // benefit = jumlah pesanan, bobot 0.6
        ];

        // 1. Normalisasi data berdasarkan WP
        // Ambil nilai terbaik dan terburuk untuk masing-masing kriteria
        $priceValues = $menus->pluck('price');
        $orderCountValues = $menus->pluck('order_count');

        $minPrice = $priceValues->min();      // karena cost, min terbaik
        $maxOrder = $orderCountValues->max(); // benefit, max terbaik

        // Hitung nilai vektor S untuk tiap menu
        $results = [];
        foreach ($menus as $menu) {
            // Untuk kriteria cost (harga), pakai min / nilai
            $priceScore = pow($minPrice / $menu->price, $weights['price']);

            // Untuk kriteria benefit (order_count), pakai nilai / max
            $orderScore = pow($menu->order_count / $maxOrder, $weights['order_count']);

            // Hitung skor WP (vektor S)
            $S = $priceScore * $orderScore;

            $results[] = [
                'menu' => $menu,
                'score' => $S
            ];
        }

        // Urutkan descending berdasar score tertinggi
        usort($results, fn($a, $b) => $b['score'] <=> $a['score']);

        return view('menus.index', compact('results'));
    }

    // Tampilkan form tambah menu
    public function create()
    {
        return view('menus.create');
    }

    // Simpan menu baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'order_count' => 'required|integer|min:0',
        ]);

        menuModel::create($request->only('name', 'price', 'order_count'));

        return redirect()->route('menus.index')->with('success', 'Menu berhasil ditambahkan.');
    }

    // Tampilkan form edit
    public function edit(menuModel $menu)
    {
        return view('menus.edit', compact('menu'));
    }

    // Update menu
    public function update(Request $request, menuModel $menu)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'order_count' => 'required|integer|min:0',
        ]);

        $menu->update($request->only('name', 'price', 'order_count'));

        return redirect()->route('menus.index')->with('success', 'Menu berhasil diupdate.');
    }

    // Hapus menu
    public function destroy(menuModel $menu)
    {
        $menu->delete();
        return redirect()->route('menus.index')->with('success', 'Menu berhasil dihapus.');
    }
}
