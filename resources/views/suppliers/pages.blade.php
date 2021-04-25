@if (count($nit))
    @foreach ($nit as $item)          
        <p class="p-2 border-bottom">{{$item->nit .' - '. $item->nit}}</p>
    @endforeach             
@endif
    