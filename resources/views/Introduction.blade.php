@extends('layout')

@section('title', 'Introduction')
@section('content')

<!-- Header Section with Scroll Animation -->
<section class="bg-primary text-white text-center py-5" data-aos="fade-in">
    <div class="container">
        <h1 class="display-4" data-aos="fade-up">Best Computer Training in Jahangirpuri at Nice Computer Institute</h1>
        <p class="lead" data-aos="fade-up" data-aos-delay="100">Explore the Boundaries of I.T. Education with Our Advanced Courses</p>
        <a href="tel:9312945741" class="btn btn-light mt-3" data-aos="fade-up" data-aos-delay="200">Call Now: 9312945741</a>
    </div>
</section>

<!-- Welcome Section with Scroll Animation -->
<section class="py-5" data-aos="fade-in">
    <div class="container text-center">
        <h2 data-aos="fade-up">Embarking on a Transformative Journey with Nice Computer Institute</h2>
        <p class="mt-4" data-aos="fade-up" data-aos-delay="100">
            At Nice Computer Institute, we don’t just educate; we inspire, innovate, and illuminate the path to success.
            Join us, where every dream is nurtured, and every aspiration finds its wings. Your journey to a tech-savvy
            future begins with us!
        </p>
    </div>
</section>
<!-- Introduction Section with YouTube Video -->
<section class="py-5">
    <div class="container text-center">
        <h2>Learn More About Us</h2>
        <p class="mt-4">
            Watch this video to get a quick overview of Nice Computer Institute and the courses we offer.
        </p>

        <!-- Responsive YouTube Embed -->
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://youtu.be/_IQokUduuh4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
</section>

<!-- About Section with Scroll Animation -->
<section class="bg-light py-5" data-aos="fade-in">
    <div class="container">
        <h3 class="text-center" data-aos="fade-up">What Sets Us Apart</h3>
        <p class="mt-4 text-center" data-aos="fade-up" data-aos-delay="100">
            Unlike others in the field, Nice Computer Institute merges tradition with innovation to create a holistic
            learning environment. Our distinctive blend of advanced technology, unique methodology, and skilled faculty
            ensures a comprehensive educational experience.
        </p>
    </div>
</section>

<!-- Courses Section with Accordion and Scroll Animation -->
<section class="py-5" data-aos="fade-in">
    <div class="container">
        <h3 class="text-center" data-aos="fade-up">Courses Crafted for Success</h3>
        <p class="text-center" data-aos="fade-up" data-aos-delay="100">Our curriculum is meticulously designed for today's competitive job market.</p>

        <!-- Accordion for Courses -->
        <div class="accordion mt-4" id="coursesAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" data-aos="fade-up" data-aos-delay="200">
                        Web Design & Development
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#coursesAccordion">
                    <div class="accordion-body">
                        Learn the skills to create stunning websites from scratch. This course covers the basics of web design, HTML, CSS, JavaScript, and responsive design.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" data-aos="fade-up" data-aos-delay="300">
                        Graphic Design
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#coursesAccordion">
                    <div class="accordion-body">
                        Master tools like Photoshop, Illustrator, and InDesign to create stunning graphics. Learn design principles, typography, and image manipulation techniques.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" data-aos="fade-up" data-aos-delay="400">
                        Advanced Excel
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#coursesAccordion">
                    <div class="accordion-body">
                        Boost your data analysis skills with advanced Excel techniques, including pivot tables, VLOOKUP, and complex formulas for business analytics.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour" data-aos="fade-up" data-aos-delay="500">
                        Tally, Busy & Marg
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#coursesAccordion">
                    <div class="accordion-body">
                        Comprehensive courses for accounting software mastery. Learn how to manage finances, generate reports, and streamline accounting processes with Tally, Busy, and Marg.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Additional Services Section with Scroll Animation -->
<section class="bg-light py-5" data-aos="fade-in">
    <div class="container">
        <h3 class="text-center" data-aos="fade-up">Additional Services</h3>
        <ul class="list-group mt-4">
            <li class="list-group-item" data-aos="fade-up" data-aos-delay="200">Online and Offline Classes</li>
            <li class="list-group-item" data-aos="fade-up" data-aos-delay="300">In-House Placement Services</li>
            <li class="list-group-item" data-aos="fade-up" data-aos-delay="400">Regular Updates and Notifications on IT Developments</li>
        </ul>
    </div>
</section>

@endsection
