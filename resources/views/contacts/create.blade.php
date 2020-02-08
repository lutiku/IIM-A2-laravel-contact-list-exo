@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Créer un contact</h3>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div align="rigth">
                    <a href="{{route('contacts.index')}}" class="btn btn-default">Back</a>

                </div>

                <form action="{{route('contacts.store')}} " method="post">
                    <!-- Protection csrf -->
                    @csrf
                    <!-- Méthode HTTP pour la route -->
                     @method('PUT')

                    <!-- fonction old('nom de l'inpt') qui rcupère la valeur du formulaire après la validation -->
                    <input type="text" name="name" value="{{old('name', 'insert name')}}">


                    @error('name')
                    {{$message}}
                    @enderror

                    <input type="text" name="tel" value="{{old('tel', 'insert tel')}}">

                    <input type="text" name="email" value="{{old('email', 'insert email')}}">

                    <button type="submit" name="add">Submit</button>






                <!-- TODO mise en place de la form pour créer un contact -->

                </form>
            </div>
        </div>
    </div>
@endsection
