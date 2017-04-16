
@if (Session::has('info'))
<div class="alert alert-info" style="text-align:center" role="alert">
{{Session::get('info')}}
</div>
@endif
