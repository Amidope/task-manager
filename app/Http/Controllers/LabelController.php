<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLabelRequest;
use App\Http\Requests\UpdateLabelRequest;
use App\Models\Label;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Redirect;

class LabelController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Label::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $labels = Label::all();
        return view('label.index', compact('labels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $label = new Label();
        return view('label.create', compact('label'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLabelRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        Label::create($validated);
        notify()->success(__('flashes.labels.store.success'));
        return Redirect::route('labels.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Label $label)
    {
        return view('label.edit', compact('label'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLabelRequest $request, Label $label)
    {
        $validated = $request->validated();
        $label->fill($validated)->save();
        notify()->success(__('flashes.statuses.updated'));
        return Redirect::route('labels.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Label $label)
    {
        if ($label->delete()) {
            notify()->success(__('flashes.statuses.deleted'));
        } else {
            notify()->success(__('flashes.statuses.delete.error'));
        }
        return to_route('labels.index');
    }
}
