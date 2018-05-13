@foreach($teste as $teste)
    <ul>
    <li>{{ $teste->nome }}</li>
    <li>{{ $teste->duracao }}</li>
    </ul>

    @endforeach