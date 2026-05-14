<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    private function getCandidates()
    {
        return session('candidates', []);
    }

    public function index()
    {
        $items = $this->getCandidates();
        $grouped = collect($items)->groupBy('position');
        return view('items.index', compact('grouped'));
    }

    public function show($id)
    {
        $items = $this->getCandidates();
        $item = collect($items)->firstWhere('id', $id);
        if (!$item) abort(404);
        return view('items.show', compact('item'));
    }

    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        $items = $this->getCandidates();

        $imagePath = 'images/default.jpg';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images', $filename);
            $imagePath = 'storage/images/' . $filename;
        }

        $items[] = [
            'id' => count($items) + 1,
            'name' => $request->name,
            'position' => ucfirst(strtolower($request->position)),
            'party' => $request->party,
            'platform' => $request->platform,
            'image' => $imagePath
        ];

        session(['candidates' => $items]);

        return redirect('/items')->with('success', 'Candidate added!');
    }

    public function edit($id)
    {
        $items = $this->getCandidates();
        $item = collect($items)->firstWhere('id', $id);
        if (!$item) abort(404);
        return view('items.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $items = $this->getCandidates();

        foreach ($items as &$item) {
            if ($item['id'] == $id) {
                $item['name'] = $request->name;
                $item['position'] = ucfirst(strtolower($request->position));
                $item['party'] = $request->party;
                $item['platform'] = $request->platform;

                if ($request->hasFile('image')) {
                    $file = $request->file('image');
                    $filename = time() . '.' . $file->getClientOriginalExtension();
                    $file->storeAs('public/images', $filename);
                    $item['image'] = 'storage/images/' . $filename;
                }
            }
        }

        session(['candidates' => $items]);

        return redirect('/items')->with('success', 'Candidate updated!');
    }

    public function destroy($id)
    {
        $items = $this->getCandidates();

        $items = array_filter($items, function ($item) use ($id) {
            return $item['id'] != $id;
        });

        session(['candidates' => array_values($items)]);

        return redirect('/items')->with('success', 'Candidate deleted!');
    }

    public function vote($id)
    {
        return redirect()->back()->with('success', 'Vote submitted!');
    }
}
