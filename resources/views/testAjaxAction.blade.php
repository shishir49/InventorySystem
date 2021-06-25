@foreach($data as $d)
<div class="">
    <h3>{{$d->product_name}}</h3>
    <p>{{$d->product_price}}</p>
</div>
@endforeach 

{!! $data->links() !!}