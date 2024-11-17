<footer class="p-4">
    <div class="container container-fluid">
        <div class="row">
            <div class="col-md-4">
                <h1 class="display-5">Nice Computer Institute</h1>
                <p>We are a Computer Education Institute. Create your passion and inspiration, and hope success will come for your dream. Please send an email and get the latest news.</p>
                <p>
                    <a href="https://www.facebook.com/nicewebtechnologies">
                        <i class="fa fa-facebook social" style="font-size:30px;line-height:50px;"></i>
                    </a>
                    <a href="https://www.instagram.com/nicewebtechnologies">
                        <i class="fa fa-instagram social" style="font-size:30px;line-height:50px;"></i>
                    </a>
                    <a href="https://www.youtube.com/nicewebtechnologies">
                        <i class="fa fa-youtube social" style="font-size:30px;line-height:50px;"></i>
                    </a>
                    <a href="https://www.twitter.com/nicewebtechnologies">
                        <i class="fa fa-twitter social" style="font-size:30px;line-height:50px;"></i>
                    </a>
                </p>
            </div>
            <div class="col-md-4">
                <h1 class="display-5">Recent Posts</h1>
                @forelse ($latestPosts as $post)
        <p><a  style="color:white" href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></p>
    @empty
        <p>No recent posts available.</p>
    @endforelse
 <p>   <a  style="color:white" href="{{ url('/privacy-policy') }}">Privacy Policy</a></p>
            </div>
            <div class="col-md-4">
                <h1 class="display-5">Ongoing Classes</h1>
                <p><a href="https://posts.gle/N5Mb85" style="color:white"><i class="fa fa-check-square"></i> Busy Classes</a></p>
                <p><a href="https://posts.gle/3R2QHu" style="color:white"><i class="fa fa-check-square"></i> Python Classes</a></p>
                <p><a href="https://posts.gle/3R2QHu" style="color:white"><i class="fa fa-check-square"></i>IP Classes</a></p>
                <p><a href="https://posts.gle/x7nyjU" style="color:white"><i class="fa fa-check-square"></i>Web Design & Web Devlopement</a></p>
                <p><a href="https://posts.gle/FNLZ6g" style="color:white"><i class="fa fa-check-square"></i>Marg Classes(Accounting Software)</a></p>
                <p><a href="https://posts.gle/hZyL2 " style="color:white"i class="fa fa-check-square"></i>Advance Excel Classes</a></p>
                
            </div>
        </div>
        <hr>
        <p class="footer-copy">Copyright © Computer Institute in Jahangirpuri (Nice Computer Institute) 2024 | All Rights Reserved by <a class="copyright" href="https://www.nicewebtechnologies.com">Nice Web Technologies</a></p>
    </div>
</footer>
