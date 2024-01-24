<div>

    <form class="form-inline">
        <select class="custom-select custom-select-sm" id="inlineFormCustomSelectPref">
            <option>Виберіть</option>
            @foreach ($locales as $index => $localeName)
                <option><a class="dropdown-item" href="{{ UrlLocal::localize($index, 'admin') }}">{{ $localeName }}</a></option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-primary btn-sm">+</button>
    </form>

</div>
