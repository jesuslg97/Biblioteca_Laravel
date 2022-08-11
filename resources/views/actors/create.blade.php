@extends('layouts.main')

@section('title')
    {{__('string.list_title')}}
@endsection

@section('content')
    <div class="container">
        <div class="row card shadow">

            <div class="col-12 text-center mt-3">
                <h1>{{__('string.create_actor')}}</h1>
            </div>

            <div class="offset-md-4 col-4 mt-3">
                <form name="create_actor" action="{{ route('actors.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="actorName" class="form-label">{{__('string.actor_name')}}</label>
                        <input id="actorName" name="actorName" type="text"
                               placeholder="{{__('string.actor_name')}}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="actorSurname" class="form-label">{{__('string.actor_surname')}}</label>
                        <input id="actorSurname" name="actorSurname" type="text"
                               placeholder="{{__('string.actor_surname')}}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="actorDate" class="form-label">{{__('string.actor_date')}}</label>
                        <input id="actorDate" name="actorDate" type="date"
                               placeholder="{{__('string.actor_date')}}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="actorNationality" class="form-label">{{__('string.actor_nationality')}}</label>
                        <br>
                        <select name="actorNationality" id="actorNationality" class="form-select" aria-label="Default select example">
                            <option selected>Elige una nacionalidad</option>
                            @foreach($nationalities as $nationality)
                                <option value="{{$nationality->id}}">{{$nationality->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12 text-center mb-2">
                        <input type="submit" value="{{__('string.create_bn')}}" class="btn btn-primary" name="createBtn">
                        <a class="btn btn-warning text-white" href="{{ url()->previous() }}">Volver</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
