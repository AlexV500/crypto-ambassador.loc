<div>

    <form action="{{ route('admin.translate.content') }}" method="POST" class="form-inline">
        @csrf
        <input type="hidden" name="contentId" value="{{$contentId}}">
        <input type="hidden" name="contentTitle" value="{{$contentTitle}}">
        <input type="hidden" name="route" value="{{$route}}">
        <select name="locale" class="custom-select custom-select-sm" id="inlineFormCustomSelectPref">
            <option>Виберіть</option>
            @foreach ($locales as $index => $localeName)
                <option value="{{$index}}">{{ $localeName }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary btn-sm">+</button>
    </form>

</div>
<script>


</script>
