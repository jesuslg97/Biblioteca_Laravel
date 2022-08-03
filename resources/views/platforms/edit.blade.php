<div class="card-body">
    @isset($platform)
        <form name="edit_platform" action="{{ route('platform.update', $platform) }}" method="post">
            @csrf
            @else
                <form name="create_platform" action="{{ route('platform.store') }}" method="post">
                    @csrf
                    @endisset
                    <div class="mb-3">
                        <label for="platformName" class="form-label">{{__('string.name_header')}}</label>
                        <input id="platformName" name="platformName" type="text"
                               placeholder="{{__('string.name_placeholder')}}" class="form-control" required
                            @isset($platform) value="{{ old('platformName', $platform->name) }}" @else value="{{ old('platformName') }}" @endisset>
                    </div>
                    <input type="submit" value="@isset($platform) {{__('string.save_bn')}} @else {{__('string.create_bn')}} @endisset"
                           class="btn btn-primary" name="createBtn">
                </form>
        </form>
</div>
