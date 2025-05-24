@extends('layouts.app_api')


@section('content')
 
<div class="container">
    <h2>Edit contact</h2>
    <!--  <form action="{{ route('contacts.update', $contact->id) }}" method="POST">  -->
    <form action="" method="POST">
        @method("PATCH")
        <div class="mb-3">
            <label for="name" class="form-label">name</label>
            <input type="text" class="form-control" name="name" value="{{old("name", $contact["name"])}}">
            @error("name")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="phone" class="form-label">phone</label>
            <input type="text" class="form-control" name="phone" value="{{old("phone", $contact["phone"])}}">
            @error("phone")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="comment" class="form-label">comment</label>
            <input type="text" class="form-control" name="comment" value="{{old("comment", $contact["comment"])}}">
            @error("comment")
                <p>{{$message}}</p>
            @enderror
        </div>
<div class="mb-3">
            <label for="email" class="form-label">email</label>
            <input type="text" class="form-control" name="email" value="{{old("email", $contact["email"])}}">
            @error("email")
                <p>{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        
    </form>
</div>

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
            console.log(111, data);
            
            var url = "{{ route('api.contacts.update', $contact->id) }}";
            
            // create the FormData object from the form context (this),
            // that will be present, since it is a form event
            //var formData = new FormData(this); 
            // build the ajax call
            
            $.ajax({
                url: url,
                //type: 'POST',
                type: 'PUT',
                data: JSON.stringify(data),
                dataType: 'json',
    			contentType: 'application/json; charset=utf-8',
                success: function (response) {
                    // handle success response
                    console.log(response.data);
                },
                error: function (response) {
                    // handle error response
                    console.log(response.data);
                },
            });
        })
	});
</script>
@endsection
