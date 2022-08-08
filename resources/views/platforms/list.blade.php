@if(count($platforms) > 0)

    <div class="col-md-6">
        <form action="" method="post">
            @csrf
            <input id="platformName" name="platformName" class="form-control" value="@isset($platformName) {{$platformName}} @endisset"
                    placeholder="{{__('string.search_platform_name_placeholder')}}">
            <button type="submit" class="btn btn-primary">{{__('string.search_btn')}}</button>
        </form>

    </div>

    <table class="table table-striped align-items-center table-flush">

        <thead>
        <tr>
            <th>{{'string.id_header'}}</th>
            <th>{{'string.name_header'}}</th>
            <th>{{'string.actions_header'}}</th>
        </tr>
        </thead>

        <tbody>
            @foreach($platforms as $platform)
            <tr>
                <td>
                    {{$platform->id}}
                </td>

                <td>
                    {{$platform->name}}
                </td>

                <td>
                    <a href="{{ route('platforms.edit', $platform) }}">
                        <i class="fa fa-edit"></i>
                    </a>

                    <form id="delete-form-{{ $platform->id }}"
                            action="{{ route('platforms.delete', [$platform]) }}"
                            method="post" style="display: inline-block">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <a href="javascript:void(0);"
                            onclick="event.preventDefault()
                                        document.getElementById('delete-form-{{ $platform->id }}').submit()">
                            <i class="fa fa-trash-alt"></i>

                        </a>
                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>

    </table>
@else
    <div class="alert alert-warning mt-3">
        {{__('string.no_platforms')}}
    </div>

@endif
