<html>
@if(isset($name))
Họ tên: {{ $name }} <br>
@endif

@if(isset($email))
Email: {{ $email }} <br>
@endif

@if(isset($content))
Nội dung: {{ $content }} <br>
@endif
</html>