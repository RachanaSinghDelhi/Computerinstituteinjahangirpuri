
    
    <h1 class="display-5">Courses</h1>
    @forelse ($courses as $course)
        <p><a  href="{{url('/courses/' . $course->course_url)}}">{{ $course->course_name }}</a></p>
    @empty
        <p>No recent posts available.</p>
    @endforelse
    
    <hr>


          
    <h1 class="display-5">Recent Posts</h1>
                @forelse ($latestPosts as $post)
        <p><a  href="{{ route('posts.show', $post->url) }}">{{ $post->title }}</a></p>
    @empty
        <p>No recent posts available.</p>
    @endforelse

    <hr>
    
   



          

