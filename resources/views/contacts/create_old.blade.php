@extends('layouts.app_api')

<div class="container">
    <h2>Create contacts</h2>
    <form action="{{ route('contacts.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">name</label>
            <input type="text" class="form-control" name="name" value="{{old("name")}}">
            @error("name")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="phone" class="form-label">phone</label>
            <input type="text" class="form-control" name="phone" value="{{old("phone")}}">
            @error("phone")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="comment" class="form-label">comment</label>
            <input type="text" class="form-control" name="comment" value="{{old("comment")}}">
            @error("comment")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="email" class="form-label">email</label>
            <input type="text" class="form-control" name="email" value="{{old("email")}}">
            @error("email")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>