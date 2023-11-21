<div class="container">
    <h3>Employee added successfully!!!!</h3>
    <p><strong>Title : </strong>{{ $mailData['title'] }}</p>
    <p><strong>Username : </strong>{{ $mailData['username'] }}</p>
    <p><strong>Email : </strong>{{ $mailData['email'] }}</p>
    <p><strong>Password : </strong>{{ $mailData['password'] }}</p>
    <p><strong>Link : </strong><a href="{{ url('emp/login') }}">{{ route('emp.login') }}</a></p>
    <p>Hii dear, Use these Credentials and start your Work.</p>
    <p>Thank You!! &#128512;</p>
</div>
