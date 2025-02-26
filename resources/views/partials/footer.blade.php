<footer class="footer py-5">
    <div class="container">
        <div class="row">
            <!-- About Section -->
            <div class="col-md-4">
                <h2 class="footer-heading">Nice Computer Institute</h2>
                <p class="footer-text">We are a Computer Education Institute. Create your passion and inspiration, and hope success will come for your dream. Please send an email and get the latest news.</p>
                <div class="social-icons">
                    <a href="https://www.facebook.com/nicewebtechnologies" class="social-link">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a href="https://www.instagram.com/nicewebtechnologies" class="social-link">
                        <i class="fa fa-instagram"></i>
                    </a>
                    <a href="https://www.youtube.com/nicewebtechnologies" class="social-link">
                        <i class="fa fa-youtube"></i>
                    </a>
                    <a href="https://www.twitter.com/nicewebtechnologies" class="social-link">
                        <i class="fa fa-twitter"></i>
                    </a>
                </div>
            </div>
            <!-- Recent Posts Section -->
            <div class="col-md-4">
                <h2 class="footer-heading">Recent Posts</h2>
                @forelse ($latestPosts as $post)
                    <p><a href="{{ route('posts.show', $post->id) }}" class="footer-link">{{ $post->title }}</a></p>
                @empty
                    <p>No recent posts available.</p>
                @endforelse
                <p><a href="{{ url('/privacy-policy') }}" class="footer-link">Privacy Policy</a></p>
                <p><a href="{{ route('login') }}" class="footer-link">Login</a></p>
            </div>
            <!-- Ongoing Classes Section -->
            <div class="col-md-4">
                <h2 class="footer-heading">Ongoing Classes</h2>
                <p><a href="https://posts.gle/N5Mb85" class="footer-link"><i class="fa fa-check-square"></i> Busy Classes</a></p>
                <p><a href="https://posts.gle/3R2QHu" class="footer-link"><i class="fa fa-check-square"></i> Python Classes</a></p>
                <p><a href="https://posts.gle/3R2QHu" class="footer-link"><i class="fa fa-check-square"></i> IP Classes</a></p>
                <p><a href="https://posts.gle/x7nyjU" class="footer-link"><i class="fa fa-check-square"></i> Web Design & Development</a></p>
                <p><a href="https://posts.gle/FNLZ6g" class="footer-link"><i class="fa fa-check-square"></i> Marg Classes</a></p>
                <p><a href="https://posts.gle/hZyL2" class="footer-link"><i class="fa fa-check-square"></i> Advanced Excel Classes</a></p>
                <p><a href="/courses_list" class="footer-link"><i class="fa fa-check-square"></i> Courses</a></p>
            </div>
        </div>
        <hr class="footer-divider">
        <p class="text-center footer-copy">
            Copyright © Computer Institute in Jahangirpuri (Nice Computer Institute) 2024 | All Rights Reserved by 
            <a href="https://www.nicewebtechnologies.com" class="copyright">Nice Web Technologies</a>
        </p>
    </div>
</footer>
