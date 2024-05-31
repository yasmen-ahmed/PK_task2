<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Other meta tags and CSS links -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body class="bg-light">
    <!-- Your content here -->
   <div>
        <div class="container text-center">
            <h1 class="m-5 p-2 text-center text-dark ">Clients</h1>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
        @endif

            <!-- Rest of your content -->
        </div>
        <div class="container">
         
        <div class="m-auto ">
                <div>
                    <a href="{{ route('clients.create') }}" class="btn bg-white p-3 m-2 btn-lg"  >
                        <i class="fa-solid fa-circle-plus fa-lg" style="color: #000000;"></i>
                        Create Client</a>

                </div>
                
            
            </div>
            <div class="bg-white p-5 table-responsive card ">
                <table class="table table-striped table-hover table-borderless">
                <thead>
            <tr>
                <th><a href="{{ route('clients.index', ['sort' => 'full_name_en']) }}">Name (EN)</a></th>
                <th><a href="{{ route('clients.index', ['sort' => 'full_name_ar']) }}">Name (AR)</a></th>
                <th><a href="{{ route('clients.index', ['sort' => 'user_name']) }}">User Name</a></th>
                <th><a href="{{ route('clients.index', ['sort' => 'email']) }}">Email</a></th>
                <th><a href="{{ route('clients.index', ['sort' => 'mobile']) }}">Mobile</a></th>
                <th><a href="{{ route('clients.index', ['sort' => 'country']) }}">Country</a></th>
                <th>Actions</th>
            </tr>
        </thead>
                    <tbody>
                        @foreach ($clients as $client)
                        <tr class="rounded-6">
                            <td>{{ $client->full_name_en }}</td>
                            <td>{{ $client->full_name_ar }}</td>
                            <td>{{ $client->user_name }}</td>
                            <td>{{ $client->email }}</td>
                            <td>{{ $client->mobile }}</td>
                            <td>{{ $client->country }}</td>
                            <td>
                              
                                    <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-outline-info btn-sm px-3">
                                        <i class="fa fa-edit" style="color: #230B34;"></i> Edit
                                    </a>
                                    <a href="{{ route('clients.show', $client->id) }}" class="btn btn-outline-info btn-sm px-3">
                                        <i class="fa fa-eye" style="color: #230B34;"></i> show 
                                    </a>
                            
                                    <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm px-3"
                                            onclick="return confirm('Are you sure you want to delete this cli$client?')">
                                            <i class="fa-solid fa-trash fa-xs" style="color: #230B34;"></i> Delete
                                        </button>
                                    </form>
                                
                              
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
                {{ $clients->links() }}
            </div>
        
        </div>
   </div>
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>