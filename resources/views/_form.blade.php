<div class="form-group row">
    <label for="fname" class="col-sm-2 col-form-label">Parent</label>
    <div class="col-sm-10">
        <select name="family_id" id="" class="form-control">
            <option value="">Nothing Parent</option>
            @forelse (App\Models\Family::pluck('name', 'id') as $key => $item)
                <option value="{{ $key }}" @isset($family) {{ ($family->family_id == $key) ? 'selected' : '' }} @endisset>{{ $item }}</option>
            @empty
            @endforelse
        </select>
    </div>
</div>
<div class="form-group row">
    <label for="fname" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="fname" placeholder="Name" name="name" @isset($family) value="{{ $family->name }}" @endisset>
    </div>
</div>