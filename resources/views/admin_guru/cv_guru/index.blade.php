@foreach($data as $i)
    <iframe src="/cv/cv_guru/{{ $i->file }}" frameborder="0" height="100%" width="100%" scrolling="auto"></iframe>
@endforeach
