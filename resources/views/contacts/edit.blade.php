@extends('layouts.app_api')


<div class="container">
    <h2>Edit contact  id:{{ $contact->id }}</h2>
    <a href="{{ url('contacts') }}" class="btn btn-primary mb-3">list contacts</a>
	@extends('contacts.form')
</div>
