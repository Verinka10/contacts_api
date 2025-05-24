@extends('layouts.app_api')

<div class="container">
<h2>Contacts list</h2>
<a href="{{ route('contacts.create') }}" class="btn btn-primary mb-3">Create contacts</a>
<table class="table">
    <thead>
        <tr><th>id</th>><th>name</th><th>phone</th><th>comment</th><th>email</th></tr>
    </thead>
    <tbody>
        @foreach ($contacts as $item)
                <tr>
                	<td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
<td>{{$item->phone}}</td>
<td>{{$item->comment}}</td>
<td>{{$item->email}}</td>
<td>
                        <a href="{{ route('contacts.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('api.contacts.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div style="color: red" class="errors"></div>
</div>



@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('form').on('submit', function (e) {
            e.preventDefault(); // prevent the form submit
			url = $(this)[0].action + '?token={{ \App\Http\Middleware\EnsureTokenIsValid::TEMP_ACCESS_TOKEN  }}';
            $.ajax({
                url: url,
                type: 'DELETE',
                success: function (response) {
                	location.reload();
                },
                error: function (response) {
                   	$('.result').text('');
                   	$('.errors').append(response.responseJSON ? response.responseJSON.message : response.statusText);
                    
                },
            });
        })
	});
</script>
@endsection