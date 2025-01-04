<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
    <div class="content card w-50 m-auto mt-5 rounded">
        @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}

        </div>
        @endif
        @if(session('error'))
        <div class="alert alert-danger">
            {{session('error')}}

        </div>
        @endif
        <form action="/save" method="post">
            @csrf
            <div class="row p-2 mt-2">
                <div class="col-10">
            <label for="note">Note</label>
            <input type="text" name="note"  class="form-control" id="note" placeholder="Enter your Note">
          @error('note')
             <p class="alert alert-danger">{{$message}}</p>
          @enderror
        </div>
            <div class="col-2">
             <button type="submit" class="btn btn-success mt-4 w-100">Save</button>
             </div>
             </div>
        </form>
    </div>

</body>
</html>