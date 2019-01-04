@if($errors->all())
    <div class="alert alert-danger">
        <p>Ops!!</p>
        <ul>
            @foreach($errors->all() as $error)
                <li>{!! $error !!}</li>
            @endforeach
        </ul>
    </div>
@endif