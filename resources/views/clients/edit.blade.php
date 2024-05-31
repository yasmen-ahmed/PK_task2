
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Other meta tags and CSS links -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <!-- Your content here -->
    <br>
    <div class="container">
    <h1 class="m-3 p-2 text-center">Edit Client</h1>
    <div class="container border p-5 shadow-lg mb-5 bg-white rounded">
    <form action="{{ route('clients.update', $client->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
                <label for="full_name_en">English Name</label>
                <input type="text" class="form-control" id="full_name_en" name="full_name_en" value="{{ $client->full_name_en }}">
                @error('full_name_en')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
        </div>

        <div class="form-group">
                <label for="full_name_en">Arabic Name</label>
                <input type="text" class="form-control" id="full_name_ar" name="full_name_ar" value="{{ $client->full_name_ar }}">
                @error('full_name_ar')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
        </div>

        <div class="form-group">
                <label for="user_name">User Name</label>
                <input type="text" class="form-control" id="user_name" name="user_name" value="{{ $client->user_name }}">
                @error('user_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $client->email }}">
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="mobile">Mobile</label>
                <input type="phone" class="form-control" id="mobile" name="mobile" value="{{ $client->mobile}}">
                @error('mobile')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label for="country">Country</label>
                <select name="country" id="country" >
                    @foreach ($countries as $country)
                    <option value="{{ $country }}" {{ $client->country == $country ? 'selected' : null}}>{{ $country }}</option>
                    @endforeach
                        </select>
                @error('country')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
          
        

      
        
        <button type="submit" class="btn btn-outline-info">Update client</button>
        <a href="{{ route('clients.index') }}" class="btn btn-outline-secondary">Back</a>
    </form>
    </div>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
