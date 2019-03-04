@component('mail::message')
# Your comment has benn approved

You added a comment on <a href="{{$data['url']}}">{{$data['page']}}</a>.<br><br>
Comment: {{$data['comment']}}  <br>


@component('mail::button', ['url' => $data['url'].'#comments', 'color' => 'success'])
    Go to page
@endcomponent



Thanks,<br>
{{ config('app.name') }}
@endcomponent
