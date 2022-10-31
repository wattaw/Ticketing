<form action="/demo" method="POST">
    {{-- @csrf
    @foreach($users as $user)
    <label>Item 1</label>
    <input type="text" name="item[{{$loop->index}}][name]" value="{{$user}}" />
    <input type="text" name="item[{{$loop->index}}][qty]" value="10"/>
    <br>
    <br>
    @endforeach --}}
    @csrf
    @foreach($event_details as $event_detail)
    <label>Item 1</label>
    <input type="text" name="item[{{$loop->index}}][name]" value="{{$event_detail->ticket_name}}" />
    <input type="hidden" name="item[{{$loop->index}}][event_id]" value="{{$event_detail->event_id}}" />
    <input type="text" name="item[{{$loop->index}}][qty]" value="0"/>
    <br>
    <br>
    @endforeach
    <button type="submit">Submit</button>
</form>
{{-- <h1>user page</h1>

@foreach ($users as $user)
    <h1>{{$user}}</h1>
    
@endforeach --}}