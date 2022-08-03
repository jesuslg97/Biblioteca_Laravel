@if(count($platforms) > 0)
    <table class="table table-striped align-items-center table-flush">

        <thead>
        <tr>
            <th>{{'string.id_header'}}</th>
            <th>{{'string.name_header'}}</th>
            <th>{{'string.actions_header'}}</th>
        </tr>
        </thead>

        <tbody>
            <tr>
                <td>
                    {{$platforms->id}}
                </td>

                <td>
                    {{$platforms->name}}
                </td>

                <td>
                    <a href="{{ route('platform.edit', $platforms) }}">
                        <i class="fa fa-edit"></i>
                    </a>

                    <form id="delete-form-{{ $platforms->id }}"
                            action="{{ route('platform.delete', [$platforms]) }}"
                            method="post" style="display: inline-block">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <a href="javascript:void(0);"
                            onclick="event.preventDefault()
                                        document.getElementById('delete-form-{{ $platforms->id }}').submit()">
                            <i class="fa fa-trash-alt"></i>

                        </a>
                    </form>
                </td>
            </tr>
        </tbody>

    </table>
@else
    <div class="alert alert-warning mt-3">
        {{__('string.no_platforms')}}
    </div>

@endif
