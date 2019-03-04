@component('mail::message')
# You have a new comment

Someone just added a comment on <a href="{{$data['url']}}">{{$data['page']}}</a>.<br><br>
Name: {{$data['user_name']}} <br>
Email: {{$data['user_email']}}<br>
Comment: {{$data['comment']}}  <br>


@component('mail::button', ['url' => route('admin.page.comments.approve',[$data['page_id'],$data['comment_id']]), 'color' => 'success'])
    Approve
@endcomponent

@component('mail::button', ['url' => route('admin.page.comments.delete',[$data['page_id'],$data['comment_id']]), 'color' => 'error'])
    Delete
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
