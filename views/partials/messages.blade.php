@foreach(['success'=>'success','error'=>'danger','warning'=>'warning'] as $messageType => $messageClass)
    @if(Session::get($messageType))
        <div class="alert alert-{{{$messageClass}}}">
            {{ Session::get($messageType) }}
        </div>
    @endif
    @if(Input::get($messageType))
        <div class="alert alert-{{{$messageClass}}}">
            {{ Input::get($messageType) }}
        </div>
    @endif
    @if(isset($$messageType))
        <div class="alert alert-{{{$messageClass}}}">
            {{ $$messageType }}
        </div>
    @endif
@endforeach