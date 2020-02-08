@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-header">Mise à jour <b>{{$contacts->name}}</b> </div>
                <div class="card-body">



                    <div align="right">
                        <a href="{{route('contacts.index')}}" class="btn btn-defult">Back</a>
                    </div>

                    <form action="{{route('contact.update', $contacts->id)}}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="name">Name</label>

                            <input name="name" type="text"
                                   class="form-control @error('name') is-invalid @enderror" id="name"
                                   placeholder="Modifier le nom"
                                   value="{{  old('name', $contacts->name) }}">

                            @error('name')
                            <div class="invalid-feedback">
                                Le nom est requis ou est trop long
                            </div>
                            @enderror
                        </div>


                        <!-- Numérà de téléphone -->
                        <div class="form-group">
                            <label for="tel">Numéro</label>
                            <input class="form-control @error('tel') is-invalid @enderror" name="tel"
                                      id="tel">{{old('content', $contacts->tel)}}</input>
                            @error('tel')
                            <div class="invalid-feedback">
                                Le contenu ne peut pas être vide
                            </div>
                            @enderror
                        </div>

                        <!-- e-mail -->
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input class="form-control @error('email') is-invalid @enderror" name="email" type="email"
                                   id="email">{{old('email', $contacts->email)}}</input>
                            @error('email')
                            <div class="invalid-feedback">
                                Le contenu ne peut pas être vide
                            </div>
                            @enderror
                        </div>



                        <button name="edit" type="submit" class="btn btn-primary">Mettre à jour</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
