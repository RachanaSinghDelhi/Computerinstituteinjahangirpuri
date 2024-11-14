
            <h1 class="display-3">
               Join Now
            </h1>
            
            <p><img src="{{asset('assets/images/support_nice_computer_institute_jahangirpuri.jpg')}}" class="img-fluid"></p>
        
    <h1 class="display-5">Recent Posts</h1>
                @forelse ($latestPosts as $post)
        <p><a  href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></p>
    @empty
        <p>No recent posts available.</p>
    @endforelse

          

