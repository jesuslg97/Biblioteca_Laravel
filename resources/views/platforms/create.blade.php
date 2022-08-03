<form name="create_platform" action="{{ route('platform.store') }}" method="post">
    @csrf
    <div class="mb-3">
        <label for="platformName" class="form-label">{{__('string.name_header')}}</label>
        <input id="platformName" name="platformName" type="text"
               placeholder="{{__('string.name_placeholder')}}" class="form-control" required>
    </div>
    <input type="submit" value="{{__('string.create_bn')}}" class="btn btn-primary" name="createBtn">
</form>
