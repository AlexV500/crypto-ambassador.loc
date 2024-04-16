<div>
    <form action="{{route('admin.menu.menuitem.binditem', $menuItemId)}}" method="POST" class="w-25">
        @csrf
    <label>URL зовнішньої сторінки</label>
    <div class="form-group">
        <input type="input" class="form-control" name="url" value="{{ old('url') }}"
               placeholder="URL зовнішньої сторінки">
        @error('url')
        <div class="text-danger">{{ $message }}</div>
        @enderror()
    </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Змінити">
        </div>
    </form>
</div>
