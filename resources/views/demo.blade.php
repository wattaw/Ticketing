<form action="/demo" method="POST">
    {{-- @csrf
    @foreach ($users as $user)
    <label>Item 1</label>
    <input type="text" name="item[{{$loop->index}}][name]" value="{{$user}}" />
    <input type="text" name="item[{{$loop->index}}][qty]" value="10"/>
    <br>
    <br>
    @endforeach --}}
    @csrf
    @foreach ($event_details as $event_detail)
        <label>{{ $event_detail->ticket_name }}</label>
        <input type="hidden" name="item[{{ $loop->index }}][name]" readonly value="{{ $event_detail->ticket_name }}" />
        <input type="hidden" name="item[{{ $loop->index }}][event_id]" readonly value="{{ $event_detail->event_id }}" />
        <input type="number" name="item[{{ $loop->index }}][qty]" value="0" min="0" max="10"/>
        {{-- <select id="quantity" name="item[{{ $loop->index }}][qty]">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option> --}}
            <br>
            <br>
    @endforeach
    <button type="submit">Submit</button>
</form>
{{-- <h1>user page</h1>

@foreach ($users as $user)
    <h1>{{$user}}</h1>
    
@endforeach --}}
