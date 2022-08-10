@extends('layouts.main')

@section('title')
    {{__('string.list_title')}}
@endsection

@section('content')
    <div class="row mb-5">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row">
                        <h1>{{__('string.edit_actor')}}</h1>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-6">
                        <form name="create_actor" action="{{ route('actors.update',$actor) }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="actorName" class="form-label">{{__('string.actor_name')}}</label>
                                <input id="actorName" name="actorName" type="text"
                                       placeholder="{{__('string.actor_name')}}" class="form-control" value="{{$actor->name}}" required>
                            </div>

                            <div class="mb-3">
                                <label for="actorSurname" class="form-label">{{__('string.actor_surname')}}</label>
                                <input id="actorSurname" name="actorSurname" type="text"
                                       placeholder="{{__('string.actor_surname')}}" class="form-control" value="{{$actor->surname}}" required>
                            </div>

                            <div class="mb-3">
                                <label for="actorDate" class="form-label">{{__('string.actor_date')}}</label>
                                <input id="actorDate" name="actorDate" type="date"
                                       placeholder="{{__('string.actor_date')}}" class="form-control" value="{{$actor->date}}" required>
                            </div>

                            <div class="mb-3">
                                <label for="actorNationality" class="form-label">{{__('string.actor_nationality')}}</label>
                                </br>
                                <select name="actorNationality" id="actorNationality" class="form-select" aria-label="Default select example">
                               
                                    @foreach($nationalities as $nationality)
                                    @if($nationality->id == $actor->nationality)
                                        <option selected value="{{$nationality->id}}">{{$nationality->name}}</option>
                                        @else
                                        <option value="{{$nationality->id}}">{{$nationality->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <input type="submit" value="{{__('string.edit_btn')}}" class="btn btn-primary" name="createBtn">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
