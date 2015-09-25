@if($errors->all())
    <div class="alert alert-danger">
        <p>Favor corrigir os campos a seguir!!</p>
        <ul>
            @foreach($errors->all() as $error)
                <li>{!! $error !!}</li>
            @endforeach
        </ul>
    </div>
@endif