 
@section('content')
    <form>
    	@csrf
    	<input type="hidden" class="form-control" name="id" value="{{old("id", @$contact["id"])}}">
    	<input type="hidden" class="form-control" name="token" value="x">
        <div class="mb-3">
            <label for="name" class="form-label">name</label>
            <input type="text" class="form-control" name="name" value="{{old("name", @$contact["name"])}}">
            @error("name")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="phone" class="form-label">phone</label>
            <input type="text" class="form-control" name="phone" value="{{old("phone", @$contact["phone"])}}">
            @error("phone")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="comment" class="form-label">comment</label>
            <input type="text" class="form-control" name="comment" value="{{old("comment", @$contact["comment"])}}">
            @error("comment")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="email" class="form-label">email</label>
            <input type="text" class="form-control" name="email" value="{{old("email", @$contact["email"])}}">
            @error("email")
                <p>{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>

        <div style="color: red" class="errors"></div>
        <div style="color: green;" class="result"></div>
        
    </form>
@endsection

@section('script')
<script type="text/javascript">

	function getFormData($form){
        var unindexed_array = $form.serializeArray();
        var indexed_array = {};
    
        $.map(unindexed_array, function(n, i){
            indexed_array[n['name']] = n['value'];
        });
        return indexed_array;
    }
		
    $(document).ready(function() {
        $('form').on('submit', function (e) {
            e.preventDefault(); // prevent the form submit
            let data = getFormData($(this));
@if (isset($contact))
            let url = "{{ route('api.contacts.update', $contact->id) }}";
            let method = 'PUT';
@else
			let url = "{{ route('api.contacts.store') }}";
			let method = 'POST';
@endif
            $('.result').text('...');
            $('.errors').text('');
            $.ajax({
                url: url,
                type: method,
                data: JSON.stringify(data),
                dataType: 'json',
    			contentType: 'application/json; charset=utf-8',
                success: function (response) {
                	$('.result').text('ok');
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
