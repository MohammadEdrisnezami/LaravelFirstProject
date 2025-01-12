<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">
</head>
<body>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    @if (session('warning'))
    <div class="alert alert-warning">
        {{ session('warning') }}
    </div>
    @endif

    <div class="content card w-50 m-auto mt-5 rounded ">
        <form action="{{ isset($EditNote) ? url('/update/' . $id) : url('/save') }}" method="post">
            @csrf
            @if(isset($EditNote))
            @method("PUT")
            @endif

            <div class="row p-2 mt-2 ">
                <div class="col-12">
                    <label for="note">Note</label>
                    <input
                        type="text"
                        name="note"
                        value="{{ old('note', isset($EditNote) ? $EditNote->note : '') }}"
                        class="form-control @error('note') is-invalid @enderror"
                        id="note"
                        placeholder="Enter your Note">
                    @error('note')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="row p-2 mt-2">
                <div class="col-10">
                    <button type="submit" class="btn btn-primary">
                        {{ isset($EditNote) ? 'Update Note' : 'Save Note' }}
                    </button>
                </div>
            </div>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($note as $showNote)
                <tr>
                    <th scope="row">{{$showNote->id}}</th>
                    <td>{{$showNote->note}}</td>
                    <td><a onclick=" return  confirm('Are you sure you want to delete this note?')" href="{{route('delete',['id'=>$showNote->id])}}">Delete</a>|<a href="{{route('edit',['id'=>$showNote->id])}}">Edit</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/popper.min.js"></script>
    <script type="text/javascript">
        $("document").ready(function() {
            setTimeout(function() {
                $("div.alert").remove();
            }, 2000);
        });
    </script>
</body>
</html>